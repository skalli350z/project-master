<?php

namespace skalliBundle\Controller;

use Symfony\Component\Validator\Constraints\NotBlank;
use skalliBundle\Entity\Advert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use skalliBundle\Form\AdvertType;
use Symfony\Component\HttpFoundation\RedirectResponse;


class AdvertController extends Controller
{

public function deleteAction($id, Request $request) {

    $em = $this->getDoctrine()->getManager();
    $advert = $em->getRepository('skalliBundle:Advert')->find($id);
    if (!$advert) {
      throw $this->createNotFoundException(
              'No advert found for id ' . $id
      );
    }

    $form = $this->createFormBuilder($advert)
            ->add('delete', 'submit')
            ->getForm();

    $form->handleRequest($request);


    if ($form->isValid()) {
      $em->remove($advert);
      unlink('uploads/'.$id.'.jpeg');
      $em->flush();
     return new RedirectResponse($this->generateUrl('skalli_list'));
    }
    
    $build['form'] = $form->createView();
    return $this->render('skalliBundle:Advert:ne.html.twig', $build);
}

public function listaAction()
{
  $advert = $this->getDoctrine()->getRepository("skalliBundle:Advert")->findAll();
   $build['advert'] = $advert;
   return $this->render('skalliBundle:Advert:index.html.twig', $build);
}





public function listAction()
{
  $advert = $this->getDoctrine()->getRepository("skalliBundle:Advert")->findAll();
   $build['advert'] = $advert;
   return $this->render('skalliBundle:Advert:x.html.twig', $build);
}

public function sportAction()
{
  $advert = $this->getDoctrine()->getRepository("skalliBundle:Advert")->findAll();
   $build['advert'] = $advert;
   return $this->render('skalliBundle:Advert:spor.html.twig', $build);
}

public function philosophieAction()
{
  $advert = $this->getDoctrine()->getRepository("skalliBundle:Advert")->findAll();
   $build['advert'] = $advert;
   return $this->render('skalliBundle:Advert:phil.html.twig', $build);
}

public function autoAction()
{
  $advert = $this->getDoctrine()->getRepository("skalliBundle:Advert")->findAll();
   $build['advert'] = $advert;
   return $this->render('skalliBundle:Advert:aut.html.twig', $build);
}

public function santeAction()
{
  $advert = $this->getDoctrine()->getRepository("skalliBundle:Advert")->findAll();
   $build['advert'] = $advert;
   return $this->render('skalliBundle:Advert:sant.html.twig', $build);
}

public function aeroAction()
{
  $advert = $this->getDoctrine()->getRepository("skalliBundle:Advert")->findAll();
   $build['advert'] = $advert;
   return $this->render('skalliBundle:Advert:aer.html.twig', $build);
}

public function infoAction()
{
  $advert = $this->getDoctrine()->getRepository("skalliBundle:Advert")->findAll();
   $build['advert'] = $advert;
   return $this->render('skalliBundle:Advert:inf.html.twig', $build);
}

public function modeliAction()
{
  $advert = $this->getDoctrine()->getRepository("skalliBundle:Advert")->findAll();
   $build['advert'] = $advert;
   return $this->render('skalliBundle:Advert:model.html.twig', $build);
}

 public function aboutAction()
    {
        return $this->render('skalliBundle:Advert:apropos.html.twig');
    }



public function showAction($id) {
      $advert = $this->getDoctrine()
            ->getRepository('skalliBundle:Advert')
            ->find($id);
      if (!$advert) {
        throw $this->createNotFoundException('No news found by id ' . $id);
      }
    
      $build['advert'] = $advert;
      return $this->render('skalliBundle:Advert:show.html.twig', $build);

}


public function editAction($id, Request $request) {

    $em = $this->getDoctrine()->getManager();
    $advert = $em->getRepository('skalliBundle:Advert')->find($id);
    if (!$advert) {
      throw $this->createNotFoundException('No news found for id ' . $id);
    }
   
$form = $this->createForm(new AdvertType(), $advert);
     $form->handleRequest($request);


$validator = $this->get('validator');

    if ($form->isValid()) {

          $file = $advert->getPhoto();

if (file_exists($file)) {
    echo "Le fichier $file existe.";



                $op = $advert->getId();                  
               $fileName = $op.'.'.'jpeg';
              $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads';
            $file->move($photoDir, $fileName);
            $advert->setPhoto($fileName);
            $advert->getId();
        $em->flush();

} else {
    echo "Le fichier $file n'existe pas.";
}
         $em->flush();
         return new RedirectResponse($this->generateUrl('skalli_list'));
    }
    
    $build['form'] = $form->createView();

    return $this->render('skalliBundle:Advert:edit.html.twig', $build);
  }

public function ajoutAction(Request $request) {

     $advert = new Advert();
     $form = $this->createForm(new AdvertType(), $advert);
     $form->handleRequest($request);    
    
       if ($form->isValid()) {
       $em = $this->getDoctrine()->getManager();
       $em->persist($advert);
       $em->flush();

        $title = $form->get('title')->getData();
         
              $file = $advert->getPhoto();
                $op = $advert->getId();
                $fileName = $op.'.'.'jpeg'; 
            $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads';
            $file->move($photoDir, $fileName);
            $advert->setPhoto($fileName);
            $advert->getId();
           return new RedirectResponse($this->generateUrl('skalli_list'));
     }

     $build['form'] = $form->createView();
     return $this->render('skalliBundle:Advert:ajout.html.twig', $build);

 }



}
