<?php
namespace Recognize\WysiwygBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder,
	Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Yaml\Parser;

/**
 * Class Configuration
 * @package Recognize\WysiwygBundle\DependencyInjection
 * @author Kevin te Raa <k.teraa@recognize.nl>
 */
class Configuration implements ConfigurationInterface {

	/**
	 * {@inheritDoc}
	 */
	public function getConfigTreeBuilder() {
		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root('recognize_wysiwyg');

		$rootNode
			->children()
				->variableNode('default')
			->end()
		;

		return $treeBuilder;
	}

}