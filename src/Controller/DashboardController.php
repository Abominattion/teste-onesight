<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(UserRepository $userRepository): Response
    {
        $stacks = [
            1 => 'Frontend',
            2 => 'Backend',
            3 => 'Fullstack',
            4 => 'DevOps',
            5 => 'Data Science',
            6 => 'QA',
            7 => 'Estágiario',
        ];

        $devs = [];
        $counts = [];

        foreach ($stacks as $stackId => $stackName) {
            $devs[$stackName] = $userRepository->findByStack($stackId);
            $counts[$stackName] = count($devs[$stackName]);
        }

        return $this->render('dashboard/index.html.twig', [
            'devs' => $devs,
            'devCounts' => $counts,
        ]);
    }
}
