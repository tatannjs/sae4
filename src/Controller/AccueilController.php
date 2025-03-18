<?php

namespace App\Controller;

use App\Repository\ProducteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(ProducteurRepository $producteurRepository): Response
    {
        // Récupérer tous les producteurs
        $producteurs = $producteurRepository->findAll();

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'producteurs' => $producteurs,
        ]);
    }

}
