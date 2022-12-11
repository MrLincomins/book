<?php

declare(strict_types=1);

namespace Application\Controllers;

use Application\Entities\Book;
use Application\Entities\BookRepository;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\{
    ResponseFactoryInterface as ResponseFactory,
    ServerRequestInterface as Request,
    ResponseInterface as Response,
};

use Infrastructure\Core\{Repository\MysqlBookRepository, View\View, Http\HtmlResponseFactory};

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
        $books = $this->bookRepository->all();
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

    /**
     * @throws \Exception
     */


    public function create(): Response
    {
        $genres = $this->bookRepository->allGenres();
        $render = $this->view
            ->withName("books/store")
            ->withData(['genres' => $genres]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function store(Request $request): Response
    {
        $attributes = $request->getParsedBody();
        $genres = $this->bookRepository->allGenres();
        $book = $this->bookRepository->create(
            $attributes['name'],
            $attributes['author'],
            $attributes['year'],
            $attributes['ISBN'],
            $attributes['count'],
            $attributes['genre'],
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

    public function tooYear(): Response
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
        $bookEdit = $this->bookRepository->edit($id, $_POST['name'], $_POST['author'], $_POST['year'], $_POST['ISBN'], $_POST['count'], $_POST['genre']);
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

    public function addGenre(): Response
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
        //   /\/books\/search|(\?[\w]+\=(\w+))/mg
        //$query = $request->getAttribute('q');
        $query = null;
        $render = $this->view
            ->withName("books/search")
            ->withData(['books' => $query]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }
}
