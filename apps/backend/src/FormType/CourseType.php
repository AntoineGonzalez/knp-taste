<?php

declare(strict_types=1);

namespace App\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Intitullé du cours",
                'required' => true,
            ])
            ->add('videoUrl', UrlType::class, [
                'required' => true,
                'label' => "Url de la video"
            ])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer']);
    }
}
