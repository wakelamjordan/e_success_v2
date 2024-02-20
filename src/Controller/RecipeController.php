<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecipeController extends AbstractController
{
    #[Route('/recipe', name: 'app_recipe')]
    public function index(Request $request, RecipeRepository $repository, EntityManagerInterface $em): Response
    {
        $recipes=$repository->findWithDurationLowerThan(12);

        // $recipes[0]->setTitle('pâte-bolognaise');
        // $em->flush();
        // $em->remove($recipes[0]);
        // $em->flush();
        // dd($recipes);
        return $this->render('recipe/index.html.twig', [
            // 'controller_name' => 'RecipeController',
            'recipes'=>$recipes
        ]);
    }
    #[Route('/recipe/{slug}-{id}', name: 'app_recipe_show', requirements:['slug'=>'[a-z-]+','id'=>'\d+'])]
    public function show(Request $request, RecipeRepository $repository, string $slug, int $id): Response
    {
        // dd($id." ".$slug);
        $recipes=$repository->find($id);


        // dd($recipes);
        return $this->render('recipe/index.html.twig', [
            // 'controller_name' => 'RecipeController',
            'recipes'=>$recipes
        ]);
    }
}
