<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class PokedeckController extends AbstractController
{
    #[Route('/pokedeck', name: 'pokedeck')]
    public function index(PokemonRepository $pokemons): Response
    {
      return $this->render('pokedeck/index.html.twig', [
          'pokemons' => $pokemons->findBy([],[], 50)
      ]);
    }
    
    #[Route('pokedeck/{id}', name: 'pokemon')]
    public function pokemon(Pokemon $pokemon): Response
    {
      $json = json_encode($pokemon);
      $response = new Response($json);
      $response->headers->set('Content-Type', 'application/json');
      return $response;
    }

    #[Route('pokedeck/favoris/add/{id}', name: 'add_favoris')]
    public function addFavoris(Pokemon $pokemon, EntityManagerInterface $entityManager): Response
    {
      $pokemon->addFavori($this->getUser());
      $entityManager->persist($pokemon);
      $entityManager->flush();
      
      $message = "ok";
      $json = json_encode($message);
      $response = new Response($json);
      $response->headers->set('Content-Type', 'application/json');
      return $response;
    }

    #[Route('pokedeck/favoris/remove/{id}', name: 'remove_favoris')]
    public function removeFavoris(Pokemon $pokemon, EntityManagerInterface $entityManager): Response
    {
      $pokemon->removeFavori($this->getUser());
      $entityManager->persist($pokemon);
      $entityManager->flush();
   
      $message = "ok";
      $json = json_encode($message);
      $response = new Response($json);
      $response->headers->set('Content-Type', 'application/json');
      return $response;
    }

    #[Route('pokedeck/compte/favoris/remove/{id}', name: 'remove_favoris_from_account')]
    public function removeFavorisAccount(Pokemon $pokemon, EntityManagerInterface $entityManager): Response
    {
      $pokemon->removeFavori($this->getUser());
      $entityManager->persist($pokemon);
      $entityManager->flush();
      return $this->redirectToRoute('app_compte');
    }
}
