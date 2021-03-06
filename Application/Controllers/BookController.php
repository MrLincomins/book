<?php

declare(strict_types=1);

namespace Application\Controllers;

use Application\Models\Book;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\{
    ResponseFactoryInterface as ResponseFactory,
    ServerRequestInterface as Request,
    ResponseInterface as Response,
};

use Infrastructure\Core\{
    View\View,
    Http\HtmlResponseFactory,
};

class BookController extends BaseController
{
    private View $view;
    private ResponseFactory $htmlResponseFactory;

    public function __construct(ContainerInterface $container)
    {
         $this->view = $container->get(View::class);
         $this->htmlResponseFactory = $container->get(HtmlResponseFactory::class);
    }

    /**
     * @throws \Exception
     */
    public function show(Request $request): Response
    {
        $books = (new Book())->all();

        $render = (new View())
            ->withName("books/list")
            ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    /**
     * @throws \Exception
     */
    public function list(): Response
    {
        $books = (new Book())->all();
        $render = $this->view
            ->withName("books/list")
            ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function add(): Response
    {
      $books = "123";
      $render = $this->view
        ->withName("books/add")
        ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);

    }
    public function scan(): Response
    {
      $weirdString = file_get_contents('php://input');
      $render = $this->view
        ->withName("books/scanner")
        ->withData(['weirdString' => $weirdString]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function ToYear(): Response
    {
      $P = "...";
      $render = $this->view
        ->withName("books/Year")
        ->withData(['P' => $P]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function top100(): Response
    {
      $books = (new Book())->Top100();
      $render = $this->view
        ->withName("books/top100")
        ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }


    public function delete(): Response
    {
     $uri = $_SERVER["REQUEST_URI"];
     $id = preg_replace('/\\/books\\//u', '', $uri, -1);
     $books = (new Book())->searchid($id);
     $render = $this->view
       ->withName("books/delete")
       ->withData(['books' => $books]);

       return $this->htmlResponseFactory
           ->createResponse(200)
           ->withContent($render);
    }



}
