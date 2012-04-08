<?php

namespace Tuto\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tuto\BookBundle\Entity\Book;
use Tuto\BookBundle\Form\BookType;

/**
 * Book controller.
 *
 */
class BookController extends Controller
{
    /**
     * Lists all Book entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $book = $em->getRepository('BookBundle:Book')->findAll();

        return $this->render('BookBundle:Book:index.html.twig', array(
            'books' => $book
        ));
    }

    /**
     * Finds and displays a Book entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BookBundle:Book')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Book entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BookBundle:Book:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Book entity.
     *
     */
    public function newAction()
    {
        $entity = new Book();
        $form   = $this->createForm(new BookType(), $entity);

        return $this->render('BookBundle:Book:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Book entity.
     *
     */
    public function createAction()
    {
        $entity  = new Book();
        $request = $this->getRequest();
        $form    = $this->createForm(new BookType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('book_show', array('id' => $entity->getId())));
            
        }

        return $this->render('BookBundle:Book:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Book entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BookBundle:Book')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Book entity.');
        }

        $editForm = $this->createForm(new BookType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BookBundle:Book:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Book entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BookBundle:Book')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Book entity.');
        }

        $editForm   = $this->createForm(new BookType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('book_edit', array('id' => $id)));
        }

        return $this->render('BookBundle:Book:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Book entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('BookBundle:Book')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Book entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('book'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    public function currencyAction($lang)
    {   
        /*$curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);*/

        //$content = curl_exec($curl);
        //$xml = new SimpleXMLElement($content);
        return $lang; 
        //return $this->render('BookBundle:Book:index.html.twig', array('langue' => $langue));
        /*foreach ($xml->Cube->Cube->Cube as $value) {
            if($value['currency'] == 'USD'){
                echo $value['currency']." : ".$value['rate']."<br/>";
            } 
        }*/
    }
    
    public function topAction($max = 5)
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        
        $query = $em->createQueryBuilder();
        $query->select('b')
              ->from('BookBundle:Book', 'b')
              ->orderBy('b.price', 'ASC')
              ->setMaxResults($max);
        
        $execQuery = $query->getQuery();
        $books = $execQuery->getResult();
        
        return $this->container->get('templating')->renderResponse('BookBundle:Book:list.html.twig',
                array('books' => $books)
        );
    }
}
