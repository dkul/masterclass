<?php
namespace Album\Form;

use Zend\Form\Form;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AlbumForm extends Form implements ServiceLocatorAwareInterface
{
    protected $serviceLocator;

    public function __construct($name = null, $options = null)
    {
        parent::__construct($name, $options);
        $this->setName("Album");

        $fieldset = new AlbumFieldset('album', array('use_as_base_fieldset' => true));
        $this->setBaseFieldset($fieldset);
        $this->add($fieldset);

    }

    /**
     * Set service locator
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        $this->init();
        return $this;
    }

    /**
     * Get service locator
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
}
