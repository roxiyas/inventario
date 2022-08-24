<?php
    class Login_model extends CI_model{

        public function ingresar($usuario,$contrasenia){
            $this->db->select('*');
			$this->db->where('usuario',$usuario);
			$this->db->from('seguridad.usuarios');
			$result = $this->db->get();
			if($result->num_rows() == 1){
				$db_clave = $result->row('contrasenia');
                if(password_verify( base64_encode(hash('sha256', $contrasenia, true)),$db_clave)){
					return $result->row_array();
				}else{
                    return 'CONTRASENIA';
                }
			}else{
				return 'NO EXISTE';
			}
        }

        public function count_cliente(){
            $this->db->select('count(id_cliente) as clientes');
            $query= $this->db->get('parametros.cliente c');
            return $query->row_array();
        }

        public function count_prod(){
            $this->db->select('count(id_producto) as productos');
            $query= $this->db->get('parametros.producto p');
            return $query->row_array();
        }

        public function count_fac(){
            $this->db->select('count(id_registro_fact) as fact');
            $query= $this->db->get('facturas.registro_fact rf');
            return $query->row_array();
        }

        public function cambiar_clave($id_usuario, $data){
           $this->db->where('id_user', $id_usuario);
           $update = $this->db->update('seguridad.usuarios', $data);
           return $update;
       }
    }
?>
