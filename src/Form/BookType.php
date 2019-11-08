<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Author;
use App\Entity\Translation;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array( 
                'attr' => array(
                    'maxlength' => 50,
                )
            ))
            ->add('publish_date', DateTimeType::class, array(
                'widget' => 'single_text',             
            ))
            ->add('author', EntityType::class, array(
                'class' => Author::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->orderBy('a.name', 'ASC');
                },
                'placeholder' => "... Please choose Author ...",
            ))
            ->add('translations', CollectionType::class, array(
                'entry_type' => TranslationType::class,                
                'entry_options' => array(
                    'label' => false
                    ),
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'empty_data' => "some"
            ))
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
