<?php


namespace App\Form;


use App\Data\SearchData;
use App\Entity\Produit;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\TextType;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
        ->add('q', \Symfony\Component\Form\Extension\Core\Type\TextType::class,[
            'label'=>false,
            'required'=>false,
            'attr'=>[
                'placeholder'=> 'Rechercher'
            ]
        ])

        ->add('min',NumberType::class, [
            'label'=> false,
            'required'=>false,
            'attr'=>[
                'placeholder'=>'Prix min'
            ]
        ])

        ->add('max',NumberType::class, [
            'label'=> false,
            'required'=>false,
            'attr'=>[
                'placeholder'=>'Prix max'
            ]
        ])


    ;
    }
/**
configurer differentes options de formulaire
 */
    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults([
           'data_class'=> SearchData::class,
           'method'=>'GET',
           'csrf_protection'=>false
      ]);
    }

    public function getBlockPrefix()
    {
     return '';
    }
}