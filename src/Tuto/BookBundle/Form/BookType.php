<?php

namespace Tuto\BookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class BookType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('price')
            ->add('authors', null, array('required' => false))
        ;
    }

    public function getName()
    {
        return 'tuto_bookbundle_booktype';
    }
}
