<?php

namespace App\Controller;

use App\Entity\JeuVideo;
use App\Form\JeuVideoType;
use App\Repository\JeuVideoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/jeu_video')]
final class JeuVideoController extends AbstractController
{
    #[Route(name: 'app_jeu_video_index', methods: ['GET'])]
    public function index(JeuVideoRepository $jeuVideoRepository): Response
    {
        return $this->render('jeu_video/index.html.twig', [
            'jeu_videos' => $jeuVideoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_jeu_video_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request, 
        EntityManagerInterface $entityManager, 
        SluggerInterface $slugger, 
        #[Autowire('%kernel.project_dir%/public/uploads')] string $projectDir): Response
    {
        $jeuVideo = new JeuVideo();
        $jeuVideo->setCreatedAt(new \DateTimeImmutable);
        $form = $this->createForm(JeuVideoType::class, $jeuVideo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile|null $imageFile */
            $imageFile = $form->get('image')->getData();   // 1. récupérer le fichier

            if ($imageFile) {
                // 2. nom unique et parlant : titre du jeu slugifié + identifiant unique
                $nomBase = $slugger->slug($jeuVideo->getTitre());
                $nouveauNom = $nomBase . '-' . uniqid() . '.' . $imageFile->guessExtension();

                try {
                    // 3. déplacer dans public/uploads
                    $imageFile->move($projectDir, $nouveauNom);
                    // 4. sauvegarder le nom dans l'entité
                    $jeuVideo->setImageUrl($nouveauNom);
                } catch (FileException $e) {
                    $this->addFlash('error', "L'image n'a pas pu être enregistrée.");
                    return $this->render('jeu_video/new.html.twig', [
                        'jeu_video' => $jeuVideo,
                        'form' => $form,
                    ]);
                }
            }

            $entityManager->persist($jeuVideo);
            $entityManager->flush();

            return $this->redirectToRoute('app_jeu_video_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('jeu_video/new.html.twig', [
            'jeu_video' => $jeuVideo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_jeu_video_show', methods: ['GET'])]
    public function show(JeuVideo $jeuVideo): Response
    {
        return $this->render('jeu_video/show.html.twig', [
            'jeu_video' => $jeuVideo,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_jeu_video_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request, 
        JeuVideo $jeuVideo, 
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger,
        #[Autowire('%kernel.project_dir%/public/uploads')] string $projectDir
        ): Response
    {
        $form = $this->createForm(JeuVideoType::class, $jeuVideo);
        $form->handleRequest($request);
        $jeuVideo->setUpdatedAt(new \DateTimeImmutable());

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile|null $imageFile */
            $imageFile = $form->get('image')->getData();   // 1. récupérer le fichier

            if ($imageFile) {
                // 2. nom unique et parlant : titre du jeu slugifié + identifiant unique
                $nomBase = $slugger->slug($jeuVideo->getTitre());
                $nouveauNom = $nomBase . '-' . uniqid() . '.' . $imageFile->guessExtension();

                try {
                    // 3. déplacer dans public/uploads
                    $imageFile->move($projectDir, $nouveauNom);
                    // 4. sauvegarder le nom dans l'entité
                    $jeuVideo->setImageUrl($nouveauNom);
                } catch (FileException $e) {
                    $this->addFlash('error', "L'image n'a pas pu être enregistrée.");
                    return $this->render('jeu_video/new.html.twig', [
                        'jeu_video' => $jeuVideo,
                        'form' => $form,
                    ]);
                }
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_jeu_video_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('jeu_video/edit.html.twig', [
            'jeu_video' => $jeuVideo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_jeu_video_delete', methods: ['POST'])]
    public function delete(Request $request, JeuVideo $jeuVideo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jeuVideo->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($jeuVideo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_jeu_video_index', [], Response::HTTP_SEE_OTHER);
    }
}
