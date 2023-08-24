<?php

namespace App\Controller;


use App\Repository\PokemonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CountController extends AbstractController
{
    #[Route('/compte', name: 'app_compte')]
    public function index(PokemonRepository $pokemons): Response
    {

        return $this->render('compte/index.html.twig', [
            'pokemons' => $pokemons->findAll()
        ]);
    }
}
