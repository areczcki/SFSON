<?php

namespace SON\CatalogoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($quantidade, $name)
    {

        /** Como exemplo - vou instanciar o doctrine via container symfony */
        //$em = $this->container()->get("doctrine")->getEntityManager();

        /** Instanciando via symfony */
        $em = $this->getDoctrine()->getEntityManager();

        //Invocando o meu Repositorio
        $repo = $em->getRepository("CatalogoBundle:Catalogo");

        $catalogo = $repo->findOneBy(
            array('name' => 'lustres')
        );

        /** Renderizar na view o meu catalogo */
        return $this->render('CatalogoBundle:Default:index.html.twig',
            array(
                'name' => $name,
                'quantidade' => $quantidade,
                'catalogo' => $catalogo
            ));

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
        //return $this->render('CatalogoBundle:Default:index.html.twig', array('name' => $name, 'quantidade' => $quantidade));
    }
}
