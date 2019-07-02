<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PanierController extends Controller
{
    public function panierAction()
    {
        $session = $this->getRequest()->getSession();

        if(!$session->has('panier'))  $session->set('panier',array());
        $panier = $session->get('panier');

        // get product
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('EcommerceBundle:Produits')->findArray($panier);


        return $this->render('EcommerceBundle:Default:panier/layout/panier.html.twig', array('panier'=>$panier));
    }
    
    public function livraisonAction()
    {
        return $this->render('EcommerceBundle:Default:panier/layout/livraison.html.twig');
    }
    
    public function validationAction()
    {
        return $this->render('EcommerceBundle:Default:panier/layout/validation.html.twig');
    }

    public function ajouterAction($id){

        $session = $this->getRequest()->getSession();

        if(!$session->has('panier')) $panier = $session->set('panier', array());
        $panier = $session->get('panier');

        // PANIER [ID DU PRODUIT] => QUANTITE

        if(array_key_exists($id,$panier)){
            if($this->getRequest()->query->get('qte')!= null) $panier[$id] = $this->getRequest()->query->get('qte');
        }
        else{
            if($this->getRequest()->query->get('qte') != null){
                $panier[$id] = $this->getRequest()->query->get('qte');
            }
            else {

                $panier[$id] = 1;

            }
            $session->set('panier',$panier);

        }
       return $this->redirect($this->generateUrl('panier'));

    }
}
