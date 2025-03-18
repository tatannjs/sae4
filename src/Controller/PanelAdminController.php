<?php
namespace App\Controller;

use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanelAdminController extends AbstractController
{
    #[Route('/admin/users', name: 'admin_users')]
    public function listUsers(UtilisateurRepository $userRepository): Response
    {
        $queryBuilder = $userRepository->createQueryBuilder('u');
        $query = $queryBuilder
            ->select('u')
            ->getQuery();

        $users = $query->getResult();


        // VERIFIER PRESENCE DE DONNES
        //dump($users);
        //die();


        return $this->render('panelAdministrateur/paneladministrateur.html.twig', [
            'users' => $users,
        ]);
    }
}

