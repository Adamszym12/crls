<?php


namespace App\Form\Type;


use App\Entity\InspectionOrder;
use App\Form\RealEstate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InspectionOrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('assignee')
            ->add('author')
            ->add('realEstates', RealEstate::class)
            ->add('inspectionDate', null, [
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => InspectionOrder::class, 'csrf_protection' => false));
    }
}