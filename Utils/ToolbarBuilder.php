<?php
namespace Recognize\WysiwygBundle\Utils;

class ToolbarBuilder {

    private $toolbar = array();

    /**
     * Add an element to the toolbarGroups
     * For example: { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
     *
     * @param $element
     * @param array $groups
     * @return ToolbarBuilder
     */
    public function addElement( $element, $groups = array() ){
        $node = array();
        $node['name'] = $element;

        if( count($groups) > 0 ){
            $node['groups'] = $groups;
        }

        return $this->add( $node );
    }

    /**
     * @return ToolbarBuilder
     */
    public function addNewLine(){
        return $this->add( "/" );
    }

    public function add( $node ){
        $this->toolbar[] = $node;
        return $this;
    }

    public function build(){
        return $this->toolbar;
    }

}