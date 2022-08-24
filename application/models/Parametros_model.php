<?php
    class Parametros_model extends CI_model{
        // Cliente
        public function listar_tip_doc(){
            $this->db->select('*');
            $query = $this->db->get('parametros.tip_doc');
            return $query->result_array();
        }

        public function listar_estado(){
            $this->db->select('*');
            $query = $this->db->get('public.estados');
            return $query->result_array();
        }

        public function listar_municipio($data){
            $response = array();
            $this->db->select('*');
            $this->db->where('id_estado', $data['id_estado']);
            $query = $this->db->get('public.municipios');
            $response = $query->result_array();
            return $response;
        }

        public function listar_ciudades($data){
            $response = array();
            $this->db->select('*');
            $this->db->where('estado_id', $data['id_estado']);
            $query = $this->db->get('public.ciudades');
            $response = $query->result_array();
            return $response;
        }

        public function listar_parroquia($data){
            $response = array();
            $this->db->select('*');
            $this->db->where('id_municipio', $data['id_municipio']);
            $query = $this->db->get('public.parroquias');
            $response = $query->result_array();
            return $response;
        }

        public function listar_vendedores(){
            $this->db->select('*');
            $query = $this->db->get('seguridad.usuarios');
            return $query->result_array();
        }

        public function reg_cliente($data){
            $quers =$this->db->insert('parametros.cliente',$data);
            return true;
        }

        public function listar_clientes(){
            $this->db->select('c.id_cliente,
                        	   c.id_estado,
                        	   e.descedo,
                        	   c.cod_rif,
                        	   c.nom_razon_social,
                        	   u.id_persona,
                        	   p.nom_ape');
            $this->db->join('public.estados e', 'e.id = c.id_estado');
            $this->db->join('seguridad.usuarios u', 'u.id_user = c.id_user');
            $this->db->join('seguridad.persona p', 'p.id_persona = u.id_persona', 'left');
            $query = $this->db->get('parametros.cliente c');
            return $query->result_array();
        }

        public function consultar_cliente($data){
            $this->db->select('c.id_cliente,
                        	   c.id_estado,
                        	   e.descedo,
                               c.id_ciudad,
	                           c2.descciu ciudad,
                        	   c.id_municipio,
                        	   m.descripcion municipio,
                        	   c.id_parroquia,
                        	   p2.descripcion parroquia,
                               c.dir_fiscal,
                        	   c.id_tip_doc,
                        	   td.descripcion t_doc,
                        	   c.cod_rif,
                        	   c.nom_razon_social,
                               c.nro_telefono');
            $this->db->join('public.estados e', 'e.id = c.id_estado');
            $this->db->join('public.ciudades c2', 'c2.id = c.id_ciudad');
            $this->db->join('public.municipios m', 'm.id_municipio = c.id_municipio');
            $this->db->join('public.parroquias p2', 'p2.id_parroquia = c.id_parroquia');
            $this->db->join('parametros.tip_doc td', 'td.id_tip_doc = c.id_tip_doc');
            $this->db->where('id_cliente', $data['id_cliente']);
            $query = $this->db->get('parametros.cliente c');
            return $query->row_array();
        }

        public function consultar_estado_mod($data){
            $this->db->select('*');
            $query = $this->db->get('public.estados');
            return $query->result_array();
        }

        public function consultar_ciudad_mod($data){
            $this->db->select('*');
            $this->db->where('id !=', $data['id_ciu_consul']);
            $this->db->where('estado_id', $data['id_est_consul']);
            $query = $this->db->get('public.ciudades');
            return $query->result_array();
        }

        public function consultar_municipio_mod($data){
            $this->db->select('*');
            $this->db->where('id_municipio !=', $data['id_mun_consul']);
            $this->db->where('id_estado', $data['id_est_consul']);
            $query = $this->db->get('public.municipios');
            return $query->result_array();
        }

        public function consultar_parroquia_mod($data){
            $this->db->select('*');
            $this->db->where('id_parroquia !=', $data['id_par_consul']);
            $this->db->where('id_municipio', $data['id_mun_consul']);
            $query = $this->db->get('public.parroquias');
            return $query->result_array();
        }

        public function consultar_tip_doc_mod($data){
            $this->db->select('*');
            $this->db->where('id_tip_doc !=', $data['id_tip_doc']);
            $query = $this->db->get('parametros.tip_doc');
            return $query->result_array();
        }

        public function consultar_vendedor_mod($data){
            $this->db->select('*');
            $this->db->where('id_user !=', $data['id_vendedor']);
            $query = $this->db->get('seguridad.usuarios');
            return $query->result_array();
        }

        public function editar_cliente($data){
            $fecha_update = date('Y-m-d');
            $id_user = $this->session->userdata('id_user');

            $this->db->set('id_estado', $data['id_estado']);
            $this->db->set('id_ciudad', $data['id_ciudad']);
            $this->db->set('id_municipio', $data['id_municipio']);
            $this->db->set('id_parroquia', $data['id_parroquia']);
            $this->db->set('dir_fiscal', $data['dir_fiscal']);
            $this->db->set('id_tip_doc', $data['id_tip_doc']);
            $this->db->set('cod_rif', $data['cod_rif']);
            $this->db->set('nom_razon_social', $data['nom_razon_social']);
            $this->db->set('nro_telefono', $data['nro_telefono']);
            $this->db->set('fecha_update', $fecha_update);
            $this->db->set('id_user', $id_user);
            $this->db->where('id_cliente', $data['id_cliente']);
            $this->db->update('parametros.cliente');
            return true;
        }

        public function eliminar_cliente($data){
            $this->db->where('id_cliente', $data['id_client']);
            $this->db->delete('parametros.cliente');
            return true;
        }

        //-------------------------
        //CATEGORÍA
        public function listar_categoria(){
            $this->db->select('*');
            $query = $this->db->get('parametros.categoria');
            return $query->result_array();
        }

        public function reg_categoria($data){
                $quers =$this->db->insert('parametros.categoria',$data);
                return true;
        }

        public function consultar_categoria($data){
            $this->db->select('*');
            $this->db->where('id_categoria', $data['id_categoria']);
            $query = $this->db->get('parametros.categoria');
            return $query->row_array();
        }

        public function editar_categoria($data){
            $fecha_update = date('Y-m-d');
            $id_user = $this->session->userdata('id_user');

            $this->db->set('descripcion', $data['descripcion']);
            $this->db->set('fecha_update', $fecha_update);
            $this->db->set('id_user', $id_user);
            $this->db->where('id_categoria', $data['id_categoria']);
            $this->db->update('parametros.categoria');
            return true;
        }

        public function eliminar_categoria($data){
            $this->db->where('id_categoria', $data['id_categoria']);
            $this->db->delete('parametros.categoria');
            return true;
        }
        //--------------------

        //PRODUCTOS
        public function reg_producto($data){
            $quers =$this->db->insert('parametros.producto',$data);
            $id = $this->db->insert_id();

            if ($quers){
                $data2 = array('id_producto'        => $id,
                               'cantidad_stock'     => $data['cantidad_stock'],
                               'cantidad_sumar'     => 0,
                               'total_agr'          => $data['cantidad_stock'],
                               'fecha_update'       =>  date('Y-m-d'),
                               'tabla'              => 'R',    //Registro del producto en la tabla inv
                               'id_user'            => $data['id_user']
                           );
                $quers1 =$this->db->insert('luz.inv_resp',$data2);

                $data3 = array('id_producto'    => $id,
                               'cantidad_stock' => $data['cantidad_stock'],
                               'id_user'        => $data['id_user'],
                               'fecha_update'   =>  date('Y-m-d')
                           );
                $quers2 =$this->db->insert('inventario.inv',$data3);
            }
            return true;
        }

        public function listar_productos(){
            $this->db->select('p.id_producto,
								p.id_categoria,
								c.descripcion categoria,
                                p.precio,
								p.nom_producto,
								p.cantidad_stock');
            $this->db->join('parametros.categoria c', 'c.id_categoria = p.id_categoria');
            $query = $this->db->get('parametros.producto p');
            return $query->result_array();
        }

        public function consultar_producto($data){
            $this->db->select('p.id_producto,
								p.id_categoria,
								c.descripcion categoria,
                                p.precio,
								p.nom_producto,
								ir.cantidad_stock');
            $this->db->join('parametros.categoria c', 'c.id_categoria = p.id_categoria');
            $this->db->join('inventario.inv ir', 'ir.id_producto = p.id_producto');
            $this->db->where('p.id_producto', $data['id_product']);
            $query = $this->db->get('parametros.producto p');
            return $query->row_array();
        }

        public function consultar_categoria_2($data){
            $this->db->select('*');
            $this->db->where('id_categoria !=', $data['id_categoria']);
            $query = $this->db->get('parametros.categoria');
            return $query->result_array();
        }

        public function editar_producto($data){
            $fecha_update = date('Y-m-d');
            $id_user = $this->session->userdata('id_user');
            $this->db->set('nom_producto', $data['nomb_prod_ver']);
            $this->db->set('id_categoria', $data['id_catg']);
            $this->db->set('precio', $data['precio']);
            $this->db->set('cantidad_stock', $data['cantidad_stock_ver']);
            $this->db->set('fecha_update', $fecha_update);
            $this->db->set('id_user', $id_user);
            $this->db->where('id_producto', $data['id_producto']);
            $this->db->update('parametros.producto');
            return true;
        }

        public function eliminar_producto($data){
            $this->db->where('id_producto', $data['id_producto']);
            $this->db->delete('parametros.producto');

			$this->db->where('id_producto', $data['id_producto']);
            $this->db->delete('inventario.inv');			

			$fecha_update = date('Y-m-d');
            $id_user = $this->session->userdata('id_user');
			$tabla = 'ELIMINADO';
			$this->db->set('tabla', $tabla);
            $this->db->set('id_user', $id_user);
            $this->db->where('id_producto', $data['id_producto']);
            $this->db->update('luz.inv_resp');
            return true;
        }
        //--------------------

        //MONEDA
        public function listar_moneda(){
            // $this->db->select('*');
            // $query = $this->db->get('parametros.conv_moneda');
            // return $query->result_array();


            $query = $this->db->query("SELECT id_moneda,
	                                          descripcion,
	                                          valor,
	                                          to_char(fecha_reg, 'dd-mm-yyyy') as fecha_reg
                                              from parametros.conv_moneda cm ");
            return $query->result_array();
        }

        public function reg_conv_moneda($data){
            $quers =$this->db->insert('parametros.conv_moneda',$data);
            return true;
        }

        public function consultar_moneda($data){
            $this->db->select('*');
            $this->db->where('id_moneda', $data['id_moneda']);
            $query = $this->db->get('parametros.conv_moneda');
            return $query->row_array();
        }

        public function eliminar_moneda($data){
            $this->db->where('id_moneda', $data['id_moneda']);
            $this->db->delete('parametros.conv_moneda');
            return true;
        }

        public function editar_moneda($data){
            $fecha_update = date('Y-m-d');
            $id_user = $this->session->userdata('id_user');

            $this->db->set('descripcion', $data['moneda_edt']);
            $this->db->set('valor', $data['valor_edt']);
            $this->db->set('fecha_update', $fecha_update);
            $this->db->set('id_user', $id_user);
            $this->db->where('id_moneda', $data['id_moneda_ver']);
            $this->db->update('parametros.conv_moneda');
            return true;
        }
        //USUARIOS
        public function listar_perfiles(){
            $this->db->select('*');
            $query = $this->db->get('seguridad.perfil');
            return $query->result_array();
        }

        public function listar_usuarios($id_user){
            $this->db->select('p.id_persona,
                               u.id_user,
                        	   u.usuario,
                        	   u.id_perfil,
                        	   p2.descripcion perfil,
                        	   p.cedula,
                        	   p.nom_ape,
	                           u.id_estatus,
	                           e.descripcion estatus');
            $this->db->join('seguridad.perfil p2', 'p2.id_perfil = u.id_perfil');
            $this->db->join('seguridad.persona p', 'p.id_persona = u.id_persona');
            $this->db->join('seguridad.estatus e ', 'e.id_estatus = u.id_estatus');
            $this->db->where('u.id_user !=', $id_user);
            $this->db->where('u.id_estatus !=', 3);
            $query = $this->db->get('seguridad.usuarios u');
            return $query->result_array();
        }

        public function reg_usuario($data, $data2){
            $quers =$this->db->insert('seguridad.persona', $data);
            $id = $this->db->insert_id();

            if ($id) {
                $data3 = array(
                    'usuario'       => $data2['usuario'],
                    'contrasenia'   => $data2['contrasenia'],
                    'id_perfil'     => $data2['id_perfil'],
                    'id_persona'    => $id,
                    'fecha_update'  => $data2['fecha_update'],
                    'id_estatus'    => 1
                );
                $quers =$this->db->insert('seguridad.usuarios',$data3);
            }
            return true;
        }

        public function eliminar_usuario($data){
            $this->db->where('id_user', $data['id_user']);
            $this->db->delete('seguridad.usuarios');
            return true;

            $this->db->where('id_persona', $data['id_persona']);
            $this->db->delete('seguridad.persona');
            return true;
        }

        public function camb_est_usuario($data){
            if ($data['id_estatus'] == 1) {
                $this->db->set('id_estatus', 2);
                $this->db->where('id_user', $data['id_user']);
                $this->db->update('seguridad.usuarios');
            }else if ($data['id_estatus'] == 2) {
                $this->db->set('id_estatus', 1);
                $this->db->where('id_user', $data['id_user']);
                $this->db->update('seguridad.usuarios');
            }
            return true;
        }

        public function consultar_user($data){
            $this->db->select('p.id_persona,
                               u.id_user,
                        	   u.usuario,
                        	   u.id_perfil,
                        	   p2.descripcion perfil,
                        	   p.cedula,
                        	   p.nom_ape,
	                           u.id_estatus,
	                           e.descripcion estatus');
            $this->db->join('seguridad.perfil p2', 'p2.id_perfil = u.id_perfil');
            $this->db->join('seguridad.persona p', 'p.id_persona = u.id_persona');
            $this->db->join('seguridad.estatus e', 'e.id_estatus = u.id_estatus');
            $this->db->where('u.id_user =', $data['id_usuario']);
            $this->db->where('u.id_estatus !=', 3);
            $query = $this->db->get('seguridad.usuarios u');
            return $query->row_array();
        }

        public function editar_usuario($data){
            $fecha_update = date('Y-m-d');
            $id_user = $this->session->userdata('id_user');

            $this->db->set('usuario', $data['usuario_ver']);
            $this->db->set('id_perfil', $data['id_perf']);
            $this->db->where('id_user', $data['id_usuario']);
            $this->db->update('seguridad.usuarios u');


            $this->db->set('cedula', $data['cedula_ver']);
            $this->db->set('nom_ape', $data['nom_ape_ver']);
            $this->db->set('fecha_update', $fecha_update);
            $this->db->where('id_persona', $data['id_persona_ver']);
            $this->db->update('seguridad.persona');
            return true;
        }
    }
?>
