<?php
/**
 * Created by F-Technology.
 * User: Vasyankin Alexey
 * Date: 29.08.13
 * Time: 12:51
 * e-mail: vasyankin@f-technology.ru
 */
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Form\AlbumForm;
use Album\Form\AlbumInputFilter;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    }
    
    public function addAction()
    {
	    $form = $this->getServiceLocator()->get('Album\Form\AlbumForm');
        if ($this->getRequest()->isPost()){
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $data = $form->getData();

                $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

                $album = new \Album\Entity\Album();

                /*$hydrator = new DoctrineObject(
                    $objectManager,
                    'Album\Entity\Album'
                );
                $album = $hydrator->hydrate($data['album'], $album);
                */

                $album->setAlbumTitle($data['album']['title']);
                $album->setAlbumArtistTitle($data['album']['artistTitle']);

                $objectManager->persist($album);
                $objectManager->flush();

                var_dump($album->getAlbumId());
            }
        }

        $view = new ViewModel(array(
            'form' => $form
        ));
        return $view;
    }
    
    public function editAction()
    {
    }
    
    public function deleteAction()
    {
    }
}