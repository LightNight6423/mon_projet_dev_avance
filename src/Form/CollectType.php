<?php

namespace App\Form;

use App\Entity\Collect;
use App\Entity\JeuVideo;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CollectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('statut')
            ->add('dateModifStatut', null, [
                'widget' => 'single_text'
            ])
            ->add('prixAchat')
            ->add('dateAchat', null, [
                'widget' => 'single_text'
            ])
            ->add('commentaire')
            ->add('createdAt', null, [
                'widget' => 'single_text'
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text'
            ])
            ->add('utilisateur', EntityType::class, [
                'class' => Utilisateur::class,
                'choice_label' => 'id',
            ])
            ->add('jeuVideo', EntityType::class, [
                'class' => JeuVideo::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Collect::class,
        ]);
    }
}
