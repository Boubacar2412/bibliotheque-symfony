<?php

namespace App\Form;

use App\Entity\Auteur;
use App\Entity\Livre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('datePublication')
            ->add('disponible')
            ->add('auteur', EntityType::class, [ // 🔁 correction ici (minuscule)
                'class' => Auteur::class,
                'choice_label' => function (Auteur $auteur) {
                    return $auteur->getPrenom() . ' ' . $auteur->getNom(); // plus lisible que l'id
                },
                'placeholder' => 'Sélectionner un auteur',
                'label' => 'Auteur',
                'attr' => ['class' => 'form-select']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
