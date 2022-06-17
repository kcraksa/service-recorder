<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterkendaraan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->library('pagination');

		$list = $this->db->select('a.id, a.nama_kendaraan, a.jenis_id, b.jenis')
						 ->from('m_kendaraan a')
						 ->join('m_jeniskendaraan b', 'a.jenis_id = b.id', 'left')
						 ->order_by('a.id', 'desc')
						 ->get()
						 ->result();

		$config['base_url'] = base_url('masterkendaraan');
		$config['total_rows'] = count($list);
		$config['per_page'] = 10;

		$this->pagination->initialize($config);	

		$data['pagination'] = $this->pagination->create_links();
		$data['data'] = $list;	

		$this->load->view('layout');
		$this->load->view('master_kendaraan/index', $data);
		$this->load->view('footer');
	}

	public function tambah()
	{
		$data = $this->db->get('m_jeniskendaraan')->result();
		$this->load->view('layout');
		$this->load->view('master_kendaraan/tambah', array('data_jenis_kendaraan' => $data));
		$this->load->view('footer');
	}

	public function save()
	{
		$this->form_validation->set_rules('jenis_id', 'Jenis Kendaraan', 'required');		
		$this->form_validation->set_rules('nama', 'Nama Kendaraan', 'required');	

		if ($this->form_validation->run()) {
			$jenis_id = $this->input->post('jenis_id');
			$nama = $this->input->post('nama');

			$this->db->insert('m_kendaraan', array(
				'jenis_id' => $jenis_id,
				'nama_kendaraan' => $nama
			));

			redirect(base_url('masterkendaraan'));
		} else {	
			$data = $this->db->get('m_jeniskendaraan')->result();
			$this->load->view('layout');
			$this->load->view('master_kendaraan/tambah', array('data_jenis_kendaraan' => $data));
			$this->load->view('footer');
		}
	}

	public function edit($id)
	{
		$detail = $this->db->get_where('m_kendaraan', array('id' => $id))->row();
		$data = $this->db->get('m_jeniskendaraan')->result();
		$this->load->view('layout');
		$this->load->view('master_kendaraan/edit', array('data_jenis_kendaraan' => $data, 'detail' => $detail));
		$this->load->view('footer');
	}

	public function update($id)
	{
		$this->form_validation->set_rules('jenis_id', 'Jenis Kendaraan', 'required');		
		$this->form_validation->set_rules('nama', 'Nama Kendaraan', 'required');	

		if ($this->form_validation->run()) {
			$jenis_id = $this->input->post('jenis_id');
			$nama = $this->input->post('nama');

			$this->db->set(array(
				'jenis_id' => $jenis_id,
				'nama_kendaraan' => $nama
			))->where('id', $id)->update('m_kendaraan');

			redirect(base_url('masterkendaraan'));
		} else {	
			$data = $this->db->get('m_jeniskendaraan')->result();
			$this->load->view('layout');
			$this->load->view('master_kendaraan', array('data_jenis_kendaraan' => $data));
			$this->load->view('footer');
		}
	}

	public function delete($id)
	{
		$this->db->delete('m_kendaraan', array('id' => $id));
		redirect(base_url('masterkendaraan'));
	}
}
