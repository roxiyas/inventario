<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parametros extends CI_Controller {
	//CLIENTE
	public function cliente(){
		if(!$this->session->userdata('session'))redirect('login');
		$data['estado'] = $this->Parametros_model->listar_estado();
		$data['tipo_doc'] = $this->Parametros_model->listar_tip_doc();

		$data['clientes'] = $this->Parametros_model->listar_clientes();

		$this->load->view('templates/header.php');
		$this->load->view('templates/navegator');
		$this->load->view('parametros/cliente/index.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function listar_ciudades(){
		if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data =	$this->Parametros_model->listar_ciudades($data);
		echo json_encode($data);
	}

	public function listar_municipio(){
		if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data =	$this->Parametros_model->listar_municipio($data);
		echo json_encode($data);
	}

	public function listar_parroquia(){
		if(!$this->session->userdata('session'))redirect('login');;
		$data = $this->input->post();
		$data =	$this->Parametros_model->listar_parroquia($data);
		echo json_encode($data);
	}

	public function reg_cliente(){
		if(!$this->session->userdata('session'))redirect('login');

		$data = array(
			'id_estado' 	    =>  $this->input->POST('id_estado'),
			'id_ciudad'	        =>  $this->input->POST('id_ciudad'),
			'id_municipio' 	    =>  $this->input->POST('id_municipio'),
			'id_parroquia' 	    =>  $this->input->POST('id_parroquia'),
			'dir_fiscal'		=>  $this->input->POST('dir_fiscal'),
			'id_tip_doc' 	    =>  $this->input->POST('id_tip_doc'),
			'cod_rif' 	 	    =>  $this->input->POST('cod_rif'),
			'nom_razon_social' 	=>  $this->input->POST('nom_razon_social'),
			'nro_telefono' 	    =>  $this->input->POST('nro_telefono'),
			'id_user' 	        => $this->session->userdata('id_user'),
			'fecha_update'      => date('Y-m-d'),
		);
		$data =	$this->Parametros_model->reg_cliente($data);
		echo json_encode($data);
	}

	public function consultar_cliente(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->consultar_cliente($data);
	   	echo json_encode($data);
	}

	// CONSULTAS PARA MODAL DE EDITAR DE CLIENTE
	public function consultar_estado_mod(){
		if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data =	$this->Parametros_model->consultar_estado_mod($data);
		echo json_encode($data);
	}

	public function consultar_municipio_mod(){
		if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data =	$this->Parametros_model->consultar_municipio_mod($data);
		echo json_encode($data);
	}

	public function consultar_ciudad_mod(){
		if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data =	$this->Parametros_model->consultar_ciudad_mod($data);
		echo json_encode($data);
	}

	public function consultar_parroquia_mod(){
		if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data =	$this->Parametros_model->consultar_parroquia_mod($data);
		echo json_encode($data);
	}

	public function consultar_tip_doc_mod(){
		if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data =	$this->Parametros_model->consultar_tip_doc_mod($data);
		echo json_encode($data);
	}

	public function consultar_vendedor_mod(){
		if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data =	$this->Parametros_model->consultar_vendedor_mod($data);
		echo json_encode($data);
	}

	public function editar_cliente(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->editar_cliente($data);
	   	echo json_encode($data);
	}

	public function eliminar_cliente(){
		if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data =	$this->Parametros_model->eliminar_cliente($data);
		echo json_encode($data);
	}
	//-----------------------
	//Categorìa
	public function categoria(){
		if(!$this->session->userdata('session'))redirect('login');

		$data['categoria'] = $this->Parametros_model->listar_categoria();

		$this->load->view('templates/header.php');
        $this->load->view('templates/navegator.php');
        $this->load->view('parametros/categoria/index.php', $data);
        $this->load->view('templates/footer.php');
	}

	public function registrar_categoria(){
		if(!$this->session->userdata('session'))redirect('login');

		$data = array(
			'descripcion' =>  $this->input->POST('descripcion'),
			'id_user' => $this->session->userdata('id_user'),
			'fecha_update' => date('Y-m-d'),
		);
		$data =	$this->Parametros_model->reg_categoria($data);
		echo json_encode($data);
	}

	public function consultar_categoria(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->consultar_categoria($data);
	   	echo json_encode($data);
	}

	//VERRRR
	public function consultar_presentacion_2(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->consultar_presentacion($data);
	   	echo json_encode($data);
	}

	public function editar_categoria(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->editar_categoria($data);
	   	echo json_encode($data);
	}

	public function eliminar_categoria(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->eliminar_categoria($data);
	   	echo json_encode($data);
	}
	//-----------------------
	//PRODUCTO
	public function producto(){
		if(!$this->session->userdata('session'))redirect('login');

		$data['categoria'] = $this->Parametros_model->listar_categoria();
		$data['productos'] = $this->Parametros_model->listar_productos();

		$this->load->view('templates/header.php');
		$this->load->view('templates/navegator');
		$this->load->view('parametros/producto/index.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function reg_producto(){
		if(!$this->session->userdata('session'))redirect('login');

		$data = array(
			'nom_producto'     =>  $this->input->POST('nom_producto'),
			'id_categoria'     =>  $this->input->POST('id_categoria'),
			'precio'  		   =>  $this->input->POST('precio'),
			'cantidad_stock'   =>  $this->input->POST('cantidad_stock'),
			'id_user' 		   =>  $this->session->userdata('id_user'),
			'fecha_update'     =>  date('Y-m-d'),
		);

		$data =	$this->Parametros_model->reg_producto($data);
		echo json_encode($data);
	}

	public function consultar_producto(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->consultar_producto($data);
	   	echo json_encode($data);
	}

	public function consultar_categoria_2(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->consultar_categoria_2($data);
	   	echo json_encode($data);
	}

	public function editar_producto(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->editar_producto($data);
	   	echo json_encode($data);
	}

	public function eliminar_producto(){
		if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data =	$this->Parametros_model->eliminar_producto($data);
		echo json_encode($data);
	}
	//-----------------------
	// CONVERTIDOR DE MONEDA
	public function conv_moneda(){
		if(!$this->session->userdata('session'))redirect('login');

		$data['moneda'] = $this->Parametros_model->listar_moneda();

		$this->load->view('templates/header.php');
		$this->load->view('templates/navegator');
		$this->load->view('parametros/conv_moneda/index.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function reg_conv_moneda(){
		if(!$this->session->userdata('session'))redirect('login');

		$data = array(
			'descripcion'  =>  $this->input->POST('moneda'),
			'valor'  	   =>  $this->input->POST('valor'),
			'fecha_reg'	   =>  $this->input->POST('fecha_act'),
			'id_user' 	   => $this->session->userdata('id_user'),
			'fecha_update' => date('Y-m-d'),
		);

		$data =	$this->Parametros_model->reg_conv_moneda($data);
		echo json_encode($data);
	}

	public function consultar_moneda(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->consultar_moneda($data);
	   	echo json_encode($data);
	}

	public function editar_moneda(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->editar_moneda($data);
	   	echo json_encode($data);
	}

	public function eliminar_moneda(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->eliminar_moneda($data);
	   	echo json_encode($data);
	}
	//-----------------------
	//USUARIOS
	public function usuario(){
		if(!$this->session->userdata('session'))redirect('login');

		$data['tipo_doc'] = $this->Parametros_model->listar_tip_doc();
		$data['perfiles'] = $this->Parametros_model->listar_perfiles();

		$id_user = $this->session->userdata('id_user');
		$data['usuarios'] = $this->Parametros_model->listar_usuarios($id_user);

		$this->load->view('templates/header.php');
		$this->load->view('templates/navegator');
		$this->load->view('parametros/usuario/index.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function reg_usuario(){
		if(!$this->session->userdata('session'))redirect('login');

		$data = array(
			'id_tip_doc'  =>  $this->input->POST('id_tip_doc'),
			'cedula'	  =>  $this->input->POST('cedula'),
			'nom_ape'	  =>  $this->input->POST('nom_ape'),
			'fecha_update'=> date('Y-m-d'),
		);

		$password = $this->input->POST('contrasenia');

		$clave = password_hash(
				base64_encode(
					hash('sha256', $password, true)
				),
				PASSWORD_DEFAULT
			);

		$data2= array(
			'usuario'     => $this->input->POST('usuario'),
			'contrasenia' => $clave,
			'id_perfil'   => $this->input->POST('id_perfil'),
			'fecha_update'=> date('Y-m-d'),
		 );

		$data =	$this->Parametros_model->reg_usuario($data, $data2);
		echo json_encode($data);
	}

	public function eliminar_usuario(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->eliminar_usuario($data);
	   	echo json_encode($data);
	}

	public function camb_est_usuario(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->camb_est_usuario($data);
	   	echo json_encode($data);
	}

	public function consultar_user(){
		if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data =	$this->Parametros_model->consultar_user($data);
		echo json_encode($data);
	}

	public function editar_usuario(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->editar_usuario($data);
	   	echo json_encode($data);
	}
	//-----------------------
}
