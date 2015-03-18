<?php
namespace Recognize\WysiwygBundle\Tests\Utils;

use Recognize\WysiwygBundle\Utils\CKConfigBuilder;
use Recognize\WysiwygBundle\Utils\ToolbarBuilder;

class CKConfigBuilderTest extends \PHPUnit_Framework_TestCase {

    private $basiclayout;
    private $standardlayout;

    public function testEmptyBuild(){
        $builder = new CKConfigBuilder();
        $this->assertEquals(array(), $builder->build());
    }

    public function testCKEditorStandardLayouts(){
        $builder = new CKConfigBuilder();

        $builder->basicLayout();
        $this->assertEquals( $this->basiclayout, $builder->build() );

        $builder->standardLayout();
        $this->assertEquals( $this->standardlayout, $builder->build() );
    }

    public function testBasicMethods(){
        $builder = new CKConfigBuilder();
        $builder->setLanguage("nl");
        $this->assertEquals( array("language" => "nl"), $builder->build() );

        $builder = new CKConfigBuilder();
        $builder->setLayout( new ToolbarBuilder() );
        $this->assertEquals( array("toolbarGroups" => array()), $builder->build() );


        // Test both the array parameter and the string parameter
        $builder = new CKConfigBuilder();
        $builder->removeButtons("Cut,Copy,Paste");
        $this->assertEquals( array("removeButtons" => "Cut,Copy,Paste"), $builder->build() );

        $builder->removeButtons(array("Cut", "Copy", "Paste"));
        $this->assertEquals( array("removeButtons" => "Cut,Copy,Paste"), $builder->build() );

    }

    public function setup(){
        parent::setUp();

        $basiclayout = array();
        $basiclayout[] = array( "name" => "document", "groups" => array("mode", "document", "doctools") );
        $basiclayout[] = array( "name" => "clipboard", "groups" => array("clipboard", "undo") );
        $basiclayout[] = array( "name" => "editing", "groups" => array("find", "selection") );
        $basiclayout[] = array( "name" => "forms" );
        $basiclayout[] = array( "name" => "basicstyles", "groups" => array("basicstyles", "cleanup") );
        $basiclayout[] = array( "name" => "paragraph", "groups" => array("list", "indent", "blocks", "align", "bidi" ) );
        $basiclayout[] = array( "name" => "links" );
        $basiclayout[] = array( "name" => "insert" );
        $basiclayout[] = array( "name" => "styles" );
        $basiclayout[] = array( "name" => "colors" );
        $basiclayout[] = array( "name" => "tools" );
        $basiclayout[] = array( "name" => "others" );
        $basicRemoveButtons = "Cut,Copy,Paste,Undo,Redo,Anchor,Underline,Strike,Subscript,Superscript";
        $this->basiclayout = array("toolbarGroups" => $basiclayout, "removeButtons" => $basicRemoveButtons );

        $standardlayout = array();
        $standardlayout[] = array( "name" => "clipboard", "groups" => array("clipboard", "undo") );
        $standardlayout[] = array( "name" => "editing", "groups" => array("find", "selection") );
        $standardlayout[] = array( "name" => "links" );
        $standardlayout[] = array( "name" => "insert" );
        $standardlayout[] = array( "name" => "forms" );
        $standardlayout[] = array( "name" => "tools" );
        $standardlayout[] = array( "name" => "document", "groups" => array("mode", "document", "doctools") );
        $standardlayout[] = array( "name" => "others" );
        $standardlayout[] = "/";
        $standardlayout[] = array( "name" => "basicstyles", "groups" => array("basicstyles", "cleanup") );
        $standardlayout[] = array( "name" => "paragraph", "groups" => array("list", "indent", "blocks", "align", "bidi" ) );
        $standardlayout[] = array( "name" => "styles" );
        $standardlayout[] = array( "name" => "colors" );
        $standardRemoveButtons = "Underline,Subscript,Superscript";
        $this->standardlayout = array("toolbarGroups" => $standardlayout, "removeButtons" => $standardRemoveButtons );
    }



}