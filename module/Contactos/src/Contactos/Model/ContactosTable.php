<?php

namespace Contactos\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Select;

class ContactosTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getContactos($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function getAnunciosPorUsuario($id_usuario) {
        $rowset = $this->tableGateway->select(array('usuarios_id' => $id_usuario));
        return $rowset;
    }

    public function getFavoritos($id_usuario) {

        // $select = new Select();
//        $select->from(array('a' => 'anuncios')) 
//                 ->join(array('f' => 'favoritos'),                'a.id = f.anuncios_id')
//                ->where('f.usuarios_id = "'.$id_usuario.'"');
//   $select->from("anuncios')
//        ->join(array('f' => 'favoritos'), 'id = f.anuncios_id', \Zend\Db\Sql\Select::JOIN_INNER)
//        ->where('id = f.anuncios_id')
//          ->OR;
//        ->where('f.usuarios_id = $id_usuario');
//	       $select->from(array('a' => 'anuncios'))
//	      ->join(array('f' => 'favoritos'), 'a.id = f.anuncios_id');
//    
//	     $where = new  Where();
//	     $where->equalTo('f.usuarios_id', $id_usuario) ;
//	    $select->where($where);
//   
        // echo $select->getSqlString();

        $select = "SELECT * FROM anuncios INNER JOIN favoritos ON anuncios.id = favoritos.anuncios_id
				WHERE favoritos.usuarios_id =  '" . $id_usuario . "'";

        $statement = $this->tableGateway->getAdapter()->query($select);
        $results = $statement->execute();

        $returnArray = array();
// iterate through the rows
        foreach ($results as $result) {
            $returnArray[] = $result;
        }

        return $returnArray;

        //$rowset = $this->tableGateway->select($select);
        // return $rowset;
    }

    public function getAnuncios($busqueda) {

        $where = new Where();
        $where->like('titulo', '%' . $busqueda . '%');
        $where->or;
        $where->like('descripcion', '%' . $busqueda . '%');

        $rowset = $this->tableGateway->select($where);


        return $rowset;
    }

    public function saveContactos(Contactos $Contactos) {
        $data = array(
            'id' => $Contactos->id,
            'usuarios_id' => $Contactos->usuarios_id,
            'titulo' => $Contactos->titulo,
            //isset($data['publicacion'])) ? $data['publicacion'] : null
            'descripcion' => $Contactos->descripcion,
            'precio' => $Contactos->precio,
            'publicacion' => $Contactos->publicacion,
            'visitas' => $Contactos->visitas,
            'listado' => $Contactos->listado,
            'renovacion' => date('Y-m-d H:i:s'),
            'lltlng' => $Contactos->lltlng,
            'direccion' => $Contactos->direccion,
            'imagen' => substr($Contactos->imagen['tmp_name'], 7),
            'imagen2' => substr($Contactos->imagen2['tmp_name'], 7)
        );

        $id = (int) $Contactos->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getContactos($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteContactos($id) {
        $this->tableGateway->delete(array('id' => $id));
    }

}