<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Genbar_Model extends CI_model {

	public function getShow($plat_nomor)
	{
		$this->db->where('plat_nomor',$plat_nomor);
		$hasil=$this->db->get('karyawan');
		return $hasil;

	}


	public function getshow_query($plat_nomor)

	{
  	return $this->db->where('plat_nomor',$plat_nomor)->get('karyawan');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
