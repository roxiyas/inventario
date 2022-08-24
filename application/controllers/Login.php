<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		$this->load->view('login/index.php');
	}

	//Confirmar inicio de session
	public function validacion(){
		$usuario = $_POST['usuario'];
        $contrasenia = $_POST ['contrasenia'];
		$data = $this->Login_model->ingresar($usuario,$contrasenia);

		if ($data == 'NO EXISTE') {
			$this->session->set_flashdata('sa-error', 'Datos de autenticación erróneos.');
			redirect('login/index', 'refres');
		}else if($data == 'CONTRASENIA'){
			$this->session->set_flashdata('sa-error2', 'Datos de autenticación erróneos.');
			redirect('login/index', 'refres');
		}else{
			$user_data =[
				'id_user'	 => $data['id_user'],
                'usuario'    => $data['usuario'],
                'id_perfil'  => $data['id_perfil'],
                'id_persona' => $data['id_persona'],
				'fecha_reg'  => $data['fecha_reg'],
                'session'    => TRUE,
            ];

			$this->session->set_userdata($user_data);
            redirect('login/inicio');
        }
	}

	public function inicio(){
		if(!$this->session->userdata('session'))redirect('login');

		$data['clientes'] = $this->Login_model->count_cliente();
		$data['producto'] = $this->Login_model->count_prod();
		$data['facturas'] = $this->Login_model->count_fac();
		//sprint_r($data['clientes']);die;

        $this->load->view('templates/header.php');
        $this->load->view('templates/navegator.php');
        $this->load->view('login/inicio.php', $data);
        $this->load->view('templates/footer.php');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login/index');
	}

	public function v_camb_clave(){
		if(!$this->session->userdata('session'))redirect('login');

		$this->load->view('templates/header.php');
        $this->load->view('templates/navegator.php');
		$this->load->view('login/cambiar_clave.php');
		$this->load->view('templates/footer.php');
	}

	public function cambiar_clave(){
		$id_usuario = $this->session->userdata('id_user');
		$clave = $this->input->POST('clave');
		$c_clave = $this->input->POST('c_clave');

		if($clave == $c_clave) {
			$clave_r =password_hash(
				base64_encode(
					hash('sha256', $clave, true)
						),
						PASSWORD_DEFAULT
					);
			$data = array (
					'contrasenia'         => $clave_r,
					'fecha_update'     => date('Y-m-d h:i:s'),
				);
			$data = $this->Login_model->cambiar_clave($id_usuario, $data);
			echo json_encode($data);
		}else{
			$data = 'false';
			echo json_encode($data);
		}
	}
}
