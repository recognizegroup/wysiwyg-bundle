<?php

use Symfony\Component\Form\Test\TypeTestCase;
use \Recognize\WysiwygBundle\Form\Type\WysiwygType;

class WysiwygTypeTest extends TypeTestCase {

    public function testTypeCompiles() {
        $type = new WysiwygType();
        $form = $this->factory->create($type);

        $view = $form->createView();
        $this->assertEquals( $view->vars['ck_config'], null );
    }
}
