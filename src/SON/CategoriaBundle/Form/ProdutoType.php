<?php

namespace SON\CategoriaBundle\Form;

use Proxies\__CG__\SON\CategoriaBundle\Entity\Categoria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProdutoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('unidade')
            //->add('Categoria')
        ;


    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SON\CategoriaBundle\Entity\Produto'
        ));
    }

    public function getName()
    {
        return 'son_categoriabundle_produtotype';
    }
}
