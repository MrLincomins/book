<?php
declare(strict_types=1);

namespace Application\Controllers;

use Application\Models\User;

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



}
