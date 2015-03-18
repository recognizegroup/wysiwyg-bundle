<?php
namespace Recognize\WysiwygBundle\Tests\Utils;

use Recognize\WysiwygBundle\Utils\ToolbarBuilder;

class ToolbarBuilderTest extends \PHPUnit_Framework_TestCase{

    public function setup(){
        parent::setUp();

        $this->basiclayout = json_decode("[{ 'name': 'document', 'groups': [ 'mode', 'document', 'doctools' ] },
		{ 'name': 'clipboard', 'groups': [ 'clipboard', 'undo' ] },
		{ 'name': 'editing', 'groups': [ 'find', 'selection', 'spellchecker' ] },
		{ 'name': 'forms' },
		{ 'name': 'basicstyles', 'groups': [ 'basicstyles', 'cleanup' ] },
		{ 'name': 'paragraph',   'groups': [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ 'name': 'links' },{ 'name': 'insert' },{ 'name': 'styles' },{ 'name': 'colors' },{ 'name': 'tools' },{ 'name': 'others' },{ 'name': 'about' }]");

        $this->standardlayout = json_decode("[
		{ 'name': 'clipboard',   'groups': [ 'clipboard', 'undo' ] },
		{ 'name': 'editing',     'groups': [ 'find', 'selection', 'spellchecker' ] },
		{ 'name': 'links' },{ 'name': 'insert' },{ 'name': 'forms' },
		{ 'name': 'tools' },{ 'name': 'document',	   'groups': [ 'mode', 'document', 'doctools' ] },{ 'name': 'others' },'/',
		{ 'name': 'basicstyles', 'groups': [ 'basicstyles', 'cleanup' ] },
		{ 'name': 'paragraph',   'groups': [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },{ 'name': 'styles' },{ 'name': 'colors' }]");
    }


    public function testEmptyBuild(){
        $builder = new ToolbarBuilder();
        $this->assertEquals(array(), $builder->build());
    }

    public function testAddMethods(){
        $builder = new ToolbarBuilder();
        $builder->addNewLine();
        $this->assertEquals(array("/"), $builder->build() );

        $builder = new ToolbarBuilder();
        $builder->addElement("clipboard");
        $this->assertEquals(array( array("name" => "clipboard") ), $builder->build() );

        $builder = new ToolbarBuilder();
        $builder->addElement("clipboard", array("document"));
        $this->assertEquals(array( array("name" => "clipboard", "groups" => array("document") ) ), $builder->build() );
    }

}