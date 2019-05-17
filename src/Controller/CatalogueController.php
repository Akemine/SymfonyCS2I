<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Livre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CatalogueController
 * @package App\Controller
 */
class CatalogueController extends AbstractController
{
    /**
     * @Route("/catalogue", name="catalogue")
     */
    /*    public function livres()
        {
            return $this->render('catalogue/livres.html.twig', [
                'controller_name' => 'CatalogueController',
            ]);
        }*/

    /**
     * @param $critere
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index($critere)
    {
        $genres = $this->getDoctrine()
            ->getManager()
            ->getRepository(Genre::class)
            ->findAll();

        $livres = $this->getDoctrine()
            ->getManager()
            ->getRepository(Livre::class);

            if ($critere == 'TOUT') {
                $livres = $livres ->findAll();
            } else {
                $livres = $livres ->findByCodeGenre($critere);
            }

        if ($livres == null) {
            throw $this->createNotFoundException('Genre de livre non trouvé');
        }

        return $this->render('catalogue/livres.html.twig', ['genres' => $genres, 'livres' => $livres]);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ficheLivre($id)
    {
        $livre = $this->getDoctrine()
            ->getManager()
            ->getRepository(Livre::class)
            ->find($id);

        if ($livre == null) {
            throw $this->createNotFoundException('Livre introuvable');
        }

        return $this->render('catalogue/fiche-livre.html.twig', ['livre' => $livre]);
    }

    /**
     *
     */
    public function extraireDesLivresParCritere()
    {
        $livres = $this->getDoctrine()
            ->getManager()
            ->getRepository(Livre::class)
            ->findByEditeur();
        if ($livres(count) == 0) {
            throw $this->createNotFoundException('Aucun livre trouvé');
        }
    }

    public function nouveautes(){
        $newLivres = $this->getDoctrine()
            ->getManager()
            ->getRepository( Livre::class)
            ->findByNouveaute(1);

        return $this->render('partials/nouveautes.html.twig', ['newLivres' => $newLivres]);
    }

    public function thisMonth(){
        $livreDuMois = $this->getDoctrine()
            ->getManager()
            ->getRepository( Livre::class)
            ->findOneById('LIV006');

        return $this->render('partials/thisMonth.html.twig', ['livreDuMois' => $livreDuMois]);
    }

    public function update(){
        $em = $this->getDoctrine()->getManager();
        $genre = $em->getRepository(Genre::class)->find('BD');

        $genre->setIntitule('Bande dédé');

        $em->flush();
    }

}
