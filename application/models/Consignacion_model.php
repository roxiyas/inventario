<?php
    class Consignacion_model extends CI_model{
        // REGISTRO
		public function cons_nro(){
            $this->db->select('r.id_registro_fact, r.nro_factura');
            $this->db->order_by('r.id_registro_fact desc');
            $query = $this->db->get('facturas.registro_fact r');
            $response = $query->row_array();
            return $response;
        }

        public function listar_clientes($id_user){
            $this->db->select('*');
            $this->db->where('id_user', $id_user);
            $query = $this->db->get('parametros.cliente');
            $response = $query->result_array();
            return $response;
        }

        public function listar_clientes_ind($data){
            $this->db->select('c.id_cliente,
                               concat(td.descripcion,\'-\',c.cod_rif) as rif ,
                               c.nom_razon_social,
                               c.id_estado,
                               e.descedo,
                               c.id_ciudad,
                               c2.descciu,
							   c.nro_telefono,
                               c.dir_fiscal');
            $this->db->join('parametros.tip_doc td', 'td.id_tip_doc = c.id_tip_doc');
            $this->db->join('public.estados e', 'e.id = c.id_estado');
            $this->db->join('public.ciudades c2', 'c2.id = c.id_ciudad');
			//$this->db->where('c.id_cliente', $data['id_cliente']);
            $this->db->where('c.id_tip_doc', $data['id_tip_doc']);
            $this->db->where('c.cod_rif', $data['rif']);
            $query = $this->db->get('parametros.cliente c');
            $response = $query->row_array();
            return $response;
        }

        public function listar_productos(){
            $this->db->select('*');
            $query = $this->db->get('parametros.producto');
            $response = $query->result_array();
            return $response;
        }

        public function listar_monedas(){
            $this->db->select('*');
            $query = $this->db->get('parametros.conv_moneda');
            $response = $query->result_array();
            return $response;
        }

        public function listar_prodc($data){
            $this->db->select('p.id_producto,
                        	   p.nom_producto,
                               p.precio,
	                           c.id_categoria,
                        	   c.descripcion categoria,
                               i.cantidad_stock');
			$this->db->join('parametros.categoria c', 'c.id_categoria = p.id_categoria');
            $this->db->join('inventario.inv i', 'i.id_producto = p.id_producto');
            $this->db->where('p.id_producto', $data['id_prod']);
            $query = $this->db->get('parametros.producto p');
            $response = $query->row_array();
            return $response;
        }

        public function listar_mond($data){
            $this->db->select('valor');
            $this->db->where('id_moneda', $data['id_moneda']);
            $query = $this->db->get('parametros.conv_moneda');
            $response = $query->row_array();
            return $response;
        }

        public function comprometer_cant($data){
            $id_producto    = $data['id_prod'];
            $cantidad_stock = $data['cantidad_stock'];
            $cantidad_sol   = $data['cantidad'];
            $cantidad_restante = $cantidad_stock - $cantidad_sol;
            $fecha_update = date('Y-m-d h:i:s');
            $id_estatus = 7;
            $id_user = $this->session->userdata('id_user');

            $this->db->set('cantidad_stock', $cantidad_stock);
            $this->db->set('cantidad_sol', $cantidad_sol);
            $this->db->set('cantidad_restante', $cantidad_restante);
            $this->db->set('fecha_update', $fecha_update);
            $this->db->set('id_estatus', $id_estatus);
            $this->db->set('id_user', $id_user);
            $this->db->where('id_producto', $id_producto);
            $this->db->update('inventario.inv');
            return true;
        }

        public function reg_factura($data, $data1, $data_p, $data_c, $si_existe, $existe){


            if ($si_existe == 'SI') {
                $quers =$this->db->insert('facturas.registro_fact',$data);
                $id = $this->db->insert_id();
                $cant_proy = $data1['id_producto'];
                $count_prog = count($cant_proy);
    
                for ($i=0; $i < $count_prog; $i++){
                    $data2 = array(
                        'id_registro_fact'  => $id,
                        'id_producto'       => $data1['id_producto'][$i],
                        'cantidad'          => $data1['cantidad'][$i],
                        'precio'            => $data1['precio'][$i],
                        'sub_total'         => $data1['sub_total'][$i],
                        'fecha_update'      => $data1['fecha_update'],
                    );
                    $this->db->insert('facturas.reg_prod_fact',$data2);
    
                    $this->db->select('cantidad_stock');
                    $this->db->where('id_producto', $data1['id_producto'][$i]);
                    $query = $this->db->get('inventario.inv');
                    $query_cant = $query->row_array();
    
                    $cantidad_stock = $query_cant['cantidad_stock'];
                    $cantidad_restante = $cantidad_stock - $data1['cantidad'][$i];
    
                    $this->db->set('cantidad_stock', $cantidad_restante);
                    $this->db->set('id_user', $data['id_user']);
                    $this->db->set('fecha_update', $data1['fecha_update']);
                    $this->db->where('id_producto', $data1['id_producto'][$i]);
                    $this->db->update('inventario.inv');
    
                    $data3 = array('id_registro_fact'    => $id,
                                   'id_producto'         => $data1['id_producto'][$i],
                                   'cantidad_stock'      => $cantidad_stock,
                                   'cantidad_solicitada' => $data1['cantidad'][$i],
                                   'total_restante'      => $cantidad_restante,
                                   'id_user'             => $data['id_user'],
                                   'id_estatus'          => 7
                               );
                   $query = $this->db->insert('luz.mov_prod_cons',$data3);
                }
                $data5 = array('id_registro_fact'  => $id,
                                'id_tipo_pago'     => $data_p['id_tipo_pago'],
                                'banco'             => $data_p['banco'],
                                'nro_referencia'   => $data_p['nro_referencia'],
                                'total_ant_bs'     => $data['total'],
                                'id_moneda'        => $data['id_moneda'],
                                'valor'            => $data['valor'],
                                'total_om'         => $data['total_mon'],
                                'total_abonado_bs' => $data_p['total_abonado_bs'],
                                'total_abonado_om' => $data_p['total_abonado_om'],
                                'restante_bs'      => $data_p['restante_bs'],
                                'restante_om'      => $data_p['restante_om'],
                                'id_user'          => $data_p['id_user'],
                                'id_estatus'       => $data_p['id_estatus'],
                            );
                $this->db->insert('luz.mov_consig',$data5);
                return true;
            }else{
                $quers =$this->db->insert('parametros.cliente',$data_c);
                $id = $this->db->insert_id();

                $data3 = array(
                    'fec_registro'   => $data['fec_registro'],
                    'nro_factura'    => $data['nro_factura'],
                    'id_cliente'     => $id,
                    'sub_total_2'    => $data['sub_total_2'],
                    'iva'            => $data['iva'],
                    'id_moneda'      => $data['id_moneda'],
                    'valor'          => $data['valor'],
                    'total_mon'      => $data['total_mon'],
                    'total'          => $data['total'],
                    'id_user'        => $data['id_user'],
                    'fecha_update'   => $data['fecha_update'],
                    'id_estatus'     => $data['id_estatus']
                );
                
                $quers =$this->db->insert('facturas.registro_fact',$data3);
                $id = $this->db->insert_id();
                $cant_proy = $data1['id_producto'];
                $count_prog = count($cant_proy);
    
                for ($i=0; $i < $count_prog; $i++){
                    $data2 = array(
                        'id_registro_fact'  => $id,
                        'id_producto'       => $data1['id_producto'][$i],
                        'cantidad'          => $data1['cantidad'][$i],
                        'precio'            => $data1['precio'][$i],
                        'sub_total'         => $data1['sub_total'][$i],
                        'fecha_update'      => $data1['fecha_update'],
                    );
                    $this->db->insert('facturas.reg_prod_fact',$data2);
    
                    $this->db->select('cantidad_stock');
                    $this->db->where('id_producto', $data1['id_producto'][$i]);
                    $query = $this->db->get('inventario.inv');
                    $query_cant = $query->row_array();
    
                    $cantidad_stock = $query_cant['cantidad_stock'];
                    $cantidad_restante = $cantidad_stock - $data1['cantidad'][$i];
    
                    $this->db->set('cantidad_stock', $cantidad_restante);
                    $this->db->set('id_user', $data['id_user']);
                    $this->db->set('fecha_update', $data1['fecha_update']);
                    $this->db->where('id_producto', $data1['id_producto'][$i]);
                    $this->db->update('inventario.inv');
    
                    $data3 = array('id_registro_fact'    => $id,
                                   'id_producto'         => $data1['id_producto'][$i],
                                   'cantidad_stock'      => $cantidad_stock,
                                   'cantidad_solicitada' => $data1['cantidad'][$i],
                                   'total_restante'      => $cantidad_restante,
                                   'id_user'             => $data['id_user'],
                                   'id_estatus'          => 7
                               );
                    $query = $this->db->insert('luz.mov_prod_cons',$data3);

                    $data5 = array('id_registro_fact'  => $id,
                                    'id_tipo_pago'     => $data_p['id_tipo_pago'],
                                    'banco'            => $data_p['banco'],
                                    'nro_referencia'   => $data_p['nro_referencia'],
                                    'total_ant_bs'     => $data['total'],
                                    'id_moneda'        => $data['id_moneda'],
                                    'valor'            => $data['valor'],
                                    'total_om'         => $data['total_mon'],
                                    'total_abonado_bs' => $data_p['total_abonado_bs'],
                                    'total_abonado_om' => $data_p['total_abonado_om'],
                                    'restante_bs'      => $data_p['restante_bs'],
                                    'restante_om'      => $data_p['restante_om'],
                                    'id_user'          => $data_p['id_user'],
                                    'id_estatus'       => $data_p['id_estatus'],
                        );
                    $this->db->insert('luz.mov_consig',$data5);
                }
                return true;
            }
        }

        // REPORTE
        public function listar_factura($id_perfil, $id_user){
            if ($id_perfil == '3') {
                $this->db->select('rf.id_registro_fact,
                            	   rf.nro_factura,
                            	   rf.id_cliente,
                            	   c.nom_razon_social,
                            	   rf.fecha_reg,
                            	   rf.id_estatus,
                            	   e.descripcion ');
                $this->db->join('parametros.cliente c', 'c.id_cliente = rf.id_cliente');
                $this->db->join('seguridad.estatus e', 'e.id_estatus = rf.id_estatus');
                $this->db->where('rf.id_user', $id_user);
                $query = $this->db->get('facturas.registro_fact rf');
                $response = $query->result_array();
                return $response;
            }else {
                $this->db->select('rf.id_registro_fact,
                            	   rf.nro_factura,
                            	   rf.id_cliente,
                            	   c.nom_razon_social,
                            	   rf.fecha_reg,
                            	   rf.id_estatus,
                            	   e.descripcion,
                                   rf.id_user,
	                               u.usuario');
                $this->db->join('parametros.cliente c', 'c.id_cliente = rf.id_cliente');
                $this->db->join('seguridad.estatus e', 'e.id_estatus = rf.id_estatus');
                $this->db->join('seguridad.usuarios u','u.id_user = rf.id_user');
                $query = $this->db->get('facturas.registro_fact rf');
                $response = $query->result_array();
                return $response;
            }

        }

        public function ver_consignacion($id_registro_fact){
            $this->db->select('rf.id_registro_fact,
                                rf.fecha_reg,
                                rf.fecha_update,
                                rf.nro_factura,
                                rf.id_cliente,
								c.id_tip_doc,
                        	   	td.descripcion t_doc,
                                c.cod_rif,
                                c.nom_razon_social,
								c.nro_telefono,
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
			$this->db->join('parametros.tip_doc td', 'td.id_tip_doc = c.id_tip_doc');
            $this->db->join('seguridad.usuarios u', 'u.id_user = rf.id_user');
            $query = $this->db->get('facturas.registro_fact rf');
            $response = $query->row_array();
            return $response;
        }

        public function ver_consignacion_tabla($id_registro_fact){
            $this->db->select('rpf.id_reg_prod_fact,
                        	   rpf.id_registro_fact,
                        	   rpf.id_producto,
                        	   p.nom_producto,
                        	   p.id_categoria,
                        	   c.descripcion,
                        	   rpf.cantidad,
                        	   rpf.precio,
                        	   rpf.sub_total');
            $this->db->join('parametros.producto p', 'p.id_producto = rpf.id_producto');
            $this->db->join('parametros.categoria c', 'c.id_categoria = p.id_categoria');
            $this->db->where('id_registro_fact', $id_registro_fact);
            $query = $this->db->get('facturas.reg_prod_fact rpf');
            $response = $query->result_array();
            return $response;
        }

        // ELIMINAR
        public function eliminar_factura($data){
            $data1 = array('id_estatus' => '3',
                           'fecha_update' => date('Y-m-d h:i:s')
                        );
            $this->db->where('id_registro_fact', $data['id_factura']);
            $update = $this->db->update('facturas.registro_fact', $data1);
            return true;
        }

        // PROCESO DE FACTURA - APROBAR
        public function aprobar_factura($data){
            $data1 = array('id_estatus' => '5',
                            'fecha_update' => date('Y-m-d h:i:s'));
            $this->db->where('id_registro_fact', $data['id_factura']);
            $update = $this->db->update('facturas.registro_fact', $data1);

            $data3 = array('id_estatus' => '5',
                            'fecha_reg' => date('Y-m-d h:i:s'));
            $this->db->where('id_registro_fact', $data['id_factura']);
            $this->db->update('luz.mov_consig', $data3);

            $data2 = array('id_registro_fact' => $data['id_factura'],
                            'id_user'         => $this->session->userdata('id_user'),
                            'id_estatus'      => 5
                        );
            $this->db->insert('luz.apr_canc_fac', $data2);

            return true;
        }

        // ANULAR
        public function anular_factura($data){
            $data1 = array('id_estatus' => '6',
                            'fecha_update' => date('Y-m-d h:i:s'));
            $this->db->where('id_registro_fact', $data['id_factura']);
            $update = $this->db->update('facturas.registro_fact', $data1);

            if ($update){
                $this->db->select('id_producto,
                                   cantidad');
                $this->db->where('id_registro_fact', $data['id_factura']);
                $query_p = $this->db->get('facturas.reg_prod_fact');
                $resultd = $query_p->result_array();

                $cant_proy = $resultd['0'];
                $count_prog = count($cant_proy);

                for ($i=0; $i < $count_prog; $i++){
                    $this->db->select('cantidad_stock');
                    $this->db->where('id_producto', $resultd[$i]['id_producto']);
                    $query = $this->db->get('inventario.inv');
                    $query_cant = $query->row_array();

                    $cantidad_stock = $query_cant['cantidad_stock'];
                    $cantidad_restante = $cantidad_stock + $resultd[$i]['cantidad'];

                    $id_user = $this->session->userdata('id_user');

                    $this->db->set('cantidad_stock', $cantidad_restante);
                    $this->db->set('id_user', $id_user);
                    $this->db->set('fecha_update', $data1['fecha_update']);
                    $this->db->where('id_producto', $resultd[$i]['id_producto']);
                    $this->db->update('inventario.inv');

                    $data3 = array('id_registro_fact'    => $data['id_factura'],
                                   'id_producto'         => $resultd[$i]['id_producto'],
                                   'cantidad_stock'      => $cantidad_stock,
                                   'cantidad_devuelta'   => $resultd[$i]['cantidad'],
                                   'total_restante'      => $cantidad_restante,
                                   'id_user'             => $id_user
                               );
                   $this->db->insert('luz.anul_fact',$data3);
                }
                $data2 = array('id_registro_fact' => $data['id_factura'],
                                'id_user'         => $id_user,
                                'id_estatus'      => 6
                            );
                $this->db->insert('luz.apr_canc_fac', $data2);

            }
            return true;
        }
    }
?>
