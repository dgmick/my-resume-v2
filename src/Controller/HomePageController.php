<?php

namespace App\Controller;

use App\Entity\Experiences;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/experience', name: 'experience')]
    public function experience(ManagerRegistry $doctrine): Response
    {
        $experiences = $doctrine->getRepository(Experiences::class)->findBy(['isExperience' => true]);
        $educations = $doctrine->getRepository(Experiences::class)->findBy(['isExperience' => false]);

        return $this->render('home/resume.html.twig', [
            'experiences' => $experiences,
            'educations' => $educations,
        ]);
    }
}
