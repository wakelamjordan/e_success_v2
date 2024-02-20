<?php

namespace App\Controller;

use App\Entity\Menu;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MenuController extends AbstractController
{
    #[Route('/menu', name: 'app_menu')]
    public function index(EntityManagerInterface $em): Response
    {
        $menus=$em->getRepository(Menu::class)->findAll();
        $menus=$this->list_menu(null,0,$menus);

        return $this->render('menu/index.html.twig', [
            'controller_name' => 'MenuController',
            'menus' => $menus,
        ]);
    }

    private function list_menu($parent, $niveau, $menus):string
    {
        $html="";
        foreach($menus as $menu){
            $id=$menu->getId();
            $rank=$menu->getRank();
            $label=$menu->getLabel();
            $url=$menu->getUrl();
            $role=$menu->getRole();
            $icone=$menu->getIcone();
            $parentMenu=$menu->getParent();

            if($parent==$parentMenu){
                $point="";
                for($i=1;$i<=$niveau;$i++){
                    $point=".....";
                }
                $html.="
                    <tr>
                        <td>
                            $point $label
                        </td>
                        <td>
                            $url
                        </td>
                        <td>
                            $icone
                        </td>
                        <td>
                            $role
                        </td>
                    </tr>
                ";

                $html.=$this->list_menu($menu,$niveau+1,$menus);
            }
        }
        return $html;
    }
}
