<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request)
    {

        // Formulaire
        $defaultData = [];
        $form = $this->createForm(ContactFormType::class, $defaultData);

        //Traitement du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            //Rendu des résultats
            return $this->render('contact/contact-confirmation.html.twig', ['formdata' => $data]);
        }

        //Rendu du formulaire
        return $this->render('contact/contact.html.twig',
            ['vueFormulaire' => $form->createView()]
        );
    }
}
