<?php

namespace App\Form;

use App\Entity\Collect;
use App\Entity\Utilisateur;
use App\Entity\JeuVideo;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use App\Enum\StatutJeuEnum;

class FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('utilisateur', EntityType::class, [
                'class' => Utilisateur::class,
                'choice_label' => 'pseudo',
                'label' => 'Joueur',
            ])
            ->add('jeuVideo', EntityType::class, [
                'class' => JeuVideo::class,
                'choice_label' => 'titre',
                'label' => 'Jeu vidéo',
            ])
            ->add('statut', EnumType::class, [
                'class' => StatutJeuEnum::class,
                'choice_label' => function (StatutJeuEnum $statut) {
                    return $statut->getLabel();
                },
                'label' => 'Statut',
            ])
            ->add('dateModifStatut', null, [
                'label' => 'Statut modifié le',
                'widget' => 'single_text',
            ])
            ->add('prixAchat', MoneyType::class, [
                'label' => "Prix d'achat",
                'currency' => 'EUR',
            ])
            ->add('dateAchat', DateType::class, [
                'label' => "Date d'achat",
                'widget' => 'single_text',
                'input' => 'datetime_immutable',
            ])
            ->add('commentaire', null, [
                'label' => 'Commentaire',
                'required' => false,
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