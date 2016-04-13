<?php

namespace SON\CatalogoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Catalogo
 *
 * @ORM\Table(name="son_catalogo")
 * @ORM\Entity(repositoryClass="SON\CatalogoBundle\Entity\CatalogoRepository")
 */
class Catalogo
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lancamento", type="datetime")
     */
    private $lancamento;

    /**
     * @var string
     *
     * @ORM\Column(name="imageName", type="string", length=255)
     */
    private $imageName;


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
     * Set name
     *
     * @param string $name
     * @return Catalogo
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Catalogo
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    
        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set lancamento
     *
     * @param \DateTime $lancamento
     * @return Catalogo
     */
    public function setLancamento($lancamento)
    {
        $this->lancamento = $lancamento;
    
        return $this;
    }

    /**
     * Get lancamento
     *
     * @return \DateTime 
     */
    public function getLancamento()
    {
        return $this->lancamento;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     * @return Catalogo
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    
        return $this;
    }

    /**
     * Get imageName
     *
     * @return string 
     */
    public function getImageName()
    {
        return $this->imageName;
    }
}
