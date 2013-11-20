<?php
/**
 * Created by F-Technology.
 * User: Kuleshov Daniil
 * Date: 12.11.13
 * Time: 14:01
 * e-mail: kuleshov@f-technology.ru
 */
return array(
    'router' => array(
        'routes' => array(
            'album' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/album[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Album\Controller\Index',
                        'action'     => 'index',
                    ),
                )
            )
        )
    ),
);