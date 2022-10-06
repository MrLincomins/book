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
      $books = "123";
      $render = $this->view
        ->withName("books/create")
        ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function store(): Response
    {
      $book = $this->bookRepository->create($_POST['name'], $_POST['author'], $_POST['year'], $_POST['ISBN'], $_POST['count']);
      //$weirdString = file_get_contents('php://input');
      $render = $this->view
        ->withName("books/store")
        ->withData(['book' => $book]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function delete(Request $request): Response
    {
        $id = $request->getAttribute("id");
        $books = $this->bookRepository->delete($id);

        $render = (new View())
            ->withName("books/delete")
            ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

//    public function ToYear(): Response
//    {
//      $P = "...";
//      $render = $this->view
//        ->withName("books/Year")
//        ->withData(['P' => $P]);
//
//        return $this->htmlResponseFactory
//            ->createResponse(200)
//            ->withContent($render);
//    }
//
//    public function top100(): Response
//    {
//      $books = (new Book())->top100();
//      $render = $this->view
//        ->withName("books/top100")
//        ->withData(['books' => $books]);
//
//        return $this->htmlResponseFactory
//            ->createResponse(200)
//            ->withContent($render);
//    }
//
//
//    public function searchbook(): Response
//    {
//        $books = (new BookRepository())->all();
//        $render = $this->view
//            ->withName("books/search")
//            ->withData(['books' => $books]);
//
//        return $this->htmlResponseFactory
//            ->createResponse(200)
//            ->withContent($render);
//    }
}
