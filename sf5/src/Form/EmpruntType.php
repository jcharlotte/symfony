<?php

namespace App\Form;

use App\Entity\Abonne;
use App\Entity\Emprunt;
use App\Entity\Livre;
use DateTime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpruntType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_emprunt', DateType::class, [
                "widget" => "single_text",
                "label" => "Emprunté le"
                //"empty_data" => "valeur par défaut si le champ est vide" (ne fonctionne pas avec les cahmps de type DateType)
                //"data" => "valeur par défaut"
            ])
            ->add('date_retour', DateType::class, [
                "widget" => "single_text", 
                "label" => "Rendu le",
                "required" => false
            ])
            ->add('livre', EntityType::class, [
                "class" => Livre::class,
                "choice_label" => "titre"
            ])
            ->add('abonne', EntityType::class, [
                "class" => Abonne::class,
                "choice_label" => "pseudo"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Emprunt::class,
        ]);
    }
}
