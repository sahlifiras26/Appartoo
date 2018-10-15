<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{

    public function HomeAction(Request $request){

        if($request->get('Error') != null){
            $e="wrong_data";
        }
        else
            $e="";
        return $this->render('@AppGuest/layout.html.twig',array('error'=>$e));
    }
}
