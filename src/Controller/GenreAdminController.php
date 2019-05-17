<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GenreAdminController extends AbstractController
{
    /**
     * @param Request $request
     * @param $entity
     * @return Response
     */
    public function addEntity(Request $request, $entity)
    {
        $titre = 'Ajouter';

        $objet = "App\\Entity\\".$entity;
        $instance = new $objet;
        $form = $this->createForm( "App\\Form\\".$entity.'Type', $instance);

        // il faut penser à ajouter un objet request
        // l'objet form va reçevoir les infos et les mettres dans l'objet $genre
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //Le genre est ok. On peut le stocker dans la bdd
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($instance);
            $entityManager->flush();

            $this->get('session')
                ->getFlashBag()
                ->set('message', 'Le genre ' . $instance -> getCode() .' a été ajouté avec succès');

            return $this->redirectToRoute('gigastore_admin_list_entity', ['entity' => $entity]);
        }

        return $this->render('entity_admin/formulaire-entity.html.twig',
            [
                'vueFormulaire' => $form->createView(),
                'titre' => $titre,
                'entity' => $entity
            ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @param $entity
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function editEntity(Request $request, $id, $entity)
    {
        $titre = 'Modifier';

        $items = $this->getDoctrine()
            ->getManager()
            ->getRepository("App\\Entity\\".$entity)
            ->find($id);

        $form = $this->createForm("App\\Form\\".$entity.'Type', $items);

        // il faut penser à ajouter un objet request
        // l'objet form va reçevoir les infos et les mettres dans l'objet $genre
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //Le genre est ok. On peut le stocker dans la bdd
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->get('session')
                ->getFlashBag()
                ->set('message', 'Le genre ' . $id . ' a été modifié avec succès');

            return $this->redirectToRoute('gigastore_admin_list_entity', ['entity' => $entity]);
        }

        return $this->render('entity_admin/formulaire-entity.html.twig',
            [
                'vueFormulaire' => $form->createView(),
                'titre' => $titre,
                'items' => $items,
                'entity' => $entity
            ]);
    }

    /**
     * @param $codeGenre
     * @param $entity
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteEntity($id, $entity)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $instance = $entityManager->getRepository("App\\Entity\\".$entity)
            ->find($id);

        if ($instance == null) {
            throw $this->createNotFoundException($entity.' introuvable');
        }
        $this->get('session')
            ->getFlashBag()
            ->set('message', 'Le genre ' . $id . ' a été supprimé avec succès');
        $entityManager->remove($instance);

        $entityManager->flush();

        return $this->redirectToRoute('gigastore_admin_list_entity', ['entity' => $entity]);
    }

    public function DisplayEntity($entity)
    {
        $items = $this->getDoctrine()
            ->getManager()
            ->getRepository('App\\Entity\\'.$entity)
            ->findAll();

        $formTypeName = "App\\Form\\".$entity."Type";
        $FormTypeName = new $formTypeName;

        $labels = $FormTypeName->getList();
        $primaryKey = $FormTypeName->getPrimaryKey();

        return $this->render('entity_admin/entity.html.twig',
            [
                'items' => $items,
                'entity' => $entity,
                'labels' => $labels,
                'primaryKey' => $primaryKey
            ]);
    }
}
