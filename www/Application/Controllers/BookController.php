<?php

declare(strict_types=1);

namespace Application\Controllers;

use Application\Entities\Book;
use Application\Entities\BookRepository;
use Application\Requests\CreateBookRequest;
use Application\Requests\CreateUserRequest;
use Exception;
use JetBrains\PhpStorm\NoReturn;
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
        if (empty($page)) {
            $page = 1;
        }
        $items = $this->bookRepository->all();
        $books = $this->bookRepository->paginate(6, $page, $items);
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
        $this->checkAuth();
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
        $this->checkAuth();
        $attributes = $request->getParsedBody();
        $validation = $request->Validation($attributes, 'storeBook');
        if (!empty($validation)) {
            session_start();
            $_SESSION['errorValidation'] = $validation;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        $picture = "https://pictures.abebooks.com/isbn/" . $attributes['ISBN'] . "-us-300.jpg";
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
        $page = $request->getGetAttributes('page');
        if (empty($page)) {
            $page = 1;
        }
        $this->checkAuth();
        $id = $request->getAttribute("id");
        $book = $this->bookRepository->delete($id);
        $items = $this->bookRepository->all();
        $books = $this->bookRepository->paginate(6, $page, $items);
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
        $this->checkAuth();
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
        $this->checkAuth();
        $genres = $this->bookRepository->allGenres();
        $id = $request->getAttribute("id");

        $attributes = $request->getParsedBody();
        $bookEdit = $this->bookRepository->edit($id, $attributes['name'], $attributes['author'], $attributes['year'], $attributes['ISBN'], $attributes['count'], $attributes['genre']);
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
        $this->checkAuth();
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
        $this->checkAuth();
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
        $this->checkAuth();
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
        $this->checkAuth();
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
        $this->checkAuth();
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

    public function preReserveTheBook(Request $request): Response
    {
        $this->checkUser();
        $id = $request->getAttribute('id');
        $book = $this->bookRepository->getById($id);
        $render = $this->view
            ->withName("books/reserve")
            ->withData(['book' => $book]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function reserveTheBook(Request $request): Response
    {
        $this->checkUser();
        $id = $request->getAttribute('id');
        if (!$this->checkForReserve()) {
            session_start();
            $_SESSION['error'] = 'У вас уже есть книга';
            header('Location: ' . '/books');
            exit;
        }
        $DATE = mktime(0, 0, 0, (int)date("m"), (int)date("d") + 2, (int)date("Y"));
        $DATE = strftime("%Y-%m-%d", $DATE);
        $this->bookRepository->reserveBook($_COOKIE['id'], $id, $DATE);
        $books = $this->bookRepository->getById($id);
        session_start();
        $_SESSION['reserve'] = 'Вы успешно зарезервировали книгу на два дня';
        $render = $this->view
            ->withName("books/reserve")
            ->withData(['book' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function checkForReserve(): bool
    {
        $id = $_COOKIE['id'];
        $items = $this->bookRepository->checkForReserve($id);
        if (current($items[0]) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function showReserve(Request $request): Response
    {
        $this->checkAuth();
        $books = $this->bookRepository->showReserve();
        $render = (new View())
            ->withName("books/allReserve")
            ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);

    }

    public function preBorrowBook(Request $request): Response
    {
        $this->checkAuth();
        $id = $request->getAttribute('id');
        $book = $this->bookRepository->getById($id);
        $render = $this->view
            ->withName("books/borrowBook")
            ->withData(['book' => $book]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }
    public function borrowBook(CreateUserRequest $request): Response
    {
        $this->checkAuth();
        $id = $request->getAttribute('id');
        $validation = $request->Validation([$_POST['id']], 'idUser');
        if (!empty($validation)) {
            session_start();
            $_SESSION['errorValidation'] = $validation;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        if (!$this->checkForBorrow($_POST['id'])) {
            session_start();
            $_SESSION['error'] = 'У ученика уже есть книга';
            header('Location: ' . '/books');
            exit;
        }
        $DATE = mktime(0, 0, 0, (int)date("m"), (int)date("d") + 2, (int)date("Y"));
        $DATE = strftime("%Y-%m-%d", $DATE);
        $this->bookRepository->borrowBook($_POST['id'], $id, $DATE);

        $books = $this->bookRepository->getById($id);
        session_start();
        $_SESSION['borrow'] = 'Вы успешно выдали книгу ученику';
        $render = $this->view
            ->withName("books/borrowBook")
            ->withData(['book' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function showBorrowBook(Request $request): Response
    {
        $this->checkAuth();
        $books = $this->bookRepository->showBorrrow();
        $render = (new View())
            ->withName("books/showBorrowBook")
            ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function checkUserBorrow(Request $request): Response
    {
        $this->checkAuth();
        $books = 1;
        $render = (new View())
            ->withName("books/preReturn")
            ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function preReturnBorrow(Request $request): Response
    {
        $this->checkAuth();
        $iduser = $request->getAttribute('id');
        $books = $this->bookRepository->preReturnBook($iduser);
        $user = $this->bookRepository->selectUser($iduser);
        if(!$books){
            session_start();
            $_SESSION['borrow'] = 'У пользователя нет книги';
            header('Location: ' . '/books/borrow/return');
            exit;
        }
        $render = (new View())
            ->withName("books/preReturn1")
            ->withData(['books' => $books, 'user' => $user]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    #[NoReturn] public function returnBook(Request $request): Response
    {
        $this->checkAuth();
        $iduser = $request->getAttribute('id');
        $book = $this->bookRepository->preReturnBook($iduser);
        $this->bookRepository->returnBook($iduser, $book->id);
        session_start();
        $_SESSION['borrow'] = 'Книга была успешно возвращена в библиотеку';
        header('Location: ' . '/books/borrow/return');
        exit;
    }


    public function checkForBorrow($id): bool
    {
        $items = $this->bookRepository->checkForBorrow($id);
        if (current($items[0]) == 0) {
            return true;
        } else {
            return false;
        }
    }


    public function checkAuth(): bool
    {
        if (@$_COOKIE['status'] == 1) {
            return true;
        } else {
            session_start();
            $_SESSION['auth'] = 'У вас недостаточно прав';
            header('Location: ' . '/books');
            exit;
        }
    }

    public function checkUser(): bool
    {
        if (!empty($_COOKIE['status'])) {
            return true;
        } else {
            session_start();
            $_SESSION['auth'] = 'Войдите в аккаунт, чтобы получить больше преимуществ';
            header('Location: ' . '/login');
            exit;
        }
    }
}
