<?php

namespace App\Controller;

use App\Entity\Revendeur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RevendeurController extends AbstractController
{
    /**
     * @Route("/revendeur", name="revendeur")
     */
    public function index()
    {
        $revendeurs = $this->getDoctrine()
            ->getManager()
            ->getRepository(Revendeur::class)
            ->findAll();

        return $this->render('revendeur/revendeurs.html.twig',
            [
                'revendeurs' => $revendeurs
            ]);
    }
}
