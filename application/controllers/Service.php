<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->library('pagination');

		$list = $this->db->select('a.*, b.nama_kendaraan, c.itemservice, d.jenis')
						 ->from('t_service a')
						 ->join('m_kendaraan b', 'a.id_kendaraan = b.id', 'left')
						 ->join('m_itemservice c', 'a.id_itemservice = c.id', 'left')
						 ->join('m_jeniskendaraan d', 'b.jenis_id = d.id', 'left')
						 ->order_by('a.id', 'desc')
						 ->get()
						 ->result();

		$config['base_url'] = base_url('service');
		$config['total_rows'] = count($list);
		$config['per_page'] = 10;

		$this->pagination->initialize($config);	

		$data['pagination'] = $this->pagination->create_links();
		$data['data'] = $list;	

		$this->load->view('layout');
		$this->load->view('service/index', $data);
		$this->load->view('footer');
	}

	public function tambah()
	{
		$data = $this->db->get('m_kendaraan')->result();
		$data_item_service = $this->db->get('m_itemservice')->result();
		$this->load->view('layout');
		$this->load->view('service/tambah', array('kendaraan' => $data, 'item_service' => $data_item_service));
		$this->load->view('footer');
	}

	public function save()
	{
		$this->form_validation->set_rules('id_kendaraan', 'Kendaraan', 'required');		
		$this->form_validation->set_rules('id_itemservice', 'Item Service', 'required');	
		$this->form_validation->set_rules('tanggal', 'Tanggal Service', 'required');	
		$this->form_validation->set_rules('kilometer', 'Kilometer', 'required');	

		if ($this->form_validation->run()) {
			$id_kendaraan = $this->input->post('id_kendaraan');
			$id_itemservice = $this->input->post('id_itemservice');
			$tanggal = $this->input->post('tanggal');
			$kilometer = $this->input->post('kilometer');
			$keterangan = $this->input->post('keterangan');

			$this->db->insert('t_service', array(
				'id_kendaraan' => $id_kendaraan,
				'id_itemservice' => $id_itemservice,
				'tanggal' => $tanggal,
				'kilometer' => $kilometer,
				'keterangan' => $keterangan,
			));

			redirect(base_url('service'));
		} else {	
			$data = $this->db->get('m_kendaraan')->result();
			$data_item_service = $this->db->get('m_itemservice')->result();
			$this->load->view('layout');
			$this->load->view('service/tambah', array('kendaraan' => $data, 'item_service' => $data_item_service));
			$this->load->view('footer');
		}
	}

	public function edit($id)
	{
		$data = $this->db->get('m_kendaraan')->result();
		$data_item_service = $this->db->get('m_itemservice')->result();
		$detail = $this->db->get_where('t_service', array('id' => $id))->row();
		$this->load->view('layout');
		$this->load->view('service/edit', array('kendaraan' => $data, 'item_service' => $data_item_service, 'detail' => $detail));
		$this->load->view('footer');
	}

	public function update($id)
	{
		$this->form_validation->set_rules('id_kendaraan', 'Kendaraan', 'required');		
		$this->form_validation->set_rules('id_itemservice', 'Item Service', 'required');	
		$this->form_validation->set_rules('tanggal', 'Tanggal Service', 'required');	
		$this->form_validation->set_rules('kilometer', 'Kilometer', 'required');	

		if ($this->form_validation->run()) {
			$id_kendaraan = $this->input->post('id_kendaraan');
			$id_itemservice = $this->input->post('id_itemservice');
			$tanggal = $this->input->post('tanggal');
			$kilometer = $this->input->post('kilometer');
			$keterangan = $this->input->post('keterangan');

			$this->db->set(array(
				'id_kendaraan' => $id_kendaraan,
				'id_itemservice' => $id_itemservice,
				'tanggal' => $tanggal,
				'kilometer' => $kilometer,
				'keterangan' => $keterangan,
			))->where('id', $id)->update('t_service');

			redirect(base_url('service'));
		} else {	
			$data = $this->db->get('m_kendaraan')->result();
			$data_item_service = $this->db->get('m_itemservice')->result();
			$detail = $this->db->get_where('t_service', array('id' => $id))->row();
			$this->load->view('layout');
			$this->load->view('service/edit', array('kendaraan' => $data, 'item_service' => $data_item_service));
			$this->load->view('footer');
		}
	}

	public function delete($id)
	{
		$this->db->delete('t_service', array('id' => $id));
		redirect(base_url('service'));
	}
}
