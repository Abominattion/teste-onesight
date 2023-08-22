<?php 

// src/Controller/HomeController.php
namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    private UsersRepository $userRepository;

    public function __construct(UsersRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        $users = $this->userRepository->findAll();
        
        return $this->render('home/index.html.twig');
    }
}
