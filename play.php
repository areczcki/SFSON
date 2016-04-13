<?php

use Symfony\Component\HttpFoundation\Request;

$loader = require_once __DIR__.'/app/bootstrap.php.cache';
require_once __DIR__.'/app/AppKernel.php';

/** Dar um boot no kernel do framework */
$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$kernel->boot();

$container = $kernel->getContainer();
$container->enterScope("request");
$container->set("request", Request::createFromGlobals());

/** AULA 2 - Doctrine Inserindo dados no banco */

/**
 * AULA 2
 * PARTE 2
 * Exemplo: Do container utilizando o Doctrine
 */
Use SON\CatalogoBundle\Entity\Catalogo;

$catalogo = new Catalogo();
$catalogo->setName("lustres");
$catalogo->setDescricao("Descricao dos lustres");
$catalogo->setLancamento(new \DateTime("tomorrow noon"));
$catalogo->setImageName("lustres.jpg");

/** Agora chamar via container → O Entity manager | E o instanciando */
/** @var  $em \Doctrine\ORM\EntityManager */
$em = $container->get("doctrine");
$em->persist($catalogo);
$em->flush();


/**
 * AULA 2
 * PARTE 1
 * Exemplo: Do container utilizando o templating
 */
$templating = $container->get("templating");
echo $templating->render(
    "CatalogoBundle:Default:index.html.twig",
        array(
            'name'  => 'Alexandre',
            'quantidade' => '3'
        )
);

echo"entrou aqui";exit;