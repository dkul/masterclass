<?php
/**
 * Created by F-Technology.
 * User: Kuleshov Daniil
 * Date: 12.11.13
 * Time: 14:11
 * e-mail: kuleshov@f-technology.ru
 */
namespace Album;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Album\Form\AlbumForm' => function ($serviceManager) {
                    $form = new Form\AlbumForm();
                    $form->setServiceLocator($serviceManager);
                    return $form;
                }
            )
        );
    }
}