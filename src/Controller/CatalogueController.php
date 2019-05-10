<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CatalogueController extends AbstractController
{
    /**
     * @Route("/catalogue", name="catalogue")
     */
    public function livres()
    {
        return $this->render('catalogue/livres.html.twig', [
            'controller_name' => 'CatalogueController',
        ]);
    }
}
