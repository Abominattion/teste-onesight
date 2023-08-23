<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class DashboardController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(UserRepository $userRepository): Response
    {

        $token = $this->security->getToken();
        
        if ($token !== null) {
            $user = $token->getUser();

            if ($user instanceof User) {
                $level = $user->getLevel();
                
                if ($level < 1 ||$level !== 1) {
                    return $this->redirect('/');
                }
            }
        }

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
