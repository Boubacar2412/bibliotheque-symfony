<?php

namespace App\Controller;

use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/livre')]
class LivreController extends AbstractController
{
    #[Route(name: 'app_livre_index', methods: ['GET'])]
    #[IsGranted('ROLE_USER')] // accessible à tout utilisateur connecté
    public function index(LivreRepository $livreRepository): Response
    {
        $livres = $livreRepository->findAll();

        return $this->render('livre/index.html.twig', [
            'livres' => $livres,
        ]);
    }

    #[Route('/new', name: 'app_livre_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')] // seul l'admin peut créer un livre
    public function new()
    {
        // Ton code pour créer un livre (formulaire, persistance, etc.)
    }

    // Pareil pour edit, delete avec ROLE_ADMIN
}
