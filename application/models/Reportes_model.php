<?php
    class Reportes_model extends CI_model{
        function consultar_dia($data){
            $this->db->select("mc.id_tipo_pago,
                                tp.descripcion tipo_pago,
                                sum(to_number(mc.total_abonado_bs, '999999999999D99')) as total_abonado_bs,
                                sum(to_number(mc.restante_bs, '999999999999D99')) restante_bs,
                                mc.fecha_reg");
            $this->db->join('parametros.tip_pago tp', 'tp.id_tip_pago = mc.id_tipo_pago');
            $this->db->where('mc.fecha_reg', $data['fecha_c']);
            $this->db->group_by('mc.id_tipo_pago, tp.descripcion, mc.fecha_reg');
            $query = $this->db->get('luz.mov_consig mc');
            return $query->result_array();
        }

        public function list_precios(){
            $this->db->select('nom_producto, precio');
            $query = $this->db->get('parametros.producto p');
            return $query->result_array();
        }
    }
?>