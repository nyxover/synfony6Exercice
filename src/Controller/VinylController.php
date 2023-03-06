<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Psychosocial', 'artist' =>  'slipknot'],
            ['song' => '9eme symphonie', 'artist' =>  'Mozart'],
        ];

        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB & jams',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse($slug = null): Response
    {
        if ($slug) {
        $title = 'Genre: ' .u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $title = 'All Genres';
        }
        return new Response( $title);
        
    }
}