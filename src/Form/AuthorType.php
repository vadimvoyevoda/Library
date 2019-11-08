<?php

namespace App\Form;

use App\Entity\Author;
use App\Helpers\Countries\RestCountries\RestCountriesAdapter;
use App\Helpers\Countries\RestCountries\RestCountriesService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $countries_adapter = new RestCountriesAdapter( new RestCountriesService() );
        $countries = $countries_adapter->getAll();

        $builder
            ->add('name', TextType::class, array( 
                'attr' => array(
                    'maxlength' => 40,                    
                )
            ))
            ->add('last_name', TextType::class, array( 
                'attr' => array(
                    'maxlength' => 40,
                )
            ))
            ->add('country', ChoiceType::class, array(
                'choices' => $countries,
                'choice_label' => function ($choice, $key, $value) {
                    return $value;
                },
                'placeholder' => "... Please choose Country ...",        
            ))
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Author::class,
        ]);
    }
}
