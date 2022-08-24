<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {

    public function ing_prod(){
        if(!$this->session->userdata('session'))redirect('login');

        // $id_user = $this->session->userdata('id_user');

        $data['productos'] = $this->Inventario_model->listar_productos();
        //print_r($data['productos']);die;
        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        $this->load->view('inventario/ing_prod.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function consultar_producto(){
		if(!$this->session->userdata('session'))redirect('login');
	   	$data = $this->input->post();
	   	$data =	$this->Parametros_model->consultar_producto($data);
	   	echo json_encode($data);
	}

    public function agr_prod(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $id_user = $this->session->userdata('id_user');

        $data1 = array(
            'id_producto'    => $data['id_producto'],
            'cantidad_stock' => $data['cantidad_stock_ver'],
            'cantidad_sumar' => $data['cantidad_sumar'],
            'total_agr'      => $data['total_agr'],
            'id_user'        => $id_user,
            'fecha_update'   => date('Y-m-d'),
            'tabla'          => 'A'   //Agregar_producto al inventario
        );

        $data1 = $this->Inventario_model->agr_prod_resp($data1);

        $data2 = array(
            'id_producto'    => $data['id_producto'],
            'cantidad_stock' => $data['total_agr'],
            'id_user'        => $id_user,
            'fecha_update'   => date('Y-m-d'),
        );
        $data2 =	$this->Inventario_model->agr_prod($data2);

        echo json_encode($data2);
    }

    //Verificar y Registrar
    public function ingreso_x_fac(){
        if(!$this->session->userdata('session'))redirect('login');

        $id_user = $this->session->userdata('id_user');

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        $this->load->view('inventario/ingreso_x_fac.php');
        $this->load->view('templates/footer.php');
    }

    //Respore
    public function reporte(){
        if(!$this->session->userdata('session'))redirect('login');

        $id_user = $this->session->userdata('id_user');

        // $data['clientes'] = $this->Factura_model->listar_clientes($id_user);
        $data['productos'] = $this->Inventario_model->listar_productos();
        // $data['monedas'] = $this->Factura_model->listar_monedas();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        $this->load->view('inventario/reporte.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function reporte_ind(){
        if(!$this->session->userdata('session'))redirect('login');

        $id_producto = $this->input->get('id');
        $data['detalle_prod'] = $this->Inventario_model->detalle_prod($id_producto);
        $data['detalle_prod_sal'] = $this->Inventario_model->detalle_prod_sal($id_producto);

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        $this->load->view('inventario/detalle_prod.php', $data);
        $this->load->view('templates/footer.php');
    }
}
