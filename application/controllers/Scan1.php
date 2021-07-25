<?php

class Scan1 extends Ci_Controller

{
	function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		$this->load->library('form_validation');
		$this->user = $this->ion_auth->user()->row();
		$this->load->model('Scan_model');
	}

	public function messageAlert($type, $title)
	{
		$messageAlert = "
			const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 5000
			});

			Toast.fire({
					type: '" . $type . "',
					title: '" . $title . "'
			});
			";
		return $messageAlert;
	}

	function index()
	{
		$user = $this->user;
		$data = array('user' => $user, 'users' 	=> $this->ion_auth->user()->row(),);
		$this->template->load('template_sc', 'scan_v1', $data);
	}

	function cek_id()
	{
		$user = $this->user;
		$result_code = $this->input->post('plat_nomor');
		$jam_klr = date('Y-m-d h:i:s');
		$jam_msk = date('Y-m-d h:i:s');
		$cek_id = $this->Scan_model->cek_id($result_code);
		$cek_abs_klr = $this->Scan_model->kar_abs_klr($result_code);
		if (!$cek_id) {
			$url = base_url() . 'scan1';
			$this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'Parkir gagal'));
			header("refresh:1;url=$url");
		} else if ($cek_abs_klr && $jam_msk != '00:00:00') {
			$this->Scan_model->kar_abs_klr($result_code);
			$url = base_url() . 'scan1';
			$this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Parkir pulang'));
			header("refresh:1;url=$url");
		} else if ($cek_id) {
			$this->Scan_model->kar_abs_msk($result_code);
			$url = base_url() . 'scan1';
			$this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Parkir masuk'));
			header("refresh:1;url=$url");
		}
	}
}
