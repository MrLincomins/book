<?php

namespace Application\Controllers;

use Application\Models\CD;

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


class CDController extends BaseController
{
  private View $view;
  private ResponseFactory $htmlResponseFactory;

  public function __construct(ContainerInterface $container)
  {
       $this->view = $container->get(View::class);
       $this->htmlResponseFactory = $container->get(HtmlResponseFactory::class);
  }

  public function show(Request $request): Response
  {
      $cd = (new CD())->all();

      $render = (new View())
          ->withName("cd/list")
          ->withData(['cd' => $cd]);

      return $this->htmlResponseFactory
          ->createResponse(200)
          ->withContent($render);
  }



  public function add(): Response
  {
    $cd = "123";
    $render = $this->view
      ->withName("cd/add")
      ->withData(['cd' => $cd]);

      return $this->htmlResponseFactory
          ->createResponse(200)
          ->withContent($render);

  }


}
