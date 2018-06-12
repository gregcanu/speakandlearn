<?php

namespace SL\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use SL\PlatformBundle\Repository\LanguageRepository;

class AdvertLanguageType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $pattern = '%';
        $builder->add('advert', AdvertType::class)
                ->add('language', EntityType::class, array(
                    'class' => 'SLPlatformBundle:Language',
                    'choice_label' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    'query_builder' => function(LanguageRepository $repository) use($pattern) {
                        return $repository->getLikeQueryBuilder($pattern);
                    }
                ))
                ->add('acquired')
                ->add('save', SubmitType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'SL\PlatformBundle\Entity\AdvertLanguage'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'sl_platformbundle_advertlanguage';
    }

}
