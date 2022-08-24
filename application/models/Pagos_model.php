<?php
    class Pagos_model extends CI_model{
        /*public function buscar_fact($data){
            $this->db->select('rf.id_registro_fact,
                                rf.fecha_reg,
                                rf.fecha_update,
                                rf.nro_factura,
                                rf.id_cliente,
                                c.cod_rif,
                                c.nom_razon_social,
                                c.id_estado,
                                e.descedo,
                                c.id_ciudad,
                                c2.descciu,
                                c.dir_fiscal,
                                rf.sub_total_2,
                                rf.iva,
                                rf.id_moneda,
                                cm.descripcion,
                                rf.valor,
                                rf.total_mon,
                                rf.total,
                                rf.id_estatus,
                                e2.descripcion,
                                rf.id_user,
                                u.usuario');
            $this->db->join('parametros.cliente c', 'c.id_cliente = rf.id_cliente');
            $this->db->join('public.estados e', 'e.id = c.id_estado');
            $this->db->join('public.ciudades c2', 'c2.id = c.id_ciudad');
            $this->db->join('seguridad.estatus e2', 'e2.id_estatus = rf.id_estatus');
            $this->db->join('parametros.conv_moneda cm', 'cm.id_moneda = rf.id_moneda');
            $this->db->join('seguridad.usuarios u', 'u.id_user = rf.id_user');
            $this->db->where('rf.nro_factura', $data['nro_factura_b']);
            $query = $this->db->get('facturas.registro_fact rf');
			return $query->row_array();
        }*/

        /*public function listar_facturas(){
            $this->db->select("rf.id_cliente,
                                c.nom_razon_social,
                                 sum(rf.total) total_fact, 
                                 sum(to_number(rf.total_mon,'999999999999D99')) as om ");
            $this->db->join('parametros.cliente c', 'c.id_cliente = rf.id_cliente');
            $this->db->where('rf.id_estatus !=', '9');
            $this->db->group_by('rf.id_cliente, c.nom_razon_social');
            $query = $this->db->get('facturas.registro_fact rf');
            return $query->result_array();
        }*/

        public function listar_facturas(){
            $this->db->select("rf.id_cliente,
                                c.nom_razon_social");
            $this->db->join('parametros.cliente c', 'c.id_cliente = rf.id_cliente');
            $this->db->where('rf.id_estatus !=', '9');
            $this->db->group_by('rf.id_cliente, c.nom_razon_social');
            $query = $this->db->get('facturas.registro_fact rf');
            return $query->result_array();
        }

        public function ver_consignacion($id_cliente){
            $this->db->select("mc.id_registro_fact,
                                rf.nro_factura,
                                c.nom_razon_social,
                                mc.restante_bs,
                                mc.restante_om");
            $this->db->join('facturas.registro_fact rf', 'rf.id_registro_fact = mc.id_registro_fact');
            $this->db->join('parametros.cliente c', 'c.id_cliente = rf.id_cliente');
            $this->db->where('rf.id_estatus !=', '9');
            $this->db->where('rf.id_cliente', $id_cliente);
            $this->db->order_by('mc.id_mov_consig DESC');
            $query = $this->db->get('luz.mov_consig mc');
            if ($query->result_array() == Array ( )) {
				return '0';
			}else{
				return $query->row_array();
			}
            
        }

        public function ver_consignacion_prod($id_cliente){
            $this->db->select('rpf.id_registro_fact,
                                rf.id_registro_fact,
                                rpf.id_producto,
                                p.nom_producto,
                                rf.nro_factura,
                                rpf.cantidad,
                                rpf.precio,
                                rpf.sub_total');
            $this->db->join('facturas.registro_fact rf', 'rf.id_registro_fact = rpf.id_registro_fact');
            $this->db->join('parametros.producto p', 'p.id_producto = rpf.id_producto');
            $this->db->where('rf.id_cliente', $id_cliente);
            $this->db->where('rf.id_estatus !=', '9');
            $query = $this->db->get('facturas.reg_prod_fact rpf');
            return $query->result_array();

        }


        /*public function ver_consignacion_tabla($data){
            $this->db->select('rpf.id_reg_prod_fact,
                        	   rpf.id_registro_fact,
                        	   rpf.id_producto,
                        	   p.nom_producto,
                        	   p.id_categoria,
                        	   c.descripcion categoria,
                        	   rpf.cantidad,
                        	   rpf.precio,
                        	   rpf.sub_total');
            $this->db->join('parametros.producto p', 'p.id_producto = rpf.id_producto');
            $this->db->join('parametros.categoria c', 'c.id_categoria = p.id_categoria');
            $this->db->where('id_registro_fact', $data['id_registro_fact']);
            $query = $this->db->get('facturas.reg_prod_fact rpf');
            $response = $query->result_array();
            return $response;
        }*/

        public function consultar_total_fact($data){
            $this->db->select('mc.id_mov_consig,
                                mc.restante_bs,
                                mc.restante_om,
                                mc.id_moneda,
                                cm.descripcion,
                                mc.valor');
            $this->db->join('parametros.conv_moneda cm', 'cm.id_moneda = mc.id_moneda');
            $this->db->where('mc.id_registro_fact', $data['id_reg_factura']);
            $this->db->order_by('mc.id_mov_consig DESC');
            $query = $this->db->get('luz.mov_consig mc');
            $response = $query->row_array();
            return $response;
        }

        public function guardar_proc_pag($data){
            if ($data['total_bs_pag'] == '0') {
                $id_estatus = 9;
            }else {
                $id_estatus = 8;
            }  

            $data1 = array('id_registro_fact' => $data['id_reg_factura_ver'],
                            'id_tipo_pago'    => $data['id_tipo_pago'],
                            'nro_referencia'    => $data['nro_referencia'],
                            'total_ant_bs'      => $data['cantidad_deu'],
                            'id_moneda'         => $data['id_moneda_ver'],
                            'valor'             => $data['valor_2'],
                            'total_om'          => $data['cantidad_deu_om'],
                            'total_abonado_bs'  => $data['cantidad_pagar_bs'],
                            'total_abonado_om'  => $data['cantidad_pagar_otra'],
                            'restante_bs'       => $data['total_bs_pag'],
                            'restante_om'       => $data['total_otra'],
                            'id_user'           => $this->session->userdata('id_user'),
                            'id_estatus'        => $id_estatus,
                            'fecha_reg'         => date('Y-m-d h:i:s')
                        );
            $x = $this->db->insert('luz.mov_consig',$data1);

            $data1 = array('id_estatus' => $id_estatus,
                            'fecha_update' => date('Y-m-d h:i:s'));
            $this->db->where('id_registro_fact', $data['id_reg_factura_ver']);
            $update = $this->db->update('facturas.registro_fact', $data1);

            return true;
        }

        public function buscar_mov_fac($data){
            $this->db->select('*');
            $this->db->where('id_registro_fact', $data['id_registro_fact']);
            $query = $this->db->get('luz.mov_consig');
            $response = $query->result_array();
            return $response;
        }

        
        

        //Reportes para imprimir
        public function ver_consignacion_ind($id_registro_fact){
            $this->db->select('rf.id_registro_fact,
                                rf.fecha_reg,
                                rf.fecha_update,
                                rf.nro_factura,
                                rf.id_cliente,
                                c.cod_rif,
                                c.nom_razon_social,
                                c.id_estado,
                                e.descedo,
                                c.id_ciudad,
                                c2.descciu,
                                c.dir_fiscal,
                                rf.sub_total_2,
                                rf.iva,
                                rf.id_moneda,
                                cm.descripcion,
                                rf.valor,
                                rf.total_mon,
                                rf.total,
                                rf.id_estatus,
                                e2.descripcion,
                                rf.id_user,
                                u.usuario');
            $this->db->join('parametros.cliente c', 'c.id_cliente = rf.id_cliente');
            $this->db->join('public.estados e', 'e.id = c.id_estado');
            $this->db->join('public.ciudades c2', 'c2.id = c.id_ciudad');
            $this->db->join('seguridad.estatus e2', 'e2.id_estatus = rf.id_estatus');
            $this->db->join('parametros.conv_moneda cm', 'cm.id_moneda = rf.id_moneda');
            $this->db->join('seguridad.usuarios u', 'u.id_user = rf.id_user');
            $query = $this->db->get('facturas.registro_fact rf');
            $response = $query->row_array();
            return $response;
        }

        public function ver_consignacion_tabla_2($id_registro_fact){
            $this->db->select('rpf.id_reg_prod_fact,
                               rpf.id_registro_fact,
                               rpf.id_producto,
                               p.nom_producto,
                               p.id_categoria,
                               p2.descripcion categoria,
                               rpf.cantidad,
                               rpf.precio,
                               rpf.sub_total');
            $this->db->join('parametros.producto p', 'p.id_producto = rpf.id_producto');
            $this->db->join('parametros.categoria p2', 'p2.id_categoria = p.id_categoria ');
            $this->db->where('id_registro_fact', $id_registro_fact);
            $query = $this->db->get('facturas.reg_prod_fact rpf');
            $response = $query->result_array();
            return $response;
        }

        public function buscar_mov_fac2($id_registro_fact){
            $this->db->select('mc.id_mov_consig,
                                mc.id_tipo_pago,
                                tp.descripcion pago,
                                mc.nro_referencia,
                                mc.total_ant_bs,
                                mc.id_moneda,
                                cm.descripcion moneda,
                                mc.valor,
                                mc.total_om,
                                mc.total_abonado_bs,
                                mc.total_abonado_om,
                                mc.restante_bs,
                                mc.restante_om,
                                mc.fecha_reg');
            $this->db->join('parametros.tip_pago tp', 'tp.id_tip_pago = mc.id_tipo_pago', 'left');
            $this->db->join('parametros.conv_moneda cm', 'cm.id_moneda = mc.id_moneda', 'left');
            $this->db->where('id_registro_fact', $id_registro_fact);
            $query = $this->db->get('luz.mov_consig mc');
            $response = $query->result_array();
            return $response;
        }

    }
?>
