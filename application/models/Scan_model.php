<?php

  class Scan_model extends Ci_Model{

    function cek_id($plat_nomor){
        $query_str = "SELECT * FROM kendaraan WHERE plat_nomor= ? ";
        $result = $this->db->query($query_str, array($plat_nomor));
          if ($result->num_rows()==1){
              return $result->row(0)->plat_nomor;
            }
            else{
              return false;
            }
    }

    function kar_abs_msk($plat_nomor){
        $query_str = "SELECT * FROM kendaraan WHERE plat_nomor= ?";
        $result = $this->db->query($query_str,array($plat_nomor));
          if ($result->num_rows()==1) {
            $jam_msk=date('Y-m-d H:i:s');
            $id_status = 1;
            $data=array(
              'plat_nomor' =>$plat_nomor,
              'jam_msk' => $jam_msk,
              'id_status' => $id_status
            );
            $this->db->insert('histori',$data);
            return $result->row(0)->plat_nomor;
          } else {
            return false;
      }
  }

      function kar_abs_klr($plat_nomor){
        $query_str = "SELECT * FROM histori WHERE plat_nomor= ?";
        $result = $this->db->query($query_str,array($plat_nomor));
          if ($result->num_rows()==1) {
          $jam_klr=date('Y-m-d H:i:s');
          $id_status = 2;
          $data=array(
            'plat_nomor' =>$plat_nomor,
            'jam_klr' => $jam_klr,
            'id_status' => $id_status,
          );
          $this->db->where('plat_nomor',$plat_nomor);
          $this->db->update('histori',$data);
          return $result->row(0)->plat_nomor;
            }
          else{
            return false;
          }
      }
  }





 ?>
