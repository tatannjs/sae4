<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register', methods: ['POST'])]
    public function register(Request $request, EntityManagerInterface $entityManager): Response
    {
        $nom = $request->request->get('nom');
        $prenom = $request->request->get('prenom');
        $mail = $request->request->get('mail');
        $ville = $request->request->get('ville');
        $mot_de_passe = $request->request->get('mot_de_passe');
        $confirm_mot_de_passe = $request->request->get('confirm_mot_de_passe');
        $type_utilisateur = $request->request->get('type_utilisateur');

        if ($mot_de_passe !== $confirm_mot_de_passe) {
            // Gérer l'erreur de confirmation de mot de passe
            return $this->redirectToRoute('app_connexion');
        }

        $utilisateur = new Utilisateur();
        $utilisateur->setNomUti($nom);
        $utilisateur->setPrenomUti($prenom);
        $utilisateur->setMailUti($mail);
        $utilisateur->setAdrUti($ville);
        $utilisateur->setPwdUti(password_hash($mot_de_passe, PASSWORD_BCRYPT));

        $entityManager->persist($utilisateur);
        $entityManager->flush();

        // Rediriger vers la page de connexion ou une page de confirmation
        return $this->redirectToRoute('app_connexion');
    }
}

