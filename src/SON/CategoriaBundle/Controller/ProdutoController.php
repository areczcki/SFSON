<?php

namespace SON\CategoriaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SON\CategoriaBundle\Entity\Produto;
use SON\CategoriaBundle\Form\ProdutoType;

/**
 * Produto controller.
 *
 */
class ProdutoController extends Controller
{
    /**
     * Lists all Produto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CategoriaBundle:Produto')->findAll();

        return $this->render('CategoriaBundle:Produto:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Produto entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CategoriaBundle:Produto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CategoriaBundle:Produto:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Produto entity.
     *
     */
    public function newAction()
    {
        $entity = new Produto();
        $form   = $this->createForm(new ProdutoType(), $entity);

        return $this->render('CategoriaBundle:Produto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Produto entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Produto();
        $form = $this->createForm(new ProdutoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('produto_show', array('id' => $entity->getId())));
        }

        return $this->render('CategoriaBundle:Produto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Produto entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CategoriaBundle:Produto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produto entity.');
        }

        $editForm = $this->createForm(new ProdutoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CategoriaBundle:Produto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Produto entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CategoriaBundle:Produto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProdutoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('produto_edit', array('id' => $id)));
        }

        return $this->render('CategoriaBundle:Produto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Produto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CategoriaBundle:Produto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Produto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('produto'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
