<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('utilNom')
            ->add('utilPrenom')
            ->add('utilTel')
            ->add('utilMail')
            ->add('utilLogin')
            ->add('utilMdp')
            ->add('utilActif')
            ->add('utilSuperadmin')
            ->add('utilAdresse1')
            ->add('utilAdresse2')
            ->add('utilCodepostal')
            ->add('utilVille')
            ->add('producteur')
            ->add('adherant')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
