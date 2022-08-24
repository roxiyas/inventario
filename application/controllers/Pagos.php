<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pagos extends CI_Controller {
    //Verificar y Registrar
    public function ingreso(){
        if(!$this->session->userdata('session'))redirect('login');

        $id_user = $this->session->userdata('id_user');
        $data['monedas'] = $this->Consignacion_model->listar_monedas();
        $data['facturas'] = $this->Pagos_model->listar_facturas();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        $this->load->view('pagos/ingreso.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function buscar_fact(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Inventario_model->listar_clientes_ind($data);
        echo json_encode($data);
    }

    public function buscar_fact_ind(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Pagos_model->buscar_fact($data);
        echo json_encode($data);
    }

    public function buscar_fact_art(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Pagos_model->ver_consignacion_tabla($data);
        echo json_encode($data);
    }

    public function consultar_total_fact(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Pagos_model->consultar_total_fact($data);
        echo json_encode($data);
    }

    public function guardar_proc_pag(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Pagos_model->guardar_proc_pag($data);
        echo json_encode($data);
    }

    public function buscar_mov_fac(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Pagos_model->buscar_mov_fac($data);
        echo json_encode($data);
    }

    public function reporte(){
        if(!$this->session->userdata('session'))redirect('login');

        $data['id_perfil'] = $this->session->userdata('id_perfil');
        $id_user   = $this->session->userdata('id_user');

        $data['factura'] = $this->Consignacion_model->listar_factura($data['id_perfil'], $id_user);

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        $this->load->view('pagos/reporte.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function ver_factura(){
        if(!$this->session->userdata('session'))redirect('login');

        $id_cliente = $this->input->get('id');
        $data['factura_x_cliente']       = $this->Pagos_model->ver_consignacion($id_cliente);
       // print_r($id_cliente);die;
        $data['factura_x_cliente_prod']  = $this->Pagos_model->ver_consignacion_prod($id_cliente);
        /*
        $id_registro_fact = $this->input->get('id');
        $data['id_perfil'] = $this->session->userdata('id_perfil');
        $id_user           = $this->session->userdata('id_user');

        $data['factura_ind']       = $this->Pagos_model->ver_consignacion($id_registro_fact, $data['id_perfil'], $id_user);
        $data['factura_ind_tabla'] = $this->Pagos_model->ver_consignacion_tabla_2($id_registro_fact,$data['id_perfil'],$id_user);
        $data['mov_factura']       = $this->Pagos_model->buscar_mov_fac2($id_registro_fact);*/

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        $this->load->view('pagos/procesar_pagos.php', $data);
        //$this->load->view('pagos/reporte_ind.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function ver_factura_ind(){
        if(!$this->session->userdata('session'))redirect('login');

        $id_cliente = $this->input->get('id');
       /* $data['factura_x_cliente']       = $this->Pagos_model->ver_consignacion($id_cliente);
        $data['factura_x_cliente_prod']  = $this->Pagos_model->ver_consignacion_prod($id_cliente);*/
        
        $id_registro_fact = $this->input->get('id');
        $data['id_perfil'] = $this->session->userdata('id_perfil');
        $id_user           = $this->session->userdata('id_user');

        $data['factura_ind']       = $this->Pagos_model->ver_consignacion_ind($id_registro_fact, $data['id_perfil'], $id_user);
        $data['factura_ind_tabla'] = $this->Pagos_model->ver_consignacion_tabla_2($id_registro_fact,$data['id_perfil'],$id_user);
        $data['mov_factura']       = $this->Pagos_model->buscar_mov_fac2($id_registro_fact);

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        //$this->load->view('pagos/procesar_pagos.php', $data);
        $this->load->view('pagos/reporte_ind.php', $data);
        $this->load->view('templates/footer.php');
    }

}
