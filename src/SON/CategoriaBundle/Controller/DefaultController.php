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
        return $this->render('CategoriaBundle:Default:exercicio1.html.twig',array('categorias' => $categorias));
    }

    public function buscarCategoriaMaisProdutoAction($nomeCategoria, $nomeProduto)
    {
        $nomeCategoria = strtoupper($nomeCategoria);
        $nomeProduto = strtoupper($nomeProduto);

        $categoriaArray = $this->listarCategorias();

        $mensagem = null;
        if (! array_key_exists($nomeCategoria, $categoriaArray)) {
            $mensagem = "Categoria nao cadastrada";
            return $this->render('CategoriaBundle:Default:exercicio2.html.twig',array('mensagem' => $mensagem));
        }

        $categoria = $categoriaArray[$nomeCategoria];
        if (! in_array($nomeProduto, $categoria)) {
            $mensagem = "O produto $nomeProduto nao esta cadastrado ou nao pertence a categoria $nomeCategoria";
        }else{
            $mensagem = "A categoria $nomeCategoria é do produto $nomeProduto.";
        }

        return $this->render('CategoriaBundle:Default:exercicio2.html.twig',array('mensagem' => $mensagem));
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
