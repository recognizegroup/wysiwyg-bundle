<?php
namespace Recognize\WysiwygBundle\Utils;

class CKConfigBuilder {

    private $config = array();

    /**
     * @param $key
     * @param $value
     * @return CKConfigBuilder
     */
    public function add( $key, $value ){
        $this->config[$key] = $value;

        return $this;
    }

    public function build(){
        return $this->config;
    }

    /**
     * Set the editors language
     *
     * @param $languageCode
     * @return CKConfigBuilder
     */
    public function setLanguage($languageCode){
        return $this->add("language", $languageCode);
    }

    /**
     * Creates the toolbar layout like the basic package on the CKeditor site
     * http://ckeditor.com/download
     *
     * @return CKConfigBuilder
     */
    public function basicLayout(){
        $builder = new ToolbarBuilder();
        $builder->addElement("document", array("mode", "document", "doctools"))
            ->addElement("clipboard", array("clipboard", "undo"))
            ->addElement("editing", array("find", "selection"))
            ->addElement("forms")
            ->addElement("basicstyles", array("basicstyles", "cleanup") )
            ->addElement("paragraph", array("list", "indent", "blocks", "align", "bidi") )
            ->addElement("links")
            ->addElement("insert")
            ->addElement("styles")
            ->addElement("colors")
            ->addElement("tools")
            ->addElement("others");


        $buttons = array('Cut', 'Copy', 'Paste', 'Undo', 'Redo', 'Anchor',
            'Underline', 'Strike', 'Subscript', 'Superscript');
        return $this->setLayout($builder)->removeButtons( $buttons );
    }

    /**
     * Creates the toolbar layout like the standard package on the CKeditor site
     * http://ckeditor.com/download
     *
     * @return CKConfigBuilder
     */
    public function standardLayout(){
        $builder = new ToolbarBuilder();

        $builder->addElement("clipboard", array("clipboard", "undo"))
            ->addElement("editing", array("find", "selection"))
            ->addElement("links")
            ->addElement("insert")
            ->addElement("forms")
            ->addElement("tools")
            ->addElement("document", array("mode", "document", "doctools"))
            ->addElement("others")
            ->addNewLine()
            ->addElement("basicstyles", array("basicstyles", "cleanup") )
            ->addElement("paragraph", array("list", "indent", "blocks", "align", "bidi") )
            ->addElement("styles")
            ->addElement("colors");

        $buttons = array("Underline", "Subscript", "Superscript");
        return $this->setLayout( $builder )->removeButtons( $buttons );
    }

    /**
     * Removes buttons from the layout
     *
     * @param string|array $buttons
     * @return CKConfigBuilder
     */
    public function removeButtons( $buttons ){
        if( is_array($buttons) ){
            $buttons = join(",", $buttons);
        }
        return $this->add("removeButtons", $buttons);
    }

    /**
     * Set the toolbarGroups layout
     *
     * @param ToolbarBuilder $toolbarBuilder
     * @return CKConfigBuilder
     */
    public function setLayout( ToolbarBuilder $toolbarBuilder ){
        return $this->add("toolbarGroups", $toolbarBuilder->build() );
    }
}