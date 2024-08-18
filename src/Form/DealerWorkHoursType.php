<?php

namespace App\Form;

use App\Entity\DealerWorkHours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DealerWorkHoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('monday_open', TextType::class)
            ->add('monday_close', TextType::class)
            ->add('tuesday_open', TextType::class)
            ->add('tuesday_close', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DealerWorkHours::class,
        ]);
    }
}
