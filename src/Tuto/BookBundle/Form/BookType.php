<?php

namespace Tuto\BookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\Extension\Core\DataTransformer\IntegerToLocalizedStringTransformer;
use \NumberFormatter;

class BookType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('name', 'text', array('label' => 'book.name', 'required' => true))
                ->add('price', 'integer', array('label' => 'book.price', 'required' => true,
                    'rounding_mode' => IntegerToLocalizedStringTransformer::ROUND_CEILING, 
                    'grouping' => NumberFormatter::GROUPING_USED));
    }

    public function getName()
    {
        return 'tuto_bookbundle_booktype';
    }
}
