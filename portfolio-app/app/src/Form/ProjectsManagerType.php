<?php

namespace App\Form;

use App\Entity\ProjectsManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;



class ProjectsManagerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Projects')
            ->add('Name')
            ->add('IMG')
            ->add('Description')
            ->add('imageFile', VichImageType::class, [
                'label' => 'Illustration'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProjectsManager::class,
        ]);
    }
}
