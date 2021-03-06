RecognizeWysiwygBundle
========================

A bundle that allows you to quickly render a WYSIWYG editor ( currently supports CKEditor ).
Simply add a 'wysiwyg' element to your form and you're good to go.

Features

* Can render regular and inline WYSIWYG editors.
* Supports automatic language detection from the Symfony locale
* Allows seperate configuration per wysiwyg element

Installation
-----------

Add the bundle to your composer.json

```json
# composer.json
{
	"repositories": [
		{
			"type": "git",
			"url":  "https://github.com/recognizegroup/wysiwyg-bundle.git"
		}
	],
	 "require": {
		"recognize/wysiwyg-bundle": "dev-master",
	}
}
```

Run composer install

```sh
php ./composer.phar install
```

Enable the bundle in the kernel

```php
	<?php
	// app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Recognize\WysiwygBundle\RecognizeWysiwygBundle(),
        );
    }
```

Link the fields template in the app/config.yml to add the wysiwyg and inline_wysiwyg types
```yml
twig:
    form:
        resources:
            - 'RecognizeWysiwygBundle:form:fields.html.twig'
```	
	
Configuration
-------------

To configure your WYSIWYG element, add the "ck_config" key to the options and fill it with an array containing the configuration.
For example:

```php
	$formbuilder->add('content', 'wysiwyg', 
		array('ck_config' => array("language" => "nl") ) );
```

This will add the following JSON object into the CKEditor widget

```json
{
	language: "nl"
}
```

Or, use the configuration builder to quickly create a config object for the CKEditor widget

```php
	$configbuilder = new CKConfigBuilder();
	$configbuilder->setLanguage("nl");
	$formbuilder->add('content', 'wysiwyg', 
		array('ck_config' => $configbuilder->build() ) );
```


To find the full CKEditor configuration options, go to the [official website][2]

Testing
--------------

To set up the testing enviroment you have to do two things

  * [Install phpunit][1]
  
  * Install the pre-commit hook


[1]:  https://phpunit.de/manual/current/en/installation.html
[2]:  http://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-skin

##Installing the pre-commit hook

Run the following command in the root directory of this project

**Linux and Mac:**
```sh
cp .hooks/pre-commit-phpunit .git/hooks/pre-commit
chmod 755 .git/hooks/pre-commit
```

**Windows:**
```sh
copy .hooks/pre-commit-phpunit .git/hooks/pre-commit
```

This will make sure the unit tests will be run before each commit.
If you want to disable the unit tests before a commit, you can use the following command

```sh
git commit --no-verify -m "Commit message!"
=======
RecognizeWysiwygBundle
========================

A bundle that allows you to quickly render a WYSIWYG editor ( currently supports CKEditor ).
Simply add a 'wysiwyg' element to your form and you're good to go.

Features

* Can render regular and inline WYSIWYG editors.
* Supports automatic language detection from the Symfony locale
* Allows seperate configuration per wysiwyg element


Installation
-----------

Add the bundle to your composer.json

```json
# composer.json
{
	"repositories": [
		{
			"type": "git",
			"url":  "https://github.com/recognizegroup/wysiwyg-bundle.git"
		}
	],
	 "require": {
		"recognize/wysiwyg-bundle": "dev-master",
	}
}
```

Run composer install

```sh
php ./composer.phar install
```

Enable the bundle in the kernel

```php
	<?php
	// app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Recognize\WysiwygBundle\RecognizeWysiwygBundle(),
        );
    }
```

Link the fields template in the app/config.yml to add the wysiwyg and inline_wysiwyg types
```yml
twig:
    form:
        resources:
            - 'RecognizeWysiwygBundle:form:fields.html.twig'
```	
	
Configuration
-------------

To configure your WYSIWYG element, add the "ck_config" key to the attr fields and fill it with an array containing the configuration.
For example:

```php
	$formbuilder->add('content', 'wysiwyg', 
		array('attr' => ('ck_config' => array("language" => "nl") ) ) );
```

This will add the following JSON object into the CKEditor widget

```json
{
	language: "nl"
}
```

To find the full CKEditor configuration options, go to the [official website][2]

Testing
--------------

To set up the testing enviroment you have to do two things

  * [Install phpunit][1]
  
  * Install the pre-commit hook


[1]:  https://phpunit.de/manual/current/en/installation.html
[2]:  http://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-skin

##Installing the pre-commit hook

Run the following command in the root directory of this project

**Linux and Mac:**
```sh
cp .hooks/pre-commit-phpunit .git/hooks/pre-commit
chmod 755 .git/hooks/pre-commit
```

**Windows:**
```sh
copy .hooks/pre-commit-phpunit .git/hooks/pre-commit
```

This will make sure the unit tests will be run before each commit.
If you want to disable the unit tests before a commit, you can use the following command

```sh
git commit --no-verify -m "Commit message!"
```