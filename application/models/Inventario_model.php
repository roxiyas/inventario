<?php
    class Inventario_model extends CI_model{
        //INGRESO DE PRODUCTOS
        public function listar_productos(){
            $this->db->select('p.id_producto,
                        	   p.nom_producto,
                        	   p2.descripcion categoria,
                        	   i.cantidad_stock');
            $this->db->join('parametros.categoria p2', 'p2.id_categoria = p.id_categoria', 'left');
            $this->db->join('inventario.inv i', 'i.id_producto = p.id_producto', 'left');
            $query = $this->db->get('parametros.producto p');
            return $query->result_array();
        }

        public function agr_prod_resp($data1){
            $this->db->insert('luz.inv_resp',$data1);
            return true;
        }

        public function agr_prod($data2){
            $this->db->set('cantidad_stock', $data2['cantidad_stock']);
            $this->db->set('id_user', $data2['id_user']);
            $this->db->set('fecha_update', $data2['fecha_update']);
            $this->db->where('id_producto', $data2['id_producto']);
            $this->db->update('inventario.inv');
            return true;
        }

        public function detalle_prod($id_producto){
            $this->db->select('ir.id_producto,
                        	   p.nom_producto,
                               p2.descripcion categoria,
                        	   ir.cantidad_stock,
                        	   ir.cantidad_sumar,
                        	   ir.total_agr,
                        	   ir.fecha_update,
                        	   u.usuario,
                        	   ir.tabla ');
            $this->db->join('parametros.producto p', 'p.id_producto = ir.id_producto');
            $this->db->join('parametros.categoria p2', 'p2.id_categoria = p.id_categoria ');
            $this->db->join('seguridad.usuarios u', 'u.id_user = ir.id_user');
            $this->db->where('ir.id_producto', $id_producto);
            $query = $this->db->get('luz.inv_resp ir');
            return $query->result_array();
        }

        public function detalle_prod_sal($id_producto){
            $this->db->select('mpc.id_reg_fact,
                              rf.nro_factura,
                        	   mpc.id_producto,
                        	   p.nom_producto produc,
                        	   p2.descripcion categoria,
                        	   mpc.cantidad_stock,
                        	   mpc.cantidad_solicitada,
                        	   mpc.total_restante,
                        	   mpc.fecha_reg,
                        	   mpc.id_user,
                        	   u.usuario,
                               rf.id_estatus,
	                           e.descripcion ');
            $this->db->join('facturas.registro_fact rf', 'rf.id_registro_fact = mpc.id_registro_fact ');
            $this->db->join('parametros.producto p', 'p.id_producto = mpc.id_producto');
            $this->db->join('parametros.categoria p2', 'p2.id_categoria = p.id_categoria ');
            $this->db->join('seguridad.usuarios u', 'u.id_user = mpc.id_user');
            $this->db->join('seguridad.estatus e', 'e.id_estatus = rf.id_estatus');
            $this->db->where('mpc.id_producto', $id_producto);
            $query = $this->db->get('luz.mov_prod_cons mpc');
            return $query->result_array();
        }
    }
?>
