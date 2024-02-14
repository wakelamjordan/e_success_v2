<?php

namespace App\Controller;

use App\Entity\People;
use App\Form\PeopleType;
use Doctrine\ORM\EntityManager;
use App\Repository\PeopleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PeopleController extends AbstractController
{
    #[Route('/people', name: 'app_people')]
    public function index(PeopleRepository $pr): Response
    {
        $peoples = $pr->findAll();
        return $this->render('people/index.html.twig', [
            'peoples' => $peoples,
            'nbre' => count($peoples)
        ]);
    }
    #[Route('/people/edit/{id}', name: 'app_people_edit', methods: ['GET'])]
    public function edit(PeopleRepository $pr,int $id=0,Request $request)
    {
        if ($id) {
            $people = $pr->find($id);
        } else {
            $people=new People;
        }

        $form=$this->createForm(PeopleType::class,$people);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            dd('validé');
        }
        return $this->render("people/form.html.twig",['form'=>$form->createView()]);
    }
}
