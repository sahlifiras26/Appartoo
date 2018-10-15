<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/layout.html.twig',array());
    }
    public function editAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:extraterrestre')->find($id);
        
        // $form=$this->createForm('Test\BlogBundle\Form\testType',$test);
        // $form->handleRequest($request);
        if ($request->isMethod('POST')) {

            $em=$this->getDoctrine()->getManager();
            $user->setAge($request->get('age'));
            $user->setCouleur($request->get('couleur'));
            $user->setFamille($request->get('famille'));
            $user->setNourriture($request->get('nourriture'));
            $em->persist($user);
            $em->flush($user);
            
        }
        // if($form->isSubmitted() && $form->isValid()){
        //     $em=$this->getDoctrine()->getManager();
        //     $em->persist($test);
        //     $em->flush($test);
        //     return $this->redirectToRoute('Liste');
        // }
        // return $this->render('TestBlogBundle:Posts:create.html.twig',array(
        //     'test'=>$test,
        //     'form'=>$form->CreateView(),
        // )) ;
        return $this->render('@App/editProfile.html.twig',array('user'=>$user)) ;
    }
    
}
