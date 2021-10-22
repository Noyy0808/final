<?php

namespace App\Form;
use App\Entity\Course;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;



class CourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class , 
            [   'label'=>"Course Name",
                'required' => true //nguoi dung phai nhap = nullable
            ]
            )
            ->add('startdate', DateType::class,
            [   'label'=>"StartDate",
                'required' => true, //nguoi dung phai nhap = nullable
                'widget'=>'single_text'
            ]
            )
            ->add('enddate', DateType::class,
            [   'label'=>"StartDate",
                'required' => true, //nguoi dung phai nhap = nullable
                'widget'=>'single_text'
            ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Course::class,
        ]);
    }
}
