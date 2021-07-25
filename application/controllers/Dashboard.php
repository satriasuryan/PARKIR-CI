<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
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

    public function index()
    {
        $karyawan = $this->Dashboard_model->get_all();
        $data = array(
            'karyawan_data' => $karyawan,
        );

        $this->template->load('topnav', 'dashboard', $data);
    }


    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dashboard/create_action'),
            'id' => set_value('id'),
            'nama_civitas' => set_value('nama_civitas'),
            'status_civitas' => set_value('status_civitas'),
            'nip_nim' => set_value('nip_nim'),
            'plat_nomor' => set_value('plat_nomor'),
            'jenis_kendaraan' => set_value('jenis_kendaraan'),
            'merk' => set_value('merk'),
            'foto_stnk' => set_value('foto_stnk'),
            'status_kendaraan' => set_value('status_kendaraan'),
        );
        $this->template->load('topnav', 'karyawan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            // upload area 
            $config['upload_path'] = './uploads/foto_stnk/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;
            $config['file_name'] = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_stnk')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            $pet = $config['upload_path'] . $config['file_name'];

            $data = array(
                'nama_civitas' => $this->input->post('nama_civitas', TRUE),
                'status_civitas' => $this->input->post('status_civitas', TRUE),
                'nip_nim' => $this->input->post('nip_nim', TRUE),
                'plat_nomor' => $this->input->post('plat_nomor', TRUE),
                'jenis_kendaraan' => $this->input->post('jenis_kendaraan', TRUE),
                'merk' => $this->input->post('merk', TRUE),
                'foto_stnk' => $pet ,
                'status_kendaraan' => $this->input->post('status_kendaraan', TRUE)
            );
            $this->Dashboard_model->insert($data);
            $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil menambahkan kendaraan'));
            redirect(site_url('dashboard'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_civitas', 'nama_civitas', 'trim|required');
        $this->form_validation->set_rules('status_civitas', 'status_civitas', 'trim|required');
        $this->form_validation->set_rules('nip_nim', 'nip_nim', 'trim|required');
        $this->form_validation->set_rules('plat_nomor', 'plat_nomor', 'trim|required');
        $this->form_validation->set_rules('jenis_kendaraan', 'jenis_kendaraan', 'trim|required');
        $this->form_validation->set_rules('merk', 'merk', 'trim|required');
        $this->form_validation->set_rules('status_kendaraan', 'status kendaraan', 'trim');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
