<?php

namespace App\Form;

use App\Entity\Admin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class AdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('avatar', FileType::class,
            [
            'label' => "Avatar Admin",
            'data_class' => null,
            'required' => is_null($builder->getData()->getAvatar())
            ]
            )
            ->add('name',TextType::class, 
            [
                'label' => "Admin Name",
                'required' => true
            ])
            ->add('age',TextType::class, 
            [
                'label' => "Admin Age",
                'required' => true
            ])
            ->add('email',TextType::class, 
            [
                'label' => "Admin email",
                'required' => true
            ])
            ->add('nationality', ChoiceType::class,
            [
                'label' => "Nationality",
                'required' => true,
                'choices' => [
                    "Vietnam" => "Vietnam",
                    "Singapore" => "Singapore",
                    "Japan" => "Japan",
                    "United States" => "United States",
                    "Canada"=>"Canada",
                    "China"=>"China",
                    "Argentina"=>" Argentina"
                ]
            ])
            
            
            ->add('dob', DateType::class,
            [
                'label' => "Birthday",
                'required' => true,
                'widget' => 'single_text'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Admin::class,
        ]);
    }
}
