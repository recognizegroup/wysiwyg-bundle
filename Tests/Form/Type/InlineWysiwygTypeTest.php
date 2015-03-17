<?php

use Symfony\Component\Form\Test\TypeTestCase;
use \Recognize\WysiwygBundle\Form\Type\InlineWysiwygType;

class InlineWysiwygTypeTest extends TypeTestCase
{
    public function testTypeCompiles() {
        $type = new InlineWysiwygType();
        $form = $this->factory->create($type);
    }
}
