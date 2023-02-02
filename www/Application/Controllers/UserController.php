<?php
declare(strict_types=1);

namespace Application\Controllers;

use Application\Entities\User;
use Application\Entities\UserRepository;
use Application\Requests\CreateUserRequest;
use Exception;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\{
    ResponseFactoryInterface as ResponseFactory,
    ServerRequestInterface as Request,
    ResponseInterface as Response,
};

use Infrastructure\Core\{Repository\MysqlUserRepository, Repository\Paginator, View\View, Http\HtmlResponseFactory};

class UserController extends BaseController
{
    private View $view;
    private ResponseFactory $htmlResponseFactory;
    private UserRepository $userRepository;

    public function __construct(ContainerInterface $container)
    {
        $this->view = $container->get(View::class);
        $this->htmlResponseFactory = $container->get(HtmlResponseFactory::class);
        $this->userRepository = new MysqlUserRepository();
    }

    public function preRegister(Request $request): Response
    {
        $user = null;
        $render = $this->view
            ->withName("users/register")
            ->withData(['user' => $user]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function register(CreateUserRequest $request): Response
    {
        $attributes = $request->getParsedBody();
        $validation = $request->Validation($attributes, 'register');
        if (!empty($validation)) {
            session_start();
            $_SESSION['errorValidation'] = $validation;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        $user = $this->userRepository->register(
            $attributes['name'],
            $attributes['status'],
            $attributes['class'],
            $attributes['password'],
        );

        $render = $this->view
            ->withName("users/register")
            ->withData(['user' => $user]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function preLogin(Request $request): Response
    {
        $user = null;
        $render = $this->view
            ->withName("users/login")
            ->withData(['user' => $user]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function login(CreateUserRequest $request): Response
    {
        $attributes = $request->getParsedBody();
        $validation = $request->Validation($attributes, 'login');
        if (!empty($validation)) {
            session_start();
            $_SESSION['errorValidation'] = $validation;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        $user = $this->userRepository->auth(
            $attributes['name'],
            $attributes['class'],
            $attributes['password'],
        );
        if (!empty($user)) {
            $this->setCookie($user);
            session_start();
            $_SESSION['login'] = 'Вы успешно вошли';
            header('Location: /books');
            exit;
        }
        $render = $this->view
            ->withName("users/login")
            ->withData(['user' => $user]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    public function logout(Request $request)
    {
        $user = $this->unsetCookie();
        if($user){
            session_start();
            $_SESSION['login'] = 'Вы успешно вышли из аккаунта';
            header('Location: /books');
            exit;
        }
        $user = null;
        $render = $this->view
            ->withName("users/all")
            ->withData(['user' => $user]);

        return $this->htmlResponseFactory
            ->createResponse(200)
            ->withContent($render);
    }

    private function setCookie($user)
    {
        foreach ($user as $items):
            setcookie('id', strval($items['id']), time() + 86400 * 30);
            setcookie('name', $items['name'], time() + 86400 * 30);
            setcookie('class', $items['class'], time() + 86400 * 30);
            setcookie('password', $items['password'], time() + 86400 * 30);
            setcookie('status', strval($items['status']), time() + 86400 * 30);
        endforeach;
    }

    private function unsetCookie(): bool
    {
        setcookie('id', '', time()-3600,"/");
        setcookie('name', '', time()-3600,"/");
        setcookie('class', '', time()-3600,"/");
        setcookie('password', '', time()-3600,"/");
        setcookie('status', '', time()-3600,"/");
        return true;
    }

}
//
//
//    public function show(): Response
//    {
//      $user = (new UserMapper())->all();
//      $render = $this->view
//         ->withName("users/list")
//         ->withData(['user' => $user]);
//
//      return $this->htmlResponseFactory
//         ->createResponse(200)
//         ->withContent($render);
//    }
//
//    public function login(): Response
//    {
//     $user = (new UserMapper())->all();
//     $render = $this->view
//        ->withName("users/login")
//        ->withData(['user' => $user]);
//
//     return $this->htmlResponseFactory
//        ->createResponse(200)
//        ->withContent($render);
//    }
//
//    public function main(): Response
//    {
//      $onebook = (new BookRepository())->one_books();
//      $render = $this->view
//         ->withName("layout/header")
//         ->withData(['onebook' => $onebook]);
//
//      return $this->htmlResponseFactory
//         ->createResponse(200)
//         ->withContent($render);
//    }
//
//
//    public function logout(): Response
//    {
//      $user = '123';
//      $render = $this->view
//         ->withName("users/logout")
//         ->withData(['user' => $user]);
//
//      return $this->htmlResponseFactory
//         ->createResponse(200)
//         ->withContent($render);
//    }
//
//
//    public function account(): Response
//    {
//      $user = '123';
//      $render = $this->view
//         ->withName("users/account")
//         ->withData(['user' => $user]);
//
//      return $this->htmlResponseFactory
//         ->createResponse(200)
//         ->withContent($render);
//    }
//
//    public function give(): Response
//    {
//        $user = '123';
//        $render = $this->view
//            ->withName("users/give")
//            ->withData(['user' => $user]);
//
//        return $this->htmlResponseFactory
//            ->createResponse(200)
//            ->withContent($render);
//    }
//
//    public function return(): Response
//    {
//        $user = '123';
//        $render = $this->view
//            ->withName("users/return")
//            ->withData(['user' => $user]);
//
//        return $this->htmlResponseFactory
//            ->createResponse(200)
//            ->withContent($render);
//    }
//
//    public function allbooks(): Response
//    {
//        $user = (new UserMapper())->allbooks();
//        $render = $this->view
//            ->withName("users/allbooks")
//            ->withData(['user' => $user]);
//
//        return $this->htmlResponseFactory
//            ->createResponse(200)
//            ->withContent($render);
//    }
//
//    public function toobook(): Response
//    {
//        $books = (new BookRepository())->all();
//        $render = $this->view
//            ->withName("users/toobook")
//            ->withData(['books' => $books]);
//
//        return $this->htmlResponseFactory
//            ->createResponse(200)
//            ->withContent($render);
//    }
//
//    public function tobook(Request $request): Response
//    {
//        $attributes = $request->getAttributes();
//        $books = (new BookRepository())->searchid($attributes['id']);
//        $render = $this->view
//            ->withName("users/tobook")
//            ->withData(['books' => $books]);
//
//        return $this->htmlResponseFactory
//            ->createResponse(200)
//            ->withContent($render);
//    }
//
//    public function alltoobook(): Response
//    {
//        $user = (new UserMapper())->alltoobook();
//        $render = $this->view
//            ->withName("users/alltoobook")
//            ->withData(['user' => $user]);
//
//        return $this->htmlResponseFactory
//            ->createResponse(200)
//            ->withContent($render);
//    }



