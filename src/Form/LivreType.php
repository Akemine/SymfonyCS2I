<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class)
            ->add('titre', TextType::class)
            ->add('auteur', TextType::class)
            ->add('editeur', TextType::class)
            ->add('collection', TextType::class)
            ->add('prix', IntegerType::class)
            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }

    public function getList(){
        return [
            'titre' => 'Titre',
            'auteur' => 'Auteur',
            'editeur' => 'Editeur',
            'collection' => 'Collection',
            'prix' => 'Prix',
        ];
    }
    public function getPrimaryKey(){
        return 'id';
    }
}
