<?php

require_once __DIR__.'/../vendor/autoload.php';

use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\FormServiceProvider;


$app = new Silex\Application();

$app['debug'] = true;
// Register the form translation dependency
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale' => 'en',
    'translation.class_path' =>  __DIR__ . '/../vendor/symfony/src',
    'translator.messages' => array(),
));

// Register the formbuilder
$app->register(new FormServiceProvider());

// Register the form validator provider
$app->register(new Silex\Provider\ValidatorServiceProvider());

// Register Controller service provider
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

// Register the configYaml-service for global settings
$app->register(new Rpodwika\Silex\YamlConfigServiceProvider(__DIR__ . '/../App/Config/settings.yml'));



// Register Twig-service for using twig-templates
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../App/Views/Templates',
   
));


// Register Doctrine-service for using the database and the settings from the settingsfile
 $app->register(new Silex\Provider\DoctrineServiceProvider(), array(
     'db.options' => $app['config']['database']
 ));


// Register Doctrine-ORM serviceprovider
$app->register(new Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider(), array(

$app['orm.proxies_dir'] = __DIR__.'/../cache/doctrine/proxies',
$app['orm.em.options'] = array(
    'mappings' => array(
        array(
            'type' => 'annotation',
            'path' => __DIR__.'/../src/Dev/Pub/Entity',
            'namespace' => 'Dev\Pub\Entity',
        ),
    ),
)
));

// Mount the Controller service class
$app->mount('/', new Dev\Pub\Controller\GlobalControllerProvider());

$app->run();