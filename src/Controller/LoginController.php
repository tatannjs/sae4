<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_connexion')]
    public function index(): Response
    {
        $user = new Utilisateur();
        $form = $this->createForm(LoginType::class, $user);
        return $this->render('login/index.html.twig', [
            'form'=> $form,
        ]);
    }
}
