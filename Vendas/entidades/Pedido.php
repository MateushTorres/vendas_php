<?php
namespace Vendas\entidades;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

/**
 * @Entity
 * @Table(name="pedido")
 */
class Pedido extends Entidade{

  /**
  *	@var integer @Id
  *      @Column(name="id", type="integer")
  *      @GeneratedValue(strategy="AUTO")
  */
private $id;
/**
 * @Column(type="datetime")
 * @var DateTime
 */
private $hora;

/**
	 * @ManyToOne(targetEntity="Usuario",cascade={"persist"})
	 * @JoinColumn(name="usuario_id", referencedColumnName="id")
	 */
private $usuario;
/**
* @OneToMany(targetEntity="Item", mappedBy="pedido",cascade={"persist","remove"})
**/
private $itens;

public function __construct($id = 0,$hora = null,$usuario = 0,$itens = array()){
$this->id = $id;
$this->hora = $hora;
$this->usuario = $usuario;
$this->itens = $itens;

}

public static function construct($array){
$obj = new Pedido();
$obj->setId( $array['id']);
$obj->setHora( $array['hora']);
$obj->setUsuario( $array['usuario']);
$obj->setItens( $array['itens']);
return $obj;

}

public function getId(){
return $this->id;
}

public function setId($id){
 $this->id=$id;
}

public function getHora(){
return $this->hora;
}

public function setHora($hora){
 $this->hora=$hora;
}

public function getUsuario(){
return $this->usuario;
}

public function setUsuario($usuario){
 $this->usuario=$usuario;
}

public function getItens(){
return $this->itens;
}

public function setItens($itens){
 $this->itens=$itens;
}
public function equals($object){
if($object instanceof Pedido){

if($this->id!=$object->id){
return false;

}

if($this->hora!=$object->hora){
return false;

}

if($this->usuario!=$object->usuario){
return false;

}

if($this->itens!=$object->itens){
return false;

}

return true;

}
else{
return false;
}

}
public function toString(){

 return "  [id:" .$this->id. "]  [hora:" .$this->hora. "]  [usuario:" .$this->usuario. "]  [itens:" .$this->itens. "]  " ;
}

 public function toArray(){
   return [
  "id"=>$this->id,
   "hora"=>$this->hora,
   "usuario"=>$this->usuario->toArray(),
   "itens"=>$this->itens
   ];
 }

}