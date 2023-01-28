<?php

declare(strict_types=1);

namespace Application\Controllers;

use Application\Entities\Book;
use Application\Entities\BookRepository;
use Application\Requests\CreateBookRequest;
use Exception;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\{
    ResponseFactoryInterface as ResponseFactory,
    ServerRequestInterface as Request,
    ResponseInterface as Response,
};

use Infrastructure\Core\{Repository\MysqlBookRepository, Repository\Paginator, View\View, Http\HtmlResponseFactory};

class BookController extends BaseController
{
    private View $view;
    private ResponseFactory $htmlResponseFactory;
    private BookRepository $bookRepository;

    public function __construct(ContainerInterface $container)
    {
        $this->view = $container->get(View::class);
        $this->htmlResponseFactory = $container->get(HtmlResponseFactory::class);
        $this->bookRepository = new MysqlBookRepository();
    }

    /**
     * @throws \Exception
     */
    public function all(Request $request): Response
    {
        $page = $request->getGetAttributes('page');
        if(empty($page)) {
            $page = 1;
        }
        $items = $this->bookRepository->all();
        $books = $this->bookRepository->paginate(1, $page, $items);

        $render = (new View())
            ->withName("books/all")
            ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function show(Request $request): Response
    {
        $id = $request->getAttribute("id");

        $book = $this->bookRepository->getById($id);


        $render = $this->view
            ->withName("books/show")
            ->withData(['book' => $book]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }


    public function create(Request $request): Response
    {
        $genres = $this->bookRepository->allGenres();
        $render = $this->view
            ->withName("books/store")
            ->withData(['genres' => $genres]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function store(CreateBookRequest $request): Response
    {
        $attributes = $request->getParsedBody();
        $validation = $request->Validation($attributes);
        if(!empty($validation)){
            session_start();
            $_SESSION['errorValidation'] = $validation;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        $picture = "https://pictures.abebooks.com/isbn/". $attributes['ISBN'] ."-us-300.jpg";
        $genres = $this->bookRepository->allGenres();
        $book = $this->bookRepository->create(
            $attributes['name'],
            $attributes['author'],
            $attributes['year'],
            $attributes['ISBN'],
            $attributes['count'],
            $attributes['genre'],
            $picture
        );

        //$weirdString = file_get_contents('php://input');
        $render = $this->view
            ->withName("books/store")
            ->withData(['genres' => $genres]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function delete(Request $request): Response
    {
        $id = $request->getAttribute("id");
        $book = $this->bookRepository->delete($id);
        $books = $this->bookRepository->all();
        $render = (new View())
            ->withName("books/all")
            ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function toYear(Request $request): Response
    {
        $books = null;
        $render = $this->view
            ->withName("books/year")
            ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function tooYear(Request $request): Response
    {

        if (empty($_POST['too'])) {
            $_POST['too'] = 9999;
        }
        if (empty($_POST['from'])) {
            $_POST['from'] = 0;
        }
        $books = $this->bookRepository->tooYear($_POST['too'], $_POST['from']);
        $render = $this->view
            ->withName("books/year")
            ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function top100(Request $request): Response
    {
        $books = $this->bookRepository->top100();
        $render = $this->view
            ->withName("books/top100")
            ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function editForm(Request $request): Response
    {
        $genres = $this->bookRepository->allGenres();
        $id = $request->getAttribute("id");
        $book = $this->bookRepository->getById($id);
        $render = $this->view
            ->withName("books/edit")
            ->withData(['book' => $book, 'genres' => $genres]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function edit(Request $request): Response
    {
        $genres = $this->bookRepository->allGenres();
        $id = $request->getAttribute("id");

        $attributes = $request->getAttributes();

        $bookEdit = $this->bookRepository->edit(...$attributes);
        $book = $this->bookRepository->getById($id);
        $render = $this->view
            ->withName("books/edit")
            ->withData(['book' => $book, 'genres' => $genres]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function allGenres(Request $request): Response
    {
        $genres = $this->bookRepository->allGenres();
        $render = $this->view
            ->withName("books/allGenre")
            ->withData(['genres' => $genres]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function addGenre(Request $request): Response
    {
        $genre = $this->bookRepository->addGenre($_POST['genre']);
        $genres = $this->bookRepository->allGenres();
        $render = $this->view
            ->withName("books/allGenre")
            ->withData(['genres' => $genres]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function deleteGenre(Request $request): Response
    {
        $id = $request->getAttribute("id");
        $deleteGenre = $this->bookRepository->deleteGenre($id);
        $genres = $this->bookRepository->allGenres();
        $render = $this->view
            ->withName("books/allGenre")
            ->withData(['genres' => $genres]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function formEditGenre(Request $request): Response
    {
        $id = $request->getAttribute("id");
        $genre = $this->bookRepository->findGenre($id);
        $genres = $this->bookRepository->allGenres();
        $render = $this->view
            ->withName("books/editGenre")
            ->withData(['genres' => $genres, 'genre' => $genre]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function editGenre(Request $request): Response
    {
        $id = $request->getAttribute("id");
        $deleteGenre = $this->bookRepository->editGenre($id, $_POST['genre']);
        $genre = $this->bookRepository->findGenre($id);
        $genres = $this->bookRepository->allGenres();
        $render = $this->view
            ->withName("books/editGenre")
            ->withData(['genres' => $genres, 'genre' => $genre]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function search(Request $request): Response
    {
        $name = $request->getGetAttributes("name");
        $books = $this->bookRepository->search($name);
        $render = $this->view
            ->withName("books/search")
            ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }
}
