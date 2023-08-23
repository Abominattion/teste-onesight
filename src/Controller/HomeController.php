<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {      
        $vagas = $this->vagas();

        return $this->render('home/index.html.twig', [
            'vagas' => $vagas,
        ]);
    }

    public function vagas()
    {
        $vagas = [
            [
                'tipo' => 'Backend',
                'titulo' => 'Desenvolvedor PHP',
                'descricao' => 'Desenvolvimento de aplicações web utilizando PHP e frameworks relacionados.',
                'capa' => 'https://source.unsplash.com/1000x1000/?Backend,php,python'
            ],
            [
                'tipo' => 'Frontend',
                'titulo' => 'Designer de UI/UX',
                'descricao' => 'Criação de interfaces de usuário atraentes e intuitivas, focadas na experiência do usuário.',
                'capa' => 'https://source.unsplash.com/1000x1000/?html,css,javascript'
            ],
            [
                'tipo' => 'Fullstack',
                'titulo' => 'Engenheiro de Software Fullstack',
                'descricao' => 'Trabalhar tanto no desenvolvimento frontend quanto backend, lidando com todos os aspectos de uma aplicação.',
                'capa' => 'https://source.unsplash.com/1000x1000/?Fullstack'
            ],
            [
                'tipo' => 'Data Science',
                'titulo' => 'Cientista de Dados',
                'descricao' => 'Análise de dados, modelagem estatística e construção de soluções baseadas em dados.',
                'capa' => 'https://source.unsplash.com/1000x1000/?DataScience'
            ],
            [
                'tipo' => 'DevOps',
                'titulo' => 'Engenheiro DevOps',
                'descricao' => 'Gerenciamento de infraestrutura, integração contínua e implantação automatizada.',
                'capa' => 'https://source.unsplash.com/1000x1000/?IT,infra,aws'
            ],
            [
                'tipo' => 'Mobile',
                'titulo' => 'Desenvolvedor iOS/Android',
                'descricao' => 'Criação de aplicativos móveis elegantes e funcionais para plataformas iOS e Android.',
                'capa' => 'https://source.unsplash.com/1000x1000/?flutter,android'
            ]
        ];
        
        return $vagas;
    }
}
