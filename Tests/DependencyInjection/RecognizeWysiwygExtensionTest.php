<?php
use Recognize\WysiwygBundle\DependencyInjection\RecognizeWysiwygExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RecognizeWysiwygExtensionTest extends \PHPUnit_Framework_TestCase{

    /**
     * @var RecognizeWysiwygExtension
     */
    private $extension;

    /**
     * Root name of the configuration
     *
     * @var string
     */
    private $root;

    public function setUp() {
        parent::setUp();

        $this->extension = new RecognizeWysiwygExtension();
        $this->root = "recognize_wysiwyg";
    }

    public function testGetConfigWithDefaultValues() {
        $this->extension->load(array(), $container = $this->getContainer());

        $this->assertTrue($container->hasParameter($this->root . ".config"));
        $config = $container->getParameter($this->root . ".config");
    }

    public function testAlias(){
        $this->assertTrue( "recognize_wysiwyg", $this->extension->getAlias() );
    }

    public function testGetConfigWithOverrideValues() {
        /*$configs = array(
            "api_key" => "asdfa",
            "default_locale" => "nl"
        );
        $this->extension->load(array($configs), $container = $this->getContainer());

        $this->assertTrue($container->hasParameter($this->root . ".config"));
        $config = $container->getParameter($this->root . ".config");
        $this->assertEquals("asdfa", $config["api_key"]);
        $this->assertEquals("nl", $config["default_locale"]);*/
    }

    public function getContainer(){
        $container = new ContainerBuilder();
        $container->setParameter('recognize_wysiwyg.config', array());
        return $container;
    }
}