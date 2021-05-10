<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;


class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                "constraints" => [
                    new Length([
                        "min" => 2,
                        "minMessage" => "Le titre doit avoir au moins 2 caractères",
                        "max" => 50,
                        "maxMessage" => "Le titre ne peut pas contenir plus de 50 caractères"
                    ])
                ],
                "attr" => [
                    "placeholder" => "Titre du livre"
                ]
            ])
            ->add('auteur', TextType::class, [
                "attr" => [
                    "placeholder" => "Auteur"
                ]
            ])
            ->add("enregistrer", SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-secondary"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
