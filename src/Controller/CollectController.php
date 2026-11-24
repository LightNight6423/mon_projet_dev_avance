<?php

namespace App\Controller;

use App\Entity\Collect;
use App\Form\FormType;
use App\Enum\StatutJeuEnum;
use App\Repository\CollectRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/collect')]
final class CollectController extends AbstractController
{
    #[Route(name: 'app_collect_index', methods: ['GET'])]
    public function index(Request $request, CollectRepository $collectRepository, UtilisateurRepository $utilisateurRepository): Response
    {
        // Filtres passés en GET : ?utilisateur=<id>&statut=<valeur de l'enum>
        $utilisateurId = $request->query->getInt('utilisateur');
        $utilisateur = $utilisateurId > 0 ? $utilisateurRepository->find($utilisateurId) : null;
        $statut = StatutJeuEnum::tryFrom($request->query->getString('statut'));

        return $this->render('collect/index.html.twig', [
            'collects' => $collectRepository->findByFilters($utilisateur, $statut),
            'utilisateurs' => $utilisateurRepository->findBy([], ['pseudo' => 'ASC']),
            'statuts' => StatutJeuEnum::cases(),
            'filtreUtilisateur' => $utilisateur,
            'filtreStatut' => $statut,
        ]);
    }

    #[Route('/new', name: 'app_collect_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UtilisateurRepository $utilisateurRepository): Response
    {
        $collect = new Collect();
        // Pré-sélection du joueur depuis la liste des utilisateurs (?utilisateur=<id>)
        if ($utilisateur = $utilisateurRepository->find($request->query->getInt('utilisateur'))) {
            $collect->setUtilisateur($utilisateur);
        }
        // Valeurs par défaut : ces colonnes ne sont pas nullables et ne sont plus saisies à la main
        $now = new \DateTimeImmutable();
        $collect->setCreatedAt($now);
        $collect->setDateModifStatut($now);
        $collect->setDateAchat($now);

        $form = $this->createForm(FormType::class, $collect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($collect);
            $entityManager->flush();

            return $this->redirectToRoute('app_collect_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('collect/new.html.twig', [
            'collect' => $collect,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_collect_show', methods: ['GET'])]
    public function show(Collect $collect): Response
    {
        return $this->render('collect/show.html.twig', [
            'collect' => $collect,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_collect_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Collect $collect, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FormType::class, $collect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $collect->setUpdatedAt(new \DateTimeImmutable());
            $entityManager->flush();

            return $this->redirectToRoute('app_collect_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('collect/edit.html.twig', [
            'collect' => $collect,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_collect_delete', methods: ['POST'])]
    public function delete(Request $request, Collect $collect, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$collect->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($collect);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_collect_index', [], Response::HTTP_SEE_OTHER);
    }
}