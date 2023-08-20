<?php

namespace App\Form;

use App\Entity\Allergene;
use App\Entity\User;
use App\Repository\AllergeneRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('name', TextType::class, [
        'label' => 'Nom *',
      ])
      ->add('sur_name', TextType::class, [
        'label' => 'Prénom *',
      ])
      ->add('city', TextType::class, [
        'label' => 'Ville',
      ])
      ->add('email', TextType::class, [
        'label' => 'Email *',
      ])
      ->add('allergenes')
      ->add('diets')
      ->add('plainPassword', PasswordType::class, [
        // instead of being set onto the object directly,
        // this is read and encoded in the controller
        'label' => 'Mot de passe *',
        'mapped' => false,
        'attr' => ['autocomplete' => 'new-password'],
        'constraints' => [
          new NotBlank([
            'message' => 'Please enter a password',
          ]),
          new Length([
            'min' => 6,
            'minMessage' => 'Your password should be at least {{ limit }} characters',
            // max length allowed by Symfony for security reasons
            'max' => 4096,
          ]),
        ],
      ])
    ;
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => User::class,
    ]);
  }
}