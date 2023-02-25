<?php

namespace App\Controller;

use App\Entity\SkillChart;
use App\Form\SkillChartType;
use App\Repository\SkillChartRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/skill-chart')]
class SkillChartController extends AbstractController
{
    #[Route('/', name: 'app_skill_chart_index', methods: ['GET'])]
    public function index(SkillChartRepository $skillChartRepository): Response
    {
        return $this->render('skill_chart/index.html.twig', [
            'skill_charts' => $skillChartRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_skill_chart_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $skillChart = new SkillChart();
        $form = $this->createForm(SkillChartType::class, $skillChart);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($skillChart);
            $entityManager->flush();

            return $this->redirectToRoute('app_skill_chart_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('skill_chart/new.html.twig', [
            'skill_chart' => $skillChart,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_skill_chart_show', methods: ['GET'])]
    public function show(SkillChart $skillChart): Response
    {
        return $this->render('skill_chart/show.html.twig', [
            'skill_chart' => $skillChart,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_skill_chart_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SkillChart $skillChart, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SkillChartType::class, $skillChart);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_skill_chart_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('skill_chart/edit.html.twig', [
            'skill_chart' => $skillChart,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_skill_chart_delete', methods: ['POST'])]
    public function delete(Request $request, SkillChart $skillChart, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$skillChart->getId(), $request->request->get('_token'))) {
            $entityManager->remove($skillChart);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_skill_chart_index', [], Response::HTTP_SEE_OTHER);
    }
}
