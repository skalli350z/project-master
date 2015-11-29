<?php
// src/Blogger/BlogBundle/Form/EnquiryType.php

namespace skalliBundle\Form;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use skalliBundle\Entity\Advert;

class AdvertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title','choice', array('choices' => Advert::getTypes(), 'expanded' => true))->add('photo', 'file', array('data_class' => null))->add('coment','textarea')->add('author', 'text')->add('date', 'date')->add('time', 'time')->add('submit', 'submit');
                        
        //$builder->add('body', 'textarea');
    }

    public function getName()
    {
        return 'contact';
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'skalliBundle\Entity\Advert',
        ));
    }


   public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('title', new NotBlank());
         $metadata->addPropertyConstraint('coment', new NotBlank());
        $metadata->addPropertyConstraint('author', new NotBlank());
       $metadata->addPropertyConstraint('photo', new NotBlank());
    }

}







