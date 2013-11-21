<?php
/**
 * Created by F-Technology.
 * User: Vasyankin Alexey
 * Date: 20.08.13
 * Time: 14:02
 * e-mail: vasyankin@f-technology.ru
 */
namespace Album\Form;

use Doctrine\ORM\EntityManager;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Album\Entity\Album;

class AlbumFieldset extends Fieldset
    implements InputFilterProviderInterface, ServiceLocatorAwareInterface
{
    protected $serviceLocator = null;

    public function __construct($name ,$options)
    {

        parent::__construct($name, $options);
        /*
         * Use standart Hydrator
         */
        $this->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new Album());

        $this->add(array(
            'name' => 'title',
            'type' => 'Text',
            'options' => array(
                'label' => 'Название альбома',
            ),
            'attributes' => array(
                'required' => 'required',
                'id' => 'albumTitle',
                'class' => 'form-control'
            )
        ));

        /*$this->add(array(
            'name' => 'description',
            'type' => 'Text',
            'options' => array(
                'label' => 'Описание альбома',
            ),
            'attributes' => array(
                'required' => 'required',
                'id' => 'albumDescription',
                'class' => 'form-control'
            )
        ));*/

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Сохранить',
                'class' => 'btn btn-default'
            )
        ));
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array(
            'title' => array(
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 125,
                            'setMessages' => array(
                                \Zend\Validator\StringLength::TOO_LONG => "Значение должно быть меньше %max% символов",
                                \Zend\Validator\StringLength::TOO_SHORT => "Значение должно быть больше %min% символов"
                            ),
                        ),
                    ),
                ),
            ),
            /*'description' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 255,
                            'setMessages' => array(
                                \Zend\Validator\StringLength::TOO_LONG => "Значение должно быть меньше %max% символов",
                                \Zend\Validator\StringLength::TOO_SHORT => "Значение должно быть больше %min% символов"
                            ),
                        ),
                    ),
                ),
            ),*/
        );
    }

    /**
     * Set service locator
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
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