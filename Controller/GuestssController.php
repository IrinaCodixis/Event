<?php

namespace Test\EventBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Test\EventBundle\Entity\Guestss;
use Test\EventBundle\Form\GuestssType;

/**
 * Guestss controller.
 *
 */
class GuestssController extends Controller
{

    /**
     * Lists all Guestss entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TestEventBundle:Guestss')->findAll();

        return $this->render('TestEventBundle:Guestss:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Guestss entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Guestss();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('test_event_show', array('id' => $entity->getId())));
        }

        return $this->render('TestEventBundle:Guestss:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Guestss entity.
     *
     * @param Guestss $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Guestss $entity)
    {
        $form = $this->createForm(new GuestssType(), $entity, array(
            'action' => $this->generateUrl('test_event_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Guestss entity.
     *
     */
    public function newAction()
    {
        $entity = new Guestss();
        $form   = $this->createCreateForm($entity);

        return $this->render('TestEventBundle:Guestss:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Guestss entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestEventBundle:Guestss')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Guestss entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestEventBundle:Guestss:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Guestss entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestEventBundle:Guestss')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Guestss entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestEventBundle:Guestss:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Guestss entity.
    *
    * @param Guestss $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Guestss $entity)
    {
        $form = $this->createForm(new GuestssType(), $entity, array(
            'action' => $this->generateUrl('test_event_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Guestss entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestEventBundle:Guestss')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Guestss entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('test_event_edit', array('id' => $id)));
        }

        return $this->render('TestEventBundle:Guestss:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Guestss entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TestEventBundle:Guestss')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Guestss entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('test_event'));
    }

    /**
     * Creates a form to delete a Guestss entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('test_event_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
