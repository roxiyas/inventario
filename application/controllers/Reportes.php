<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {
    public function total_dia(){
        if(!$this->session->userdata('session'))redirect('login');

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        $this->load->view('reportes/total_dia.php');
        $this->load->view('templates/footer.php');
    }

    public function consultar_dia(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Reportes_model->consultar_dia($data);
        echo json_encode($data);
    }

    public function list_precios(){
        if(!$this->session->userdata('session'))redirect('login');

        $data['listPrecios'] =	$this->Reportes_model->list_precios();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator');
        $this->load->view('reportes/listaPrecio.php', $data );
        $this->load->view('templates/footer.php');
    }

}