<?php

namespace App\Form;

use App\Entity\DealerWorkHours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DealerWorkHoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dealer_title')
            ->add('monday_open')
            ->add('monday_close')
            ->add('tuesday_open')
            ->add('tueday_close')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DealerWorkHours::class,
        ]);
    }
}
