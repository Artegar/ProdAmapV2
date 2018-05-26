<?php

namespace App\Form;

use App\Entity\Amap;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AmapType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amapNom')
            ->add('amapAdresse1')
            ->add('amapAdresse2')
            ->add('amapCodepostal')
            ->add('amapVille')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Amap::class,
        ]);
    }
}
