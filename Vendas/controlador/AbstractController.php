<?php

namespace Vendas\controlador;

use Vendas\persistencia\AbstractDAO;
use Exception;

abstract class AbstractController {
	// attr
	private $dao;
	public function __construct($dao) {
        if(!$dao instanceof AbstractDAO){
            throw new Exception("error");
        }
        $this->dao = $dao;
	}
	
	public function getDao() {
		return $this->dao;
	}
	public function setDao($dao) {
		$this->dao = $dao;
	}
	
	public function get($id) {
		if ($id === null) {
			$data = array ();
			$result = $this->getDao()->findAll ();

			foreach ( $result as $obj ) {
				$data [] = $obj->toArray ();
			}
		} else {
			$obj = $this->getDao ()->findById ( $id );
			if ($obj != null) {

				$data = $obj->toArray ();
			} else
				$data = [];
		}

		return $data;
	}
    abstract public  function insert($json);
	abstract public  function update($id, $json);
	abstract public  function delete($id);
}