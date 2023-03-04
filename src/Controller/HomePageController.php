<?php

namespace App\Controller;

use App\Entity\Experiences;
use App\Entity\ProfessionalSkill;
use App\Entity\SkillChart;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $admin = $doctrine->getRepository(User::class)->find(1);

        $experiences = $doctrine->getRepository(Experiences::class)->findBy(['isExperience' => true], ['id' => 'DESC']);
        $educations = $doctrine->getRepository(Experiences::class)->findBy(['isExperience' => false], ['id' => 'DESC']);

        $skillCharts = $doctrine->getRepository(SkillChart::class)->getList();
        $professionalSkills = $doctrine->getRepository(ProfessionalSkill::class)->getProfessionalSkillsByGroup();

        return $this->render('home/index.html.twig', [
            'admin' => $admin,
            'experiences' => $experiences,
            'educations' => $educations,
            'skillCharts' => $skillCharts,
            'professionalSkills' => $professionalSkills,
        ]);
    }
}
