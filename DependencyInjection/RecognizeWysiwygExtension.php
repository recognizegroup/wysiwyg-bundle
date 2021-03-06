<?php
namespace Recognize\WysiwygBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder,
	Symfony\Component\HttpKernel\DependencyInjection\Extension,
	Symfony\Component\Config\FileLocator;

use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class Recognize\WysiwygBundle\RecognizeWysiwygExtension
 * @package Recognize\WysiwygBundle\DependencyInjection
 * @author Kevin te Raa <k.teraa@recognize.nl>
 */
class RecognizeWysiwygExtension extends Extension {

	/**
	* @param array $configs
	* @param ContainerBuilder $container
	*/
	public function load(array $configs, ContainerBuilder $container) {
		$configuration = new Configuration();
		$config = $this->processConfiguration($configuration, $configs);

		$container->setParameter('recognize_wysiwyg.config', $config);

		if(!array_key_exists('default', $config)) $config['default'] = null;
		$container->setParameter('recognize_wysiwyg.default', $config['default']);

		$loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
		$loader->load('services.yml');
	}

	/**
	* @return string
	*/
	public function getAlias() {
		return 'recognize_wysiwyg';
	}

}
