<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\AdminType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_index")
     */
    public function adminIndex()
    {
        $admins = $this->getDoctrine()->getRepository(Admin::class) ->findAll();
        return $this->render('admin/index.html.twig', ['admins' => $admins]);
    }

    /**
     * @Route("/admin/detail/{id}", name="admin_detail")
     */
    public function adminDetail($id){
        $admin = $this->getDoctrine()->getRepository(Admin::class)->find($id);
        if($admin == null){
            $this->addFlash('Erro', 'Admin is not esixted');
            return $this->redirectToRoute('Admin_index');
        }else{
            return $this->render('admin/detail.html.twig',['admin'=> $admin]);
        }
    }

    /**
     * @Route("/admin/edit/{id}", name="admin_edit")    
     */
    public function adminEdit(Request $request, $id)
    {
        $admin = $this->getDoctrine()->getRepository(Admin::class)->find($id);
        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($admin);
            $manager->flush();

          
            $this->addFlash('success', "Edit admin successfully !");
            return $this->redirectToRoute("admin_index");
        }

        return $this->render(
            "admin/edit.html.twig",
            [
                "form" => $form->createView()
            ]
        );
    
    }


    
    
}
