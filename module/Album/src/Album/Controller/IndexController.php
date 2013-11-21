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
        /*$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repository = $objectManager->getRepository('Album\Entity\Album');
        $listAlbums  = $repository->findAll();
        $view = new ViewModel(array(
            'listAlbums' => $listAlbums
        ));
        return $view;*/
    }
    
    public function addAction()
    {
	    $form = $this->getServiceLocator()->get('Album\Form\AlbumForm');
        if ($this->getRequest()->isPost()){
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                /* Object! */
                $album = $form->getData();
                $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                $objectManager->persist($album);
                $objectManager->flush();

                $lastInsertId = $album->getAlbumId();
                if(!empty($lastInsertId)){
                    echo 'Success save!';
                }
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