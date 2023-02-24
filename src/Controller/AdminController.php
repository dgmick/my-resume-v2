<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(path: '/admin')]
class AdminController extends AbstractController
{
    #[Route(path: '/', name: 'app_admin')]
    public function login(): Response
    {
        return $this->render('admin/index.html.twig');
    }
}