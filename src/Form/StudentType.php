<?php

namespace App\Form;

use App\Entity\Department;
use App\Entity\Student;
use Doctrine\DBAL\Types\ArrayType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('FirstName',TextType::class, [
                'label' => 'Prenom'
            ])
            ->add('LastName', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('NumEtud', NumberType::class, [
                'label' => 'Numero etudiant'
            ])
            ->add('department', EntityType::class, [
                'class' => Department::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
