<?php
namespace Core;
defined("APPPATH") OR die("Access denied");
use \App\models\General AS GeneralDao;
class Controller{

    public $__usuario = '';
    public $__nombre = '';

    public function __construct(){
    	session_start();
    	if($_SESSION['usuario'] == '' || empty($_SESSION['usuario'])){
    	    unset($_SESSION);
                session_unset();
                session_destroy();
                header("Location: /Constancias2022/");
                exit();
            }else{
    	    $this->__usuario = $_SESSION['usuario'];
    	    $this->__nombre = $_SESSION['nombre'];
    	}
    }

    public static function getPermisosUsuario1($usuario){
        return $usuario;
    }

    public static function getPermisoUser($usuario){
        
        $id = GeneralDao::getPerfilUsuario($usuario);

        return $id;

    }


}
