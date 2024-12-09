<?php

namespace App\Form;

use App\Entity\Message;
use App\Entity\Student;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('object', TextType::class, ['label' => 'Objet'])
            ->add('expeditor', TextType::class, ['label' => 'Expéditeur'])
            ->add('content', TextType::class, ['label' => 'Votre message'])
            // ->add('student', EntityType::class, [
            //     'class' => Student::class,
            //     'choice_label' => 'fullname',
            //     'label' => 'Etudiant destinataire',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
