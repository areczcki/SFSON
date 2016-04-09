<?php

namespace SON\CategoriaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * 1 - Crie um bundle chamado Categoria e crie uma rota /categorias e adicione na sua action
     * um array de categorias de produtos pré-definidas. Ao acessar o /categorias deve ser listado
     * td conteúdo deste array.
     */
    public function indexAction()
    {
        $categorias = $this->listarCategorias();
        return $this->render('CategoriaBundle:Default:index.html.twig', array('categorias' => $categorias));
    }

    private function listarCategorias()
    {
        $categorias = array (
            'COMIDA' =>  array('ARROZ', 'FEIJAO'),
            'HIGIENE' => array('SHAMPO', 'SABONETE'),
            'LIMPEZA' => array('DETERGENTE', 'ESPONJA')
        );

        return $categorias;
    }
}
