<?php
declare(strict_types=1);

namespace Application\Controllers;

use Application\Models\User;
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

class UserController extends BaseController
{
    private View $view;
    private ResponseFactory $htmlResponseFactory;

    public function __construct(ContainerInterface $container)
    {
         $this->view = $container->get(View::class);
         $this->htmlResponseFactory = $container->get(HtmlResponseFactory::class);
    }



    public function register(): Response
    {
     $user = "123";
     $render = $this->view
        ->withName("users/register")
        ->withData(['user' => $user]);

     return $this->htmlResponseFactory
        ->createResponse(200)
        ->withContent($render);
    }



    public function show(): Response
    {
      $user = (new User())->all();
      $render = $this->view
         ->withName("users/list")
         ->withData(['user' => $user]);

      return $this->htmlResponseFactory
         ->createResponse(200)
         ->withContent($render);
    }

    public function login(): Response
    {
     $user = (new User())->all();
     $render = $this->view
        ->withName("users/login")
        ->withData(['user' => $user]);

     return $this->htmlResponseFactory
        ->createResponse(200)
        ->withContent($render);
    }

    public function main(): Response
    {
      $main = '123';
      $render = $this->view
         ->withName("layout/header")
         ->withData(['main' => $main]);

      return $this->htmlResponseFactory
         ->createResponse(200)
         ->withContent($render);
    }


    public function logout(): Response
    {
      $user = '123';
      $render = $this->view
         ->withName("users/logout")
         ->withData(['user' => $user]);

      return $this->htmlResponseFactory
         ->createResponse(200)
         ->withContent($render);
    }

    public function account(): Response
    {
      $user = '123';
      $render = $this->view
         ->withName("users/account")
         ->withData(['user' => $user]);

      return $this->htmlResponseFactory
         ->createResponse(200)
         ->withContent($render);
    }

    public function give(): Response
    {
        $user = '123';
        $render = $this->view
            ->withName("users/give")
            ->withData(['user' => $user]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function return(): Response
    {
        $user = '123';
        $render = $this->view
            ->withName("users/return")
            ->withData(['user' => $user]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function allbooks(): Response
    {
        $user = (new User())->allbooks();
        $render = $this->view
            ->withName("users/allbooks")
            ->withData(['user' => $user]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function toobook(): Response
    {
        $books = (new Book())->all();
        $render = $this->view
            ->withName("users/toobook")
            ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function tobook(Request $request): Response
    {
        $attributes = $request->getAttributes();
        $books = (new Book())->searchid($attributes['id']);
        $render = $this->view
            ->withName("users/tobook")
            ->withData(['books' => $books]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function alltoobook(): Response
    {
        $user = (new User())->alltoobook();
        $render = $this->view
            ->withName("users/alltoobook")
            ->withData(['user' => $user]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }


}
