<?php

namespace empresas\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\FileInput;

class empresas implements InputFilterAwareInterface {

    public $id;
    public $usuarios_id;
    public $titulo;
    public $descripcion;
    public $precio;
    public $publicacion;
    public $visitas;
    public $listado;
    public $renovacion;
    public $lltlng;
    public $direccion;
    public $imagen;
    public $imagen2;
    protected $inputFilter;                       // <-- Add this variable

    public function exchangeArray($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->usuarios_id = (isset($data['usuarios_id'])) ? $data['usuarios_id'] : null;
        $this->titulo = (isset($data['titulo'])) ? $data['titulo'] : null;
        $this->descripcion = (isset($data['descripcion'])) ? $data['descripcion'] : null;
        $this->precio = (isset($data['precio'])) ? $data['precio'] : null;
        $this->publicacion = (isset($data['publicacion'])) ? $data['publicacion'] : null;
        $this->visitas = (isset($data['visitas'])) ? $data['visitas'] : null;
        $this->listado = (isset($data['listado'])) ? $data['listado'] : null;
        $this->renovacion = (isset($data['renovacion'])) ? $data['renovacion'] : null;
        $this->lltlng = (isset($data['lltlng'])) ? $data['lltlng'] : null;
        $this->direccion = (isset($data['direccion'])) ? $data['direccion'] : null;
        
        
        if($data['imagen'] == ""){
            $this->imagen = "img/no-image.gif";
        }else{
            $this->imagen = $data['imagen'];
        }
        
        if($data['imagen2'] == ""){
            $this->imagen2 = "img/no-image.gif";
        }else{
            $this->imagen2 = $data['imagen2'];
        }

    }

    // Add content to these methods:
    public function setInputFilter(InputFilterInterface $inputFilter) {
        throw new \Exception("Not used");
    }

    public function getInputFilter() {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                        'name' => 'id',
                        'required' => false,
                        'filters' => array(
                            array('name' => 'Int'),
                        ),
            )));

            $inputFilter->add($factory->createInput(array(
                        'name' => 'usuarios_id',
                        'required' => true,
                        'filters' => array(  
                            array('name' => 'Int'),
                        ),
            )));


            
            $inputFilter->add($factory->createInput(array(
                        'name' => 'titulo',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 50,
                                ),
                            ),
                        ),
            )));

            $inputFilter->add($factory->createInput(array(
                        'name' => 'descripcion',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 500,
                                ),
                            ),
                        ),
            )));

            $inputFilter->add($factory->createInput(array(
                        'name' => 'precio',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'Int'),
                        ),
            )));

            $inputFilter->add($factory->createInput(array(
                        'name' => 'publicacion',
                        'required' => false,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));

            $inputFilter->add($factory->createInput(array(
                        'name' => 'visitas',
                        'required' => false,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));

            $inputFilter->add($factory->createInput(array(
                        'name' => 'listado',
                        'required' => false,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));


            $inputFilter->add($factory->createInput(array(
                        'name' => 'renovacion',
                        'required' => false,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));


            $inputFilter->add($factory->createInput(array(
                        'name' => 'lltlng',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));
			
            $inputFilter->add($factory->createInput(array(
                        'name' => 'direccion',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));
			
	$fileInput = new FileInput('imagen');
        $fileInput->setRequired(false);
        $fileInput->getFilterChain()->attachByName(
            'filerenameupload',
            array(
                'target'    => 'public/img/uploads/img.png',
                'randomize' => true,
            )
        );
        $inputFilter->add($fileInput);
        
        $fileInput2 = new FileInput('imagen2');
        $fileInput2->setRequired(false);
        $fileInput2->getFilterChain()->attachByName(
            'filerenameupload',
            array(
                'target'    => 'public/img/uploads/img.png',
                'randomize' => true,
            )
        );
        $inputFilter->add($fileInput2);

           $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

    public function getInputFilterBuscar() {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                        'name' => 'buscar',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 50,
                                ),
                            ),
                        ),
            )));
            
    
        return $inputFilter;
    }

    
    public function getArrayCopy() {
        return get_object_vars($this);
    }

}