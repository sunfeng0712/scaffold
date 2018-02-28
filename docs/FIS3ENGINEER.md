# FIS3前端工程化 

## Installation
The preferred way to install this extension is through composer.
Either run

`php composer.phar require --prefer-dist yiiplus/yii2-fis-smarty`

or add

`"yiiplus/yii2-fis-smarty": "~2.0.0"`

to the require section of your composer.json.
Note that the smarty composer package is distributed using subversion so you may need to install subversion.

## Usage
To use this extension, simply add the following code in your application configuration:

	return [
	    //....
	    'components' => [
	        'view' => [
	            'renderers' => [
	                'tpl' => [
	                    'class' => 'yiiplus\fis\smarty\ViewRenderer',
	                    'configDirs' => ['@app/config/fis'],
	                ],
	            ],
	        ],
	    ],
	];