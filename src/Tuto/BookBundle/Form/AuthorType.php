<?php

namespace Tuto\BookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email')
            ->add('website')
            ->add('books', null, array('required' => false))
        ;
    }

    public function getName()
    {
        return 'tuto_bookbundle_authortype';
    }
}
