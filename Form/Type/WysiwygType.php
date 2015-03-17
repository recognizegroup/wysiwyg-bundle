<?php
namespace Recognize\WysiwygBundle\Form\Type;

use Symfony\Component\Form\AbstractType;

class WysiwygType extends AbstractType {

    public function getParent(){
        return "textarea";
    }

    public function getName(){
        return "wysiwyg";
    }
}