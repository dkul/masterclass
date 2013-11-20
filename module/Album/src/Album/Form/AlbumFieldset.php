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
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AlbumFieldset extends Fieldset
    implements InputFilterProviderInterface, ServiceLocatorAwareInterface
{
    protected $serviceLocator = null;

    public function __construct($name ,$options)
    {

        parent::__construct($name, $options);

        $this->add(array(
            'name' => 'title',
            'type' => 'Text',
            'options' => array(
                'label' => 'Название альбома',
            ),
            'attributes' => array(
                'required' => 'required',
            )
        ));

        $this->add(array(
            'name' => 'artistTitle',
            'type' => 'Text',
            'options' => array(
                'label' => 'Название артиста',
            ),
            'attributes' => array(
                'required' => 'required',
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Сохранить'
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
            'artistTitle' => array(
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