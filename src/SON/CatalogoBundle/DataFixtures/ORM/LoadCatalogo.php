<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 23/04/2016
 * Time: 00:15
 */

namespace SON\CatalogoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SON\CatalogoBundle\Entity\Catalogo;

class LoadCatalogoData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $catalogo = new Catalogo();
        $catalogo->setName("Lustres Finos");
        $catalogo->setDescricao("Descrição dos Lustres Finos");
        $catalogo->setLancamento(new \DateTime("tomorrow noon"));
        $catalogo->setImageName("simples.jpg");

        $catalogo2 = new Catalogo();
        $catalogo2->setName("Lustres Simples");
        $catalogo2->setDescricao("Descrição dos Lustres Simples");
        $catalogo2->setLancamento(new \DateTime("tomorrow noon"));

        $manager->persist($catalogo);
        $manager->persist($catalogo2);

        $manager->flush();
    }
}