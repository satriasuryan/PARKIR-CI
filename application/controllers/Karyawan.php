<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation', 'ion_auth');
        $this->load->helper('url');
        $this->user = $this->ion_auth->user()->row();
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
        $user = $this->user;
        $karyawan = $this->Karyawan_model->get_all();
        $data = array(
            'karyawan_data' => $karyawan,
            'user' => $user, 'users'     => $this->ion_auth->user()->row(),

        );

        $this->template->load('template', 'karyawan_list', $data);
    }

    public function update($id)
    {
        $user = $this->user;
        $row = $this->Karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('karyawan/update_action'),
                'id' => set_value('id', $row->id),
                'nama_civitas' => set_value('nama_civitas', $row->nama_civitas),
                'status_civitas' => set_value('status_civitas', $row->status_civitas),
                'nip_nim' => set_value('nip_nim', $row->nip_nim),
                'plat_nomor' => set_value('plat_nomor', $row->plat_nomor),
                'jenis_kendaraan' => set_value('jenis_kendaraan', $row->jenis_kendaraan),
                'merk' => set_value('merk', $row->merk),
                'foto_stnk' => set_value('foto_stnk', $row->foto_stnk),
                'status_kendaraan' => set_value('status_kendaraan', $row->status_kendaraan),
                'user' => $user,
                'users'     => $this->ion_auth->user()->row(),
            );
            $this->template->load('template', 'karyawan_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function update_action()
    {
        $this->form_validation->set_rules('nama_civitas', 'nama_civitas', 'trim|required');
        $this->form_validation->set_rules('status_civitas', 'status_civitas', 'trim|required');
        $this->form_validation->set_rules('nip_nim', 'nip_nim', 'trim|required');
        $this->form_validation->set_rules('plat_nomor', 'plat_nomor', 'trim|required');
        $this->form_validation->set_rules('jenis_kendaraan', 'jenis_kendaraan', 'trim|required');
        $this->form_validation->set_rules('merk', 'merk', 'trim|required');
        $this->form_validation->set_rules('foto_stnk', 'foto_stnk', 'trim');
        $this->form_validation->set_rules('status_kendaraan', 'status kendaraan', 'trim');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama_civitas' => $this->input->post('nama_civitas', TRUE),
                'status_civitas' => $this->input->post('status_civitas', TRUE),
                'nip_nim' => $this->input->post('nip_nim', TRUE),
                'plat_nomor' => $this->input->post('plat_nomor', TRUE),
                'jenis_kendaraan' => $this->input->post('jenis_kendaraan', TRUE),
                'merk' => $this->input->post('merk', TRUE),
                'foto_stnk' => $this->input->post('foto_stnk', TRUE),
                'status_kendaraan' => $this->input->post('status_kendaraan', TRUE),
            );

            $this->Karyawan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil merubah data kendaraan'));
            redirect(site_url('karyawan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $this->Karyawan_model->delete($id);
            $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil menghapus data kendaraan'));
            redirect(site_url('karyawan'));
        } else {
            $this->session->set_flashdata('messageAlert', $this->messageAlert('danger', 'data tidak ditemukan'));
            redirect(site_url('karyawan'));
        }
    }
}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-18 03:21:05 */
/* http://harviacode.com */
