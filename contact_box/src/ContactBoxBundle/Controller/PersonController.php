<?php

namespace ContactBoxBundle\Controller;

use ContactBoxBundle\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class PersonController extends Controller {

    /**
     * Lists all person entities.
     * @Template
     * @Route("/", name="index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $people = $em->getRepository('ContactBoxBundle:Person')->findAll();
        //$deleteForm = $this->createDeleteForm();
        return array(
            'people' => $people,
                //'delete_form' => $deleteForm->createView()
        );
    }

    /**
     * Creates a new person entity.
     * 
     * @Template
     * @Route("/new", name="person_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $person = new Person();
        $form = $this->createForm('ContactBoxBundle\Form\PersonType', $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush($person);

            return $this->redirectToRoute('person_show', array('id' => $person->getId()));
        }

        return array(
                    'person' => $person,
                    'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a person entity.
     *
     * @Template
     * @Route("/{id}", name="person_show")
     * @Method("GET")
     */
    public function showAction(Person $person) {
        //$deleteForm = $this->createDeleteForm($person);

        return array(
                    'person' => $person,
                    //'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing person entity.
     *
     * @Template
     * @Route("/{id}/modify", name="person_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Person $person) {
        //$deleteForm = $this->createDeleteForm($person);
        $editForm = $this->createForm('ContactBoxBundle\Form\PersonType', $person);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('person_edit', array('id' => $person->getId()));
        }

        return array(
                    'person' => $person,
                    'edit_form' => $editForm->createView(),
                    //'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a person entity.
     *
     * @Template
     * @Route("/{id}/delete", name="person_delete")
     * @Method("GET")
     */
    public function deleteAction(Person $id) {
//        $form = $this->createDeleteForm($person);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($person);
//            $em->flush($person);
//        }
        
        
            $em = $this->getDoctrine()->getManager();
            $person = $em->getRepository("ContactBoxBundle:Person")->find($id);
            $em->remove($person);
            $em->flush($person);
        
        return $this->redirectToRoute('index');
    }

    /**
     * Creates a form to delete a person entity.
     *
     * @param Person $person The person entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Person $person) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('person_delete', array('id' => $person->getId())))
                        ->setMethod('GET')
                        ->getForm()
        ;
    }

//    private function createDeleteForm(Person $person)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('person_delete', array('id' => $person->getId())))
//            ->setMethod('DELETE')
//            ->getForm()
//        ;
//    }
}
