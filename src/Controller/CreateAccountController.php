<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\CreateAccountType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CreateAccountController extends AbstractController
{
    #[Route('/create-account', name: 'createAccount')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $user = new Utilisateur();
        // Attention : utiliser le bon formulaire ici (CreateAccountType)
        $form = $this->createForm(CreateAccountType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Votre compte a été créé avec succès !');

            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('create_account/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}