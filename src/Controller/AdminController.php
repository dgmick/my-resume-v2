<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ImportPdfType;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

#[Route(path: '/admin')]
class AdminController extends AbstractController
{
    #[Route(path: '/', name: 'app_admin')]
    public function login(Request $request): Response
    {
        $formPdf = $this->createForm(ImportPdfType::class);
        $formPdf->handleRequest($request);

        if ($formPdf->isSubmitted() && $formPdf->isValid()) {
            /** @var UploadedFile $pdfFile */
            $pdfFile = $formPdf->get('pdfFile')->getData();

            $file_path = $this->getParameter('file_path');

            $pdfFile->move(
                $file_path,
                $pdfFile->getClientOriginalName()
            );

            $this->addFlash('success', 'File updated');

            return $this->redirectToRoute('app_admin');
        }

        return $this->render('admin/index.html.twig', [
            'admin' => $this->getUser(),
            'formPdf' => $formPdf->createView(),
        ]);
    }
    #[Route(path: '/edit', name: 'app_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        $admin = $entityManager->getRepository(User::class)->find(1);
        $form = $this->createForm(UserType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/edit.html.twig', [
            'admin' => $admin,
            'form' => $form,
        ]);
    }
}
