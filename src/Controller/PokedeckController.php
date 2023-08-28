<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;


class PokedeckController extends AbstractController
{
    #[Route('/pokemons', name: 'pokemons')]
    public function index(PokemonRepository $pokemons, Request $request, PaginatorInterface $paginator): Response
    {
      $pagination = $paginator->paginate(
        $pokemons->paginationQuery(),
        $request->query->get('page',1),
        50
      );
      return $this->render('pokemons/index.html.twig', [
          
          'pagination' => $pagination
      ]);
    }
    
    #[Route('pokemons/{id}', name: 'pokemon')]
    public function pokemon(Pokemon $pokemon): Response
    {
      $json = json_encode($pokemon);
      $response = new Response($json);
      $response->headers->set('Content-Type', 'application/json');
      return $response;
    }

    #[Route('pokemons/favoris/add/{id}', name: 'add_favoris')]
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

    #[Route('pokemons/favoris/remove/{id}', name: 'remove_favoris')]
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

    #[Route('pokemons/compte/favoris/remove/{id}', name: 'remove_favoris_from_account')]
    public function removeFavorisAccount(Pokemon $pokemon, EntityManagerInterface $entityManager): Response
    {
      $pokemon->removeFavori($this->getUser());
      $entityManager->persist($pokemon);
      $entityManager->flush();
      return $this->redirectToRoute('app_compte');
    }

    #[Route('/recherche', name: 'search')]
    public function search(): response
    {
      return $this->render('search/index.html.twig');
    }
}
