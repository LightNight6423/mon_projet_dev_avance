<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/')]
class DefaultController extends AbstractController
{
    #[Route('/', 'default_index', methods: ['GET', 'POST'])]

    public function index(): Response
    {
        return $this->render('index.html.twig', []);
    }
}