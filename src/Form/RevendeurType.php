<?php

namespace App\Form;

use App\Entity\Revendeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RevendeurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('address', TextType::class)
            ->add('zipCode', TextType::class)
            ->add('ville', TextType::class)
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Revendeur::class,
        ]);
    }

    public function getList(){
        return [
            'name' => 'Nom',
            'address' => 'Adresse',
            'zipCode' => 'Editeur',
            'ville' => 'Ville',
        ];
    }

    public function getPrimaryKey(){
        return 'id';
    }
}
