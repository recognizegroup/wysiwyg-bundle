<?php
namespace Recognize\WysiwygBundle\Twig;

use Symfony\Component\Routing\Router;
use Twig_Error_Runtime;
use Twig_Extension;
use Twig_SimpleFilter;

class CkeditorLocaleFunction extends Twig_Extension {

    private $loaded_locales = array();

    private $container;

    public function __construct( $container, $config = array() ){
        $this->container = $container;
    }

    public function getFunctions(){
        return array(
            "ckeditor_locale" => new \Twig_Function_Method($this, "renderCkeditorLocales", array('is_safe' => array('html')))
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName() {
        return "recognize.wysiwyg.ckeditor.locales";
    }

    /**
     * Renders the locales inside the html
     *
     * @param string $locale
     * @throws \Twig_Error_Runtime
     */
    public function renderCkeditorLocales($locale = "en") {
        if( array_key_exists($locale, $this->loaded_locales ) ){
            return "";
        } else {
            $filecontents = "";
            $jsfile = dirname( __DIR__ ) . "/Resources/jslocale/" . $locale . ".js";
            if( file_exists( $jsfile )){
                $filecontents = file_get_contents( $jsfile );
            }

            $this->loaded_locales[ $locale ] = $filecontents;
            return $this->loaded_locales[ $locale ];
        }
    }
}