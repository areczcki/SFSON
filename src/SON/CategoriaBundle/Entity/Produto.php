<?php

namespace SON\CategoriaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produto
 *
 * @ORM\Table(name="produto")
 * @ORM\Entity(repositoryClass="SON\CategoriaBundle\Entity\ProdutoRepository")
 */
class Produto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var integer
     *
     * @ORM\Column(name="unidade", type="integer")
     */
    private $unidade;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Produto
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set unidade
     *
     * @param integer $unidade
     * @return Produto
     */
    public function setUnidade($unidade)
    {
        $this->unidade = $unidade;
    
        return $this;
    }

    /**
     * Get unidade
     *
     * @return integer 
     */
    public function getUnidade()
    {
        return $this->unidade;
    }
}
