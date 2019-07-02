<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 25/04/2019
 * Time: 08:27
 */
namespace Ecommerce\EcommerceBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class testType extends AbstractType{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('text')
            ->add('email','email')
            ->add('contenu','textarea')
            ->add('date','datetime')
            ->add('genre', 'choice',array('choices'=>array('0'=>'homme',
                                                                       '1'=>'femme' ),'expanded'=> true))
           // ->add('Utilisateur','entity', array('class'=>'Utilisateurs\UtilisateursBundle\Entity\Utilisateurs'))
            ->add('Envoyer','submit')
            ->getForm()  ;


    }

    public function getName(){
        return 'ecommerce_ecommercebundle_test';
    }

}