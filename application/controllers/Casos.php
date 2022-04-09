<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Casos extends CI_Controller {

	public function __construct()
 	{
		parent::__construct();
		
		//$this->load->helper('url');
		$this->load->model('Casos_model');//cargando el modelo casos
		$this->load->model('Personas_model');//cargando el modelo personas
 	}

	public function index()
	{
		if(!isset($this->session->idusuario)){
			header('Location:'.site_url('usuarios/login'));
		}
	 $data['casos']=$this->Casos_model->getCasosTableIndex();//carga el listado de casos
	 $data['page']='casos/index';
	 $this->load->view('template/home',$data);// view/index.php
	}
	
	public function seguimientos($id)
	{
		if(!isset($this->session->idusuario)){
			header('Location:'.site_url('usuarios/login'));
		}
	 $data['casos']=$this->Casos_model->getCasosById($id);//carga el listado de casos
	 $data['seguimientos']=$this->Casos_model->getSeguimientosTableIndex($id);//carga el listado de seguimientos
	 $data['lastestadosafectaciones']=$this->Casos_model->getLastEstadoAfectacion($id);
	 $data['page']='seguimientos/index';
	 $this->load->view('template/home',$data);// view/index.php
	}
	
    
	public function plantilla()
	{
		 $this->load->view('template/home');
	}

	public function nuevocaso()
	{
		if(!isset($this->session->idusuario)){
			header('Location:'.site_url('usuarios/login'));
		}
		$data['page']='casos/nuevocaso';
		$data['departamentos']=$this->Casos_model->getAllDepartamentos(); //cargar todos los departamentos
		$data['departamentos_AMBUQ']=$this->Casos_model->getAllDepartamentosAMBUQ(); //cargar todos los departamentos AMBUQ
		$data['tiposdocumentos']=$this->Personas_model->getAllTipoDocumento(); //cargar todos los tipos de documentos
		$data['tiposcontacto']=$this->Casos_model->getAllTiposContacto(); //cargar todos los tipos de contacto
		$data['estadoscovid']=$this->Casos_model->getAllEstadosCovid(); //cargar todos estados COVID
		$data['fuentescaso']=$this->Casos_model->getAllFuentesCaso(); //cargar todas las fuentes de caso
		$this->load->view('template/home',$data);// view/index.php
	}

	public function ver($id)
	{
		if(!isset($this->session->idusuario)){
			header('Location:'.site_url('usuarios/login'));
		}
		$data['page']='casos/ver';
		$data['casos']=$this->Casos_model->getAllCasosById($id); //cargar datos caso
		$data['municipios']=$this->Casos_model->getAllMunicipios2();
		$data['departamentos']=$this->Casos_model->getAllDepartamentos(); //cargar todos los departamentos
		$data['departamentos_AMBUQ']=$this->Casos_model->getAllDepartamentosAMBUQ(); //cargar todos los departamentos AMBUQ
		$data['tiposdocumentos']=$this->Personas_model->getAllTipoDocumento(); //cargar todos los tipos de documentos
		$data['tiposcontacto']=$this->Casos_model->getAllTiposContacto(); //cargar todos los tipos de contacto
		$data['estadoscovid']=$this->Casos_model->getAllEstadosCovid(); //cargar todos estados COVID
		$data['fuentescaso']=$this->Casos_model->getAllFuentesCaso(); //cargar todas las fuentes de caso
		$this->load->view('template/home',$data);// view/index.php
	}

	public function editar($id)
	{
		if(!isset($this->session->idusuario)){
			header('Location:'.site_url('usuarios/login'));
		}
		$data['page']='casos/editar';
		$data['casos']=$this->Casos_model->getAllCasosById($id); //cargar datos caso
		$data['municipios']=$this->Casos_model->getAllMunicipios2();
		$data['departamentos']=$this->Casos_model->getAllDepartamentos(); //cargar todos los departamentos
		$data['departamentos_AMBUQ']=$this->Casos_model->getAllDepartamentosAMBUQ(); //cargar todos los departamentos AMBUQ
		$data['tiposdocumentos']=$this->Personas_model->getAllTipoDocumento(); //cargar todos los tipos de documentos
		$data['tiposcontacto']=$this->Casos_model->getAllTiposContacto(); //cargar todos los tipos de contacto
		$data['estadoscovid']=$this->Casos_model->getAllEstadosCovid(); //cargar todos estados COVID
		$data['fuentescaso']=$this->Casos_model->getAllFuentesCaso(); //cargar todas las fuentes de caso
		$this->load->view('template/home',$data);// view/index.php
	}

	public function contactos($id)
	{
		if(!isset($this->session->idusuario)){
			header('Location:'.site_url('usuarios/login'));
		}
		$data['page']='contactos/index';
		$data['idcaso']=$id;
		$data['departamentos']=$this->Casos_model->getAllDepartamentos(); //cargar todos los departamentos
		$data['tiposdocumentos']=$this->Personas_model->getAllTipoDocumento(); //cargar todos los tipos de documentos
		$data['contactos']=$this->Casos_model->getAllContactos($id); //cargar todos los tipos de contacto
		$data['parectescos']=$this->Casos_model->getAllParentesco(); //cargar todos estados COVID
		$this->load->view('template/home',$data);// view/index.php
	}
	
	public function getAllMunicipios($departamento)
	{
		$municipios=$this->Casos_model->getAllMunicipios($departamento);
		echo json_encode($municipios);
	}

	public function getAllMunicipiosAMBUQ($departamento)
	{
		$municipios_AMBUQ=$this->Casos_model->getAllMunicipiosAMBUQ($departamento);
		echo json_encode($municipios_AMBUQ);
	}

	public function AgregarCaso()
	{
		if($this->input->post()){
			$validaciondoc=$this->Casos_model->validarDocumento($this->input->post('documento'));
			if($validaciondoc==null){
				if($this->Casos_model->add()){?>
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header bg-success">
							<h3 class="text-white">¡Listo!</h3>
								<button type="button" class="close" data-dismiss="modal" onclick="cerrar()">
									<span aria-hidden="true">×</span>
									<span class="sr-only">Close</span>
								</button>
							</div>    
							<div class="modal-body">
										<h5 class="text-success"><i class="fa fa-check-circle"></i> Caso registrado correctamente.</h5>
							</div>
							<div class="modal-footer"> 
								<button type="button" class="btn btn-success" data-dismiss="modal" onclick="cerrar()">Nuevo Caso</button>
								<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="cerrar2()">Ver casos</button>
							</div>
					</div>
				<?php
				}else{?>
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header bg-danger">
							<h3 class="text-white">¡Error!</h3>
								<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden="true">×</span>
									<span class="sr-only">Close</span>
								</button>
							</div>    
							<div class="modal-body">
										<h5 class="text-danger"><i class="fa fa-times-circle"></i> Se Produjo un error al registrar.</h5>
							</div>
							<div class="modal-footer"> 
								<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
							</div>
					</div>
				<?php
				}
			}else{?>
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header bg-danger">
						<h3 class="text-white">¡Error!</h3>
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">×</span>
								<span class="sr-only">Close</span>
							</button>
						</div>    
						<div class="modal-body">
									<h5 class="text-danger"><i class="fa fa-times-circle"></i> Ya se encuentra un caso registrado con el número de documento.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php	
			}
		}
	}

	public function EditarCaso()
	{
		if($this->input->post()){
			if($this->Casos_model->update()){?>
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header bg-success">
						<h3 class="text-white">¡Listo!</h3>
							<button type="button" class="close" data-dismiss="modal" onclick="cerrar()">
								<span aria-hidden="true">×</span>
								<span class="sr-only">Close</span>
							</button>
						</div>    
						<div class="modal-body">
									<h5 class="text-success"><i class="fa fa-check-circle"></i> Caso actualizado correctamente.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal" onclick="cerrar()">Listo</button>
							<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="cerrar2()">Ir a modulo casos</button>
						</div>
				</div>
			<?php
			}else{?>
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header bg-danger">
						<h3 class="text-white">¡Error!</h3>
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">×</span>
								<span class="sr-only">Close</span>
							</button>
						</div>    
						<div class="modal-body">
									<h5 class="text-danger"><i class="fa fa-times-circle"></i> Se Produjo un error al actualizar.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			}
		}
	}

	public function AgregarContacto()
	{
		$validarcon=$this->Casos_model->validarContacto($this->input->post('documento'),$this->input->post('idcaso'));
		if($validarcon==null){
			if($this->input->post()){
				if($this->Casos_model->addContacto()){?>
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header bg-success">
							<h3 class="text-white">¡Listo!</h3>
								<button type="button" class="close" data-dismiss="modal" onclick="cerrar()">
									<span aria-hidden="true">×</span>
									<span class="sr-only">Close</span>
								</button>
							</div>    
							<div class="modal-body">
										<h5 class="text-success"><i class="fa fa-check-circle"></i> Contacto registrado correctamente.</h5>
							</div>
							<div class="modal-footer"> 
								<button type="button" class="btn btn-success" data-dismiss="modal" onclick="cerrar()">Listo</button>
							</div>
					</div>
				<?php
				}else{?>
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header bg-danger">
							<h3 class="text-white">¡Error!</h3>
								<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden="true">×</span>
									<span class="sr-only">Close</span>
								</button>
							</div>    
							<div class="modal-body">
										<h5 class="text-danger"><i class="fa fa-times-circle"></i> Se Produjo un error al registrar.</h5>
							</div>
							<div class="modal-footer"> 
								<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
							</div>
					</div>
				<?php
				}
			}
		}else{?>
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header bg-danger">
					<h3 class="text-white">¡Error!</h3>
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">×</span>
							<span class="sr-only">Close</span>
						</button>
					</div>    
					<div class="modal-body">
								<h5 class="text-danger"><i class="fa fa-times-circle"></i> Ya se encuentra un contacto registrado con el mismo número de documento.</h5>
					</div>
					<div class="modal-footer"> 
						<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
					</div>
			</div>
		<?php
		}
	}

	

}
?>