<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Form\GenreType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GenreAdminController extends AbstractController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function addGenre(Request $request)
    {
        $titre = 'Ajouter';

        $genre = new Genre('', '');
        $form = $this->createForm(GenreType::class, $genre);



        // il faut penser à ajouter un objet request
        // l'objet form va reçevoir les infos et les mettres dans l'objet $genre
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //Le genre est ok. On peut le stocker dans la bdd
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($genre);
            $entityManager->flush();

            $this->get('session')
                ->getFlashBag()
                ->set('message', 'Le genre ' . $genre -> getCode() .' a été ajouté avec succès');

            return $this->redirectToRoute('gigastore_admin_genres');
        }

        return $this->render('genre_admin/formulaire-genre.html.twig',
            [
                'vueFormulaire' => $form->createView(),
                'titre' => $titre
            ]);
    }

    public function editGenre(Request $request, $codeGenre)
    {
        $titre = 'Modifier';

        $genre = $this->getDoctrine()
            ->getManager()
            ->getRepository(Genre::class)
            ->find($codeGenre);

        $form = $this->createForm(GenreType::class, $genre);

        // il faut penser à ajouter un objet request
        // l'objet form va reçevoir les infos et les mettres dans l'objet $genre
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //Le genre est ok. On peut le stocker dans la bdd
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->get('session')
                ->getFlashBag()
                ->set('message', 'Le genre ' . $codeGenre . ' a été modifié avec succès');

            return $this->redirectToRoute('gigastore_admin_genres');
        }

        return $this->render('genre_admin/formulaire-genre.html.twig',
            [
                'vueFormulaire' => $form->createView(),
                'titre' => $titre
            ]);
    }

    public function deleteGenre($codeGenre)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $genre = $entityManager->getRepository(Genre::class)
            ->find($codeGenre);

        if ($genre == null) {
            throw $this->createNotFoundException('Genre introuvable');
        }
        $this->get('session')
            ->getFlashBag()
            ->set('message', 'Le genre ' . $codeGenre . ' a été supprimé avec succès');
        $entityManager->remove($genre);

        $entityManager->flush();

        return $this->redirectToRoute('gigastore_admin_genres');
    }

    public function afficherLesGenres()
    {
        $genres = $this->getDoctrine()
            ->getManager()
            ->getRepository(Genre::class)
            ->findAll();

        return $this->render('genre_admin/genres.html.twig',
            [
                'genres' => $genres
            ]);
    }
}
