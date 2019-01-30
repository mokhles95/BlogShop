<?php

namespace YosrBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('User',EntityType::class,array(
                'class'=>'YosrBundle:User',
                'choice_label'=>'nom',
                'multiple'=>false
            ))

            ->add('SubCateg',EntityType::class,array(
                'class'=>'YosrBundle:SubCategArticle',
                'choice_label'=>'nom',
                'multiple'=>false
            ))

            ->add('savedA',EntityType::class,array(
                'class'=>'YosrBundle:savedArticle',
                'choice_label'=>'id',
                'multiple'=>false
            ))

            ->add('valider',submitType::class );
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'YosrBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitybundle_article';
    }


}
