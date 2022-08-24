<?php
    class Pagos_model extends CI_model{
        public function buscar_fact($data){
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
                                c.responsable,
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
        }

        public function ver_consignacion_tabla($data){
            $this->db->select('rpf.id_reg_prod_fact,
                        	   rpf.id_registro_fact,
                        	   rpf.id_producto,
                        	   p.nom_producto,
                        	   p.fec_exp,
                        	   p.id_presentacion,
                        	   p2.descripcion,
                        	   p2.peso,
                        	   p2.sabor,
                        	   rpf.cantidad,
                        	   rpf.precio,
                        	   rpf.sub_total');
            $this->db->join('parametros.producto p', 'p.id_producto = rpf.id_producto');
            $this->db->join('parametros.presentacion p2', 'p2.id_presentacion = p.id_presentacion ');
            $this->db->where('id_registro_fact', $data['id_registro_fact']);
            $query = $this->db->get('facturas.reg_prod_fact rpf');
            $response = $query->result_array();
            return $response;
        }

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
            //print_r($response);die;
            return $response;
        }

        public function guardar_proc_pag($data){
            if ($data['total_bs_pag'] == '0') {
                $id_estatus = 8;
            }else {
                $id_estatus = 9;
            }

            $data1 = array('id_registro_fact' => $data['id_reg_factura_ver'],
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
            $this->db->insert('luz.mov_consig',$data1);

            $data1 = array('id_estatus' => '9',
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
    }
?>
