<?php

namespace Tuto\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tuto\BookBundle\Entity\Author;
use Tuto\BookBundle\Form\AuthorType;

/**
 * Author controller.
 *
 */
class AuthorController extends Controller
{
    /**
     * Lists all Author entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $authors = $em->getRepository('BookBundle:Author')->findAll();

        return $this->render('BookBundle:Author:index.html.twig', array(
            'authors' => $authors
        ));
    }

    /**
     * Finds and displays a Author entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BookBundle:Author')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Author entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BookBundle:Author:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Author entity.
     *
     */
    public function newAction()
    {
        $entity = new Author();
        $form   = $this->createForm(new AuthorType(), $entity);

        return $this->render('BookBundle:Author:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Author entity.
     *
     */
    public function createAction()
    {
        $entity  = new Author();
        $request = $this->getRequest();
        $form    = $this->createForm(new AuthorType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('author_show', array('id' => $entity->getId())));
            
        }

        return $this->render('BookBundle:Author:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Author entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BookBundle:Author')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Author entity.');
        }

        $editForm = $this->createForm(new AuthorType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BookBundle:Author:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Author entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BookBundle:Author')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Author entity.');
        }

        $editForm   = $this->createForm(new AuthorType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('author_edit', array('id' => $id)));
        }

        return $this->render('BookBundle:Author:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Author entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('BookBundle:Author')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Author entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('author'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    public function topAction($max = 5)
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        
        $query = $em->createQueryBuilder();
        $query->select('a')
              ->from('BookBundle:Author', 'a')
              ->orderBy('a.name', 'ASC')
              ->setMaxResults($max);
        
        $execQuery = $query->getQuery();
        $authors = $execQuery->getResult();
        
        return $this->container->get('templating')->renderResponse('BookBundle:Author:list.html.twig',
                array('authors' => $authors)
        );
    }
}
