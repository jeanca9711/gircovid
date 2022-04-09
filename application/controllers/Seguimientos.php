<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguimientos extends CI_Controller {

	public function __construct()
 	{
		parent::__construct();
		
        //$this->load->helper('url');
        $this->load->model('Seguimientos_model');//cargando el modelo personas
		$this->load->model('Casos_model');//cargando el modelo casos
		$this->load->model('Personas_model');//cargando el modelo personas
 	}

	public function nuevoseguimiento($id)
	{
		if(!isset($this->session->idusuario)){
			header('Location:'.site_url('usuarios/login'));
		}
	 $data['idseguimiento']=$id;
	 $data['casos']=$this->Casos_model->getCasosCompletosById($id);//carga el listado de casos
	 $data['seguimientos']=$this->Casos_model->getSeguimientosTableIndex($id);//carga el listado de seguimientos
	 $data['numerosatencion']=$this->Seguimientos_model->getMaxNumeroAtencion($id); //cargar maximo id numero atencion
	 $data['departamentos']=$this->Seguimientos_model->getAllDepartamentos(); //cargar todos los departamentos
	 $data['motivosaislamiento']=$this->Seguimientos_model->getAllMotivoAislamiento(); //cargar todos los motivos de aislamiento
	 $data['tiposaislamiento']=$this->Seguimientos_model->getAllTiposAislamiento(); //cargar todos los tipos de aislamiento
	 $data['ambitosatencion']=$this->Seguimientos_model->getAllAmbitosAtencion(); //cargar todos los ambitos de atencion
	 $data['soportesventilatorios']=$this->Seguimientos_model->getAllSoportesVentilatorios(); //cargar todos los soportes ventilatorios
	 $data['tiposprueba']=$this->Seguimientos_model->getAllTiposPruebas(); //cargar todos los soportes tipos de prueba
	 $data['resultadosprueba']=$this->Seguimientos_model->getAllResultadosPruebas(); //cargar todos los soportes resultados de prueba
	 $data['estadosafectacion']=$this->Seguimientos_model->getAllEstadosAfectacion(); //cargar todos los soportes estados de afectacion
	 //$data['seguimientos']=$this->Casos_model->getSeguimientosTableIndex($id);//carga el listado de seguimientos
	 $data['page']='seguimientos/nuevoseguimiento';
	 $this->load->view('template/home',$data);// view/index.php
	}
	
	public function ver($id)
	{
		if(!isset($this->session->idusuario)){
			header('Location:'.site_url('usuarios/login'));
		}
	 $data['seguimientos']=$this->Seguimientos_model->getAllSeguimiento($id);//carga el listado de casos
	 $data['casos']=$this->Casos_model->getCasosCompletosById($id);//carga el listado de casos
	 $data['numerosatencion']=$this->Seguimientos_model->getMaxNumeroAtencion($id); //cargar maximo id numero atencion
	 $data['departamentos']=$this->Seguimientos_model->getAllDepartamentos(); //cargar todos los departamentos
	 $data['municipios2']=$this->Seguimientos_model->getAllMunicipios2(); //cargar todos los departamentos
	 $data['motivosaislamiento']=$this->Seguimientos_model->getAllMotivoAislamiento(); //cargar todos los motivos de aislamiento
	 $data['tiposaislamiento']=$this->Seguimientos_model->getAllTiposAislamiento(); //cargar todos los tipos de aislamiento
	 $data['ambitosatencion']=$this->Seguimientos_model->getAllAmbitosAtencion(); //cargar todos los ambitos de atencion
	 $data['soportesventilatorios']=$this->Seguimientos_model->getAllSoportesVentilatorios(); //cargar todos los soportes ventilatorios
	 $data['tiposprueba']=$this->Seguimientos_model->getAllTiposPruebas(); //cargar todos los soportes tipos de prueba
	 $data['resultadosprueba']=$this->Seguimientos_model->getAllResultadosPruebas(); //cargar todos los soportes resultados de prueba
	 $data['estadosafectacion']=$this->Seguimientos_model->getAllEstadosAfectacion(); //cargar todos los soportes estados de afectacion
	 //$data['seguimientos']=$this->Casos_model->getSeguimientosTableIndex($id);//carga el listado de seguimientos
	 $data['page']='seguimientos/ver';
	 $this->load->view('template/home',$data);// view/index.php
	}
    
	public function plantilla()
	{
		$this->load->view('template/home');
	}
	
	public function getAllMunicipios($departamento)
	{
		$municipios=$this->Casos_model->getAllMunicipios($departamento);
		echo json_encode($municipios);
	}

	public function getLastSeguimiento($id)
	{
		$ultimoseguimiento=$this->Seguimientos_model->getLastSeguimiento($id);
		echo json_encode($ultimoseguimiento);
	}

	public function validarFechaPruebavsNombrePrueba($nombreprueba, $fprueba)
	{
		if($nombreprueba!='5' && $fprueba==null){
			?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> Se requiere una fecha de prueba.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
		}elseif($nombreprueba=='5' && $fprueba!=null){
			?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> Si existe una fecha de prueba se requiere un nombre de prueba.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
		}
	}

	public function validarResultadoPruebavsNombrePrueba($nombreprueba, $resultadoprueba)
	{
		if($nombreprueba!='5' && $resultadoprueba=='4'){
			?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> Se requiere de un resultado para la prueba.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
		}elseif($nombreprueba=='5' && $resultadoprueba!='4'){
			?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> Si hay resultado, se requiere un nombre de prueba.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
		}
	}

	public function validarFechaResultadovsNombrePrueba($nombreprueba, $fresultado)
	{
		if($nombreprueba=='5' && $fresultado!=null){
			?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> Si el paciente no requiere prueba, no debería de haber una fecha de resultado.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
		}
	}

	public function validarFechaResultadovsResultadoPrueba($resultadoprueba, $fresultado)
	{
		if($resultadoprueba<3 && $fresultado==null){
			?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> Se requiere una fecha de resultado.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
		}elseif($resultadoprueba>2 && $fresultado!=null){
			?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> La fecha de resultado debe ser vacía.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
		}
	}

	public function validarFechaSgtovsFechaSgtoAnterior($fechahora, $casoid){
		$lastsegs=$this->Seguimientos_model->getLastSeguimiento($casoid);
		$ultimafechahora=null;
		foreach($lastsegs as $lastseg){
			$ultimafechahora=$lastseg->Fecha_Hora;
		}
		$fecha1 = date_create($fechahora);
		$fecha2 = date_create($ultimafechahora);
		if($ultimafechahora!=null){
			if($fecha1<$fecha2){?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> La fecha de seguimiento debe ser mayor a la fecha del ultimo seguimiento.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
			}
		}
	}

	public function validarFechaResultadovsFechaResultadoPrueba($fprueba, $fresultado)
	{
		$fecha1 = date_create($fprueba);
		$fecha2 = date_create($fresultado);

		if($fresultado!=null){
			if($fecha1>$fecha2){?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> La fecha de resultado debe ser mayor a la fecha de prueba.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
			}
		}

	}

	public function validarFechaResultadovsFechaSgto($fechahora, $fresultado)
	{
		$fecha1 = date_create($fechahora);
		$fecha2 = date_create($fresultado);

		if($fresultado!=null){
			if($fecha1<$fecha2){?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> La fecha de resultado no debe ser mayor a la fecha de seguimiento.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
			}
		}

	}

	public function validarFechaPruebavsFechaSgto($fechahora, $fprueba)
	{
		$fecha1 = date_create($fechahora);
		$fecha2 = date_create($fprueba);

		if($fprueba!=null){
			if($fecha1<$fecha2){?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> La fecha de prueba no debe ser mayor a la fecha de seguimiento.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
			}
		}

	}

	public function validarFechaIngresovsFechaSgto($fechahora, $fingreso)
	{
		$fecha1 = date_create($fechahora);
		$fecha2 = date_create($fingreso);

		if($fingreso!=null){
			if($fecha1<$fecha2){?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> La fecha de ingreso no debe ser mayor a la fecha de seguimiento.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
			}
		}

	}

	public function validarFechaEgresovsFechaSgto($fechahora, $fegreso)
	{
		$fecha1 = date_create($fechahora);
		$fecha2 = date_create($fegreso);

		if($fegreso!=null){
			if($fecha1<$fecha2){?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> La fecha de egreso no debe ser mayor a la fecha de seguimiento.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
			}
		}

	}

	public function validarFechaFiebrevsFechaSgto($fechahora, $fiebre)
	{
		$fecha1 = date_create($fechahora);
		$fecha2 = date_create($fiebre);

		if($fiebre!=null){
			if($fecha1<$fecha2){?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> La fecha de fiebre no debe ser mayor a la fecha de seguimiento.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
			}
		}

	}

	public function validarFechaTosvsFechaSgto($fechahora, $tos)
	{
		$fecha1 = date_create($fechahora);
		$fecha2 = date_create($tos);

		if($tos!=null){
			if($fecha1<$fecha2){?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> La fecha de tos no debe ser mayor a la fecha de seguimiento.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
			}
		}

	}

	public function validarFechaFatigavsFechaSgto($fechahora, $fatiga)
	{
		$fecha1 = date_create($fechahora);
		$fecha2 = date_create($fatiga);

		if($fatiga!=null){
			if($fecha1<$fecha2){?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> La fecha de fatiga no debe ser mayor a la fecha de seguimiento.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
			}
		}

	}

	public function validarFechaDifRespirarvsFechaSgto($fechahora, $dif_respirar)
	{
		$fecha1 = date_create($fechahora);
		$fecha2 = date_create($dif_respirar);

		if($dif_respirar!=null){
			if($fecha1<$fecha2){?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> La fecha de dificultad para respirar no debe ser mayor a la fecha de seguimiento.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
			}
		}

	}

	public function validarFechaDolorGargantavsFechaSgto($fechahora, $dolor_garganta)
	{
		$fecha1 = date_create($fechahora);
		$fecha2 = date_create($dolor_garganta);

		if($dolor_garganta!=null){
			if($fecha1<$fecha2){?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> La fecha de dolor de garganta no debe ser mayor a la fecha de seguimiento.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
			}
		}

	}

	public function validarFechaDolorCabezavsFechaSgto($fechahora, $dolor_cabeza)
	{
		$fecha1 = date_create($fechahora);
		$fecha2 = date_create($dolor_cabeza);

		if($dolor_cabeza!=null){
			if($fecha1<$fecha2){?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> La fecha de dolor de cabeza no debe ser mayor a la fecha de seguimiento.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
			}
		}

	}

	public function validarFechaOtrovsFechaSgto($fechahora, $otro)
	{
		$fecha1 = date_create($fechahora);
		$fecha2 = date_create($otro);

		if($otro!=null){
			if($fecha1<$fecha2){?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> La fecha de otros no debe ser mayor a la fecha de seguimiento.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
			}
		}

	}

	public function validarEstadoAfectacionvsResultadoPrueba($estadoafectacion, $resultadoprueba)
	{
		if($estadoafectacion==6 && $resultadoprueba!=1){
			?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> Se requiere una prueba negativa para un estado recuperado.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
		}elseif($estadoafectacion!=6 && $resultadoprueba==1){
			?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> Se requiere una estado recuperado para una prueba negativa.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
		}
	}

	public function validarEstadoAfectacionvsNombrePrueba($estadoafectacion, $nombreprueba)
	{
		if($nombreprueba==5 && $estadoafectacion!=8){
			?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> Si el paciente tiene un estado de afectación se requiere nombre de prueba.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
		}elseif($estadoafectacion==8 && $nombreprueba!=5){
			?>
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
							<h5 class="text-danger"><i class="fa fa-times-circle"></i> Si el paciente tiene una prueba se requiere un estado de afectación.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
						</div>
				</div>
			<?php
			return true;
		}
	}

	public function AgregarSeguimiento()
	{
		if($this->input->post()){
			$nombreprueba=$this->input->post('nombre_prueba');
			$fechahora=$this->input->post('fecha_hora');
			$fprueba=$this->input->post('f_ultima_prueba');
			$fresultado=$this->input->post('f_resultado');
			$fingreso=$this->input->post('fingreso');
			$fegreso=$this->input->post('fegreso');
			$estadoafectacion=$this->input->post('estado_afectacion');
			$resultadoprueba=$this->input->post('resultado_prueba');
			$casoid=$this->input->post('idcaso');
			$fiebre=$this->input->post('fiebre');
			$tos=$this->input->post('tos');
			$fatiga=$this->input->post('fatiga');
			$dif_respirar=$this->input->post('dif_respirar');
			$dolor_garganta=$this->input->post('dolor_garganta');
			$dolor_cabeza=$this->input->post('dolor_cabeza');
			$otro=$this->input->post('otro');


			if($this->validarFechaPruebavsNombrePrueba($nombreprueba, $fprueba)){
				return;
			}
			if($this->validarResultadoPruebavsNombrePrueba($nombreprueba, $resultadoprueba)){
				return;
			}
			if($this->validarFechaResultadovsNombrePrueba($nombreprueba, $fresultado)){
				return;
			}
			if($this->validarFechaResultadovsResultadoPrueba($resultadoprueba, $fresultado)){
				return;
			}
			if($this->validarFechaSgtovsFechaSgtoAnterior($fechahora, $casoid)){
				return;
			}
			if($this->validarFechaResultadovsFechaResultadoPrueba($fprueba, $fresultado)){
				return;
			}
			if($this->validarFechaResultadovsFechaSgto($fechahora, $fresultado)){
				return;
			}
			if($this->validarFechaPruebavsFechaSgto($fechahora, $fprueba)){
				return;
			}
			if($this->validarFechaIngresovsFechaSgto($fechahora, $fingreso)){
				return;
			}
			if($this->validarFechaEgresovsFechaSgto($fechahora, $fegreso)){
				return;
			}

			if($this->validarFechaFiebrevsFechaSgto($fechahora, $fiebre)){
				return;
			}
			if($this->validarFechaTosvsFechaSgto($fechahora, $tos)){
				return;
			}
			if($this->validarFechaFatigavsFechaSgto($fechahora, $fatiga)){
				return;
			}
			if($this->validarFechaDifRespirarvsFechaSgto($fechahora, $dif_respirar)){
				return;
			}
			if($this->validarFechaDolorGargantavsFechaSgto($fechahora, $dolor_garganta)){
				return;
			}
			if($this->validarFechaDolorCabezavsFechaSgto($fechahora, $dolor_cabeza)){
				return;
			}
			if($this->validarFechaOtrovsFechaSgto($fechahora, $otro)){
				return;
			}
			if($this->validarEstadoAfectacionvsResultadoPrueba($estadoafectacion, $resultadoprueba)){
				return;
			}
			if($this->validarEstadoAfectacionvsNombrePrueba($estadoafectacion, $nombreprueba)){
				return;
			}

			if($this->Seguimientos_model->add()){?>
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
									<h5 class="text-success"><i class="fa fa-check-circle"></i> Seguimiento registrado correctamente.</h5>
						</div>
						<div class="modal-footer"> 
							<button type="button" class="btn btn-success" data-dismiss="modal" onclick="cerrar()">Ver seguimientos</button>
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
	}

	

}
?>