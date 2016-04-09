<?php

namespace SON\CatalogoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($quantidade, $name)
    {

        /*
         * Comforme mostrado na aula 5 podemos fazer dessa forma
         * instanciando o template.
        $templating = $this->container->get("templating");

        $content =
            $templating->renderResponse("CatalogoBundle:Default:index.html.twig",
                array (
                    'name'=> $name,
                    'quantidade'=> $quantidade
                )
            );
        $response = new Response();
        return $response('teste');
    */
        return $this->render('CatalogoBundle:Default:index.html.twig', array('name' => $name, 'quantidade' => $quantidade));
    }
}
