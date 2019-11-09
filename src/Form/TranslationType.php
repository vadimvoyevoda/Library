<?php

namespace App\Form;

use App\Entity\Translation;
use App\Helpers\Countries\RestCountries\RestCountriesService;
use App\Helpers\Countries\RestCountries\RestCountriesLanguagesAdapter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TranslationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $countries_langs_adapter = new RestCountriesLanguagesAdapter( new RestCountriesService() );
        $countries_langs = $countries_langs_adapter->getAll();

        $builder
            ->add('language', ChoiceType::class, array(
                'choices' => $countries_langs,
                'choice_label' => function ($choice, $key, $value) {
                    return $value;
                },
                'placeholder' => "... Please choose Language ...", 
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Translation::class,
        ]);
    }
}
