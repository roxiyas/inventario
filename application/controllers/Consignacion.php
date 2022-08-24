<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consignacion extends CI_Controller {
    //Registro
	public function cons_nro(){
		if(!$this->session->userdata('session'))redirect('login');
		$data =	$this->Consignacion_model->cons_nro();
		echo json_encode($data);
	}

    public function registro(){
        if(!$this->session->userdata('session'))redirect('login');

        $id_user = $this->session->userdata('id_user');
		$data['tipo_doc'] = $this->Parametros_model->listar_tip_doc();
        $data['clientes'] = $this->Consignacion_model->listar_clientes($id_user);
        $data['productos'] = $this->Consignacion_model->listar_productos();
        $data['monedas'] = $this->Consignacion_model->listar_monedas();
        $data['estado'] = $this->Parametros_model->listar_estado();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        $this->load->view('consignacion/registro.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function cargar_info(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Consignacion_model->listar_clientes_ind($data);
        echo json_encode($data);
    }

    public function listar_prodc(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Consignacion_model->listar_prodc($data);
        echo json_encode($data);
    }

    public function listar_mond(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Consignacion_model->listar_mond($data);
        echo json_encode($data);
    }

    public function comprometer_cant(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Consignacion_model->comprometer_cant($data);
        print_r($data);die;
        echo json_encode($data);
    }

    public function reg_factura(){
        if(!$this->session->userdata('session'))redirect('login');
        
        $si_existe = $this->input->POST('si_existe');
        $existe = $this->input->POST('existe');

        $data_c = array(
			'id_estado' 	    =>  $this->input->POST('id_estado'),
			'id_ciudad'	        =>  $this->input->POST('id_ciudad'),
			'id_municipio' 	    =>  $this->input->POST('id_municipio'),
			'id_parroquia' 	    =>  $this->input->POST('id_parroquia'),
			'dir_fiscal'		=>  $this->input->POST('dir_fiscal'),
			'id_tip_doc' 	    =>  $this->input->POST('id_tip_doc'),
			'cod_rif' 	 	    =>  $this->input->POST('rif'),
			'nom_razon_social' 	=>  $this->input->POST('nom_razon_social'),
			'nro_telefono' 	    =>  $this->input->POST('nro_telefono'),
			'id_user' 	        => $this->session->userdata('id_user'),
			'fecha_update'      => date('Y-m-d'),
		);

        $data = array(
            'fec_registro' => $this->input->POST('fec_registro'),
            'nro_factura'  => $this->input->POST('nro_factura'),
            'id_cliente'   => $this->input->POST('id_cliente'),
            'sub_total_2'  => $this->input->POST('sub_total_2'),
            'iva'          => $this->input->POST('iva'),
            'id_moneda'    => $this->input->POST('id_moneda'),
            'valor'        => $this->input->POST('valor'),
            'total_mon'    => $this->input->POST('total_mon'),
            'total'        => $this->input->POST('total'),
            'id_user' 	   => $this->session->userdata('id_user'),
            'fecha_update' => date('Y-m-d'),
            'id_estatus'   => $this->input->POST('id_estatus'),
        );

		$data1 = array(
			'id_producto'   =>  $this->input->POST('id_producto'),
			'cantidad'	    =>  $this->input->POST('cantidad'),
			'precio' 	    =>  $this->input->POST('precio'),
			'sub_total' 	=>  $this->input->POST('sub_total'),
			'fecha_update'  =>  date('Y-m-d'),
		);

        $data2 = array(
            'id_tipo_pago'      => $this->input->POST('id_tipo_pago'),
            'banco'             => $this->input->POST('banco'),
            'nro_referencia'    => $this->input->POST('nro_referencia'),
            'total_abonado_bs'  => $this->input->POST('monto'),
            'total_abonado_om'  => $this->input->POST('monto_om'),
            'restante_bs'       => $this->input->POST('restante_bs'),
            'restante_om'       => $this->input->POST('restante_om'),
            'id_user' 	        => $this->session->userdata('id_user'),
            'id_estatus'        => $this->input->POST('id_estatus'),
        );

		$data =	$this->Consignacion_model->reg_factura($data, $data1, $data2, $data_c, $si_existe, $existe);
		echo json_encode($data);
    }

    // PROCESAR FACTURA
    public function procesar(){
        if(!$this->session->userdata('session'))redirect('login');

        $data['id_perfil'] = $this->session->userdata('id_perfil');
        $id_user           = $this->session->userdata('id_user');

        $data['factura'] = $this->Consignacion_model->listar_factura($data['id_perfil'], $id_user);

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        $this->load->view('consignacion/procesar_fact.php', $data);
        $this->load->view('templates/footer.php');
    }

    // REPORTE
    public function reporte(){
        if(!$this->session->userdata('session'))redirect('login');

        $data['id_perfil'] = $this->session->userdata('id_perfil');
        $id_user   = $this->session->userdata('id_user');

        $data['factura'] = $this->Consignacion_model->listar_factura($data['id_perfil'], $id_user);

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        $this->load->view('consignacion/reporte.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function ver_consignacion(){
        if(!$this->session->userdata('session'))redirect('login');
        
        $id_registro_fact = $this->input->get('id');
        $data['id_perfil'] = $this->session->userdata('id_perfil');
        $id_user           = $this->session->userdata('id_user');

        $data['factura_ind'] = $this->Consignacion_model->ver_consignacion($id_registro_fact, $data['id_perfil'], $id_user);
        $data['factura_ind_tabla'] = $this->Consignacion_model->ver_consignacion_tabla($id_registro_fact,$data['id_perfil'],$id_user);

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        $this->load->view('consignacion/reporte_ind.php', $data);
        $this->load->view('templates/footer.php');
    }

    //ELIMNAR
    public function eliminar_factura(){
        if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data =	$this->Consignacion_model->eliminar_factura($data);
		echo json_encode($data);
    }

    //EDITAR
    public function editar_factura(){
        if(!$this->session->userdata('session'))redirect('login');

        $id_registro_fact = $this->input->get('id');
        $data['factura_ind'] = $this->Consignacion_model->ver_factura($id_registro_fact);
        $data['factura_ind_tabla'] = $this->Consignacion_model->ver_factura_tabla($id_registro_fact);

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        $this->load->view('consignacion/editar_fac.php', $data);
        $this->load->view('templates/footer.php');
    }

    // PROCESO DE FACTURA - APROBAR
    public function aprobar_factura(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data = $this->Consignacion_model->aprobar_factura($data);
        echo json_encode($data);
    }

    // ANULAR
    public function anular_factura(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data = $this->Consignacion_model->anular_factura($data);
        echo json_encode($data);
    }
}
