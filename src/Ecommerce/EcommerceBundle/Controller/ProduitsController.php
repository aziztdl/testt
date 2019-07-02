<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Ecommerce\EcommerceBundle\Form\rechercheType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitsController extends Controller
{
    public function categorieAction($categorie)
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('EcommerceBundle:Produits')->byCategorie($categorie);
        
        return $this->render('EcommerceBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits));
    }
    
    public function produitsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('EcommerceBundle:Produits')->findby(array('disponible'=>1));
        
        return $this->render('EcommerceBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits));
    }
    
    public function presentationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('EcommerceBundle:Produits')->find($id);
        
        return $this->render('EcommerceBundle:Default:produits/layout/presentation.html.twig', array('produit' => $produit));
    }

    public function rechercheAction(){

        $form = $this->createForm(new rechercheType());

        return $this->render('EcommerceBundle:Default:produits/layout/recherche.html.twig',array('form' => $form->createView()));

    }

    public function rechercheTraitementAction(){

        $em = $this->getDoctrine()->getManager();

      $form = $this->createForm(new rechercheType());
      // die($this->get('request')->getMethod());
       if($this->get('request')->getMethod() == 'POST') {

           $form->bind($this->get('request'));
          // echo $form['recherche']->getData();
           $produits = $em->getRepository('EcommerceBundle:Produits')->recherche($form['recherche']->getData());


     //      return $this->render('EcommerceBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits));
       }
        return $this->render('EcommerceBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits));
    }
}