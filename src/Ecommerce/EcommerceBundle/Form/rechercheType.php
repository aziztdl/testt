<?php


namespace Ecommerce\EcommerceBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class rechercheType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('recherche','text', array('attr'=> array('class'=>'input-medium search-query')));
    }

    public function getName()
    {
        return 'ecommerce_ecommercebundle_recherche';
    }

}