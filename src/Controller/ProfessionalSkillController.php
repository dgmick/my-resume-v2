<?php

namespace App\Controller;

use App\Entity\ProfessionalSkill;
use App\Form\ProfessionalSkillType;
use App\Repository\ProfessionalSkillRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/professional-skill')]
class ProfessionalSkillController extends AbstractController
{
    #[Route('/', name: 'app_professional_skill_index', methods: ['GET'])]
    public function index(ProfessionalSkillRepository $professionalSkillRepository): Response
    {
        return $this->render('professional_skill/index.html.twig', [
            'professional_skills' => $professionalSkillRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_professional_skill_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $professionalSkill = new ProfessionalSkill();
        $form = $this->createForm(ProfessionalSkillType::class, $professionalSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($professionalSkill);
            $entityManager->flush();

            return $this->redirectToRoute('app_professional_skill_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('professional_skill/new.html.twig', [
            'professional_skill' => $professionalSkill,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_professional_skill_show', methods: ['GET'])]
    public function show(ProfessionalSkill $professionalSkill): Response
    {
        return $this->render('professional_skill/show.html.twig', [
            'professional_skill' => $professionalSkill,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_professional_skill_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ProfessionalSkill $professionalSkill, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProfessionalSkillType::class, $professionalSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_professional_skill_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('professional_skill/edit.html.twig', [
            'professional_skill' => $professionalSkill,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_professional_skill_delete', methods: ['POST'])]
    public function delete(Request $request, ProfessionalSkill $professionalSkill, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$professionalSkill->getId(), $request->request->get('_token'))) {
            $entityManager->remove($professionalSkill);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_professional_skill_index', [], Response::HTTP_SEE_OTHER);
    }
}
