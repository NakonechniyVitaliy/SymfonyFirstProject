<?php

namespace App\Form;

use App\Entity\Dealer;
use App\Entity\DealerWorkHours;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DealerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name')
            ->add('DealerWorkHours', EntityType::class, [
                'class' => DealerWorkHours::class,
                'choice_label' => 'dealer_title',

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Dealer::class,
        ]);
    }
}
