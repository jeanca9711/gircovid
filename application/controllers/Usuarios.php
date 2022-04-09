<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

public function __construct()
 {
	 parent::__construct();
	 
     //$this->load->helper('url');
     $this->load->model('Usuarios_model');//cargando el modelo producto
 }

	public function Login()
	{
        if(isset($this->session->idusuario))
        {
            header('Location:'.site_url('casos/index'));
        }
        //$data['casos']=$this->Casos_model->getCasosTableIndex();//carga el listado de categorias
        $data['page']='login/index';
        $this->load->view('template/home',$data);// view/index.php
    }
    
	public function plantilla()
	{
		 $this->load->view('template/home');
    }
    
    public function getLogin()
    {
        if(isset($this->session->idusuario))
        {
            header('Location:'.site_url('casos/index'));
        }
        if($this->input->post()){
            $email=$this->input->post('usuario');
            $contrasena=$this->input->post('contrasena');
            $usuarios=$this->Usuarios_model->getLogin($email, $contrasena);
            if($usuarios!=null){
                foreach($usuarios as $usuario){
                    $this->session->email=$usuario->Email;
                    $this->session->idusuario=$usuario->Id;
					$this->session->tipousuario=$usuario->TIPOS_USUARIO_Id;
					$this->session->nombreusuario=$usuario->Nombre_1 . ' ' . $usuario->Apellido_1;
                    echo "<script>location.reload();</script>";
                }
                
            }else{
                echo '<div class="alert alert-danger alert-dismissible">
			        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			        <strong>Error!</strong> Usuario o contraseña incorrectos!.
			        </div>';
            }
            
        }
    }
    
    public function logout()
    {
        session_destroy();
        header('Location:'.site_url('usuarios/login'));
    }

    public function misdatos()
	{
		if(!isset($this->session->idusuario))
        {
            header('Location:'.site_url('usuarios/login'));
        }	
        $data['usuarios']=$this->Usuarios_model->getById($this->session->idusuario);//carga el listado de productos
		$data['page']='usuarios/misdatos';
		$this->load->view('template/home',$data);// view/index.php
	}

	

}
?>