<?php
namespace Recognize\WysiwygBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InlineWysiwygType extends WysiwygType {

    /**
     * Force the required tag to be false due to a bug in CKEditor
     *
     * The required tag should open up if the textarea is empty, but the textarea is hidden,
     * Resulting in the following error: "An invalid form control with name='formname' is not focusable."
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'ck_config' => null,
            'required' => false
        ));
    }

    public function getName(){
        return "inline_wysiwyg";
    }
}