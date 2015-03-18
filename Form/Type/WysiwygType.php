<?php
namespace Recognize\WysiwygBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WysiwygType extends AbstractType {

    public function getParent(){
        return "textarea";
    }

    public function getName(){
        return "wysiwyg";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'ck_config' => null,
        ));
    }

    public function buildView(FormView $view, FormInterface $form, array $options){
        $view->vars['ck_config'] = $options['ck_config'];
    }

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->setAttribute("ck_config", $options['ck_config'] );
    }

}