<?php
/**
 * Created by F-Technology.
 * User: Kuleshov Daniil
 * Date: 12.11.13
 * Time: 14:05
 * e-mail: kuleshov@f-technology.ru
 */
namespace Album;
use Zend\View\Helper\Doctype;

$route = include(__DIR__ . '/route.config.php');

return array_merge($route,
    array(
        'controllers' => array(
            'invokables' => array(
                'Album\Controller\Index' => 'Album\Controller\IndexController',
            )
        ),
        'view_manager' => array(
            'template_path_stack' => array(
                __DIR__ . '/../view',
            ),
        ),
        'doctrine' => array(
            'driver' => array(
                'album_entities' => array(
                    'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                    'cache' => 'array',
                    'paths' => array(__DIR__ . '/../src/Album/Entity')
                ),

                'orm_default' => array(
                    'drivers' => array(
                        'Album\Entity' => 'album_entities'
                    )
                )
            )
        )
    ));