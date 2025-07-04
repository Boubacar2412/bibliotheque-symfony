<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\LivreType;
use App\Repository\LivreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/livre')]
class LivreController extends AbstractController
{
    #[Route(name: 'app_livre_index', methods: ['GET'])]
    #[IsGranted('ROLE_USER')] // Tout utilisateur connecté peut voir la liste
    public function index(LivreRepository $livreRepository): Response
    {
        $livres = $livreRepository->findAll();

        return $this->render('livre/index.html.twig', [
            'livres' => $livres,
        ]);
    }

    #[Route('/new', name: 'app_livre_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')] // Seul l'admin peut créer un livre
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($livre);
            $entityManager->flush();

            $this->addFlash('success', 'Livre créé avec succès !');

            return $this->redirectToRoute('app_livre_index');
        }

        return $this->render('livre/new.html.twig', [
            'livre' => $livre,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_livre_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')] // Seul l'admin peut modifier un livre
    public function edit(Request $request, Livre $livre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Livre modifié avec succès !');

            return $this->redirectToRoute('app_livre_index');
        }

        return $this->render('livre/edit.html.twig', [
            'livre' => $livre,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_livre_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')] // Seul l'admin peut supprimer un livre
    public function delete(Request $request, Livre $livre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$livre->getId(), $request->request->get('_token'))) {
            $entityManager->remove($livre);
            $entityManager->flush();

            $this->addFlash('success', 'Livre supprimé avec succès !');
        }

        return $this->redirectToRoute('app_livre_index');
    }

    #[Route('/{id}', name: 'app_livre_show', methods: ['GET'])]
    #[IsGranted('ROLE_USER')] // Tout utilisateur connecté peut voir le détail d'un livre
    public function show(Livre $livre): Response
    {
        return $this->render('livre/show.html.twig', [
            'livre' => $livre,
        ]);
    }
}
