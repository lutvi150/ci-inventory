<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Unit_model');
		must_login();
	}

	public function index()
	{
		$data = [
			"title" => "Kelola Satuan",
		];

		$this->load->view('units/v_index', $data);
	}

	public function ajaxList()
	{
		$list = $this->Unit_model->getDatatables();
		$data = array();
		$no = $_POST['start'];
		$i = 1;
		foreach ($list as $unit) {
			$no++;
			$row = array();
			$row[] = $i++;
			$row[] = $unit->nama_satuan;
			$row[] = $unit->diskripsi_satuan;
			$row[] = date('d F Y', strtotime($unit->created_at));

			$row[] = '<a class="btn btn-icon btn-warning" href="javascript:void(0)" title="Edit" onclick="editUnit(' . "'" . $unit->id_satuan . "'" . ')"><i class="fas fa-pencil-alt"></i></a>
			<a class="btn btn-icon btn-danger" href="javascript:void(0)" title="Delete" onclick="deleteUnit(' . "'" . $unit->id_satuan . "'" . ')"><i class="fas fa-trash"></i></a>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST["draw"],
			"recordsTotal" => $this->Unit_model->countAll(),
			"recordsFiltered" => $this->Unit_model->countFiltered(),
			"data" => $data
		);
		echo json_encode($output);
	}

	public function ajaxEdit($id)
	{
		$data = $this->Unit_model->getById($id);
		echo json_encode($data);
	}

	public function ajaxAdd()
	{
		$this->_validateForm();
		$data = array(
			"nama_satuan" => $this->input->post("nama_satuan"),
			"diskripsi_satuan" => $this->input->post("diskripsi_satuan")
		);
		$this->Unit_model->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajaxUpdate()
	{
		$this->_validateForm();
		$data = array(
			"nama_satuan" => $this->input->post("nama_satuan"),
			"diskripsi_satuan" => $this->input->post("diskripsi_satuan")
		);
		$this->Unit_model->update(array('id_satuan' => $this->input->post('id_satuan')), $data);
		echo json_encode(array('status' => TRUE));
	}

	public function ajaxDelete($id)
	{
		$this->Unit_model->deleteById($id);
		echo json_encode(array('status' => TRUE));
	}

	private function _validateForm()
	{
		$data = array();
		$data['input_error'][] = array();
		$data['error_string'][] = array();
		$data['status'] = TRUE;

		if ($this->input->post("nama_satuan") == '') {
			$data['input_error'][] = 'nama_satuan';
			$data['error_string'][] = 'Nama Satuan harus diisi';
			$data['status'] = FALSE;
		}

		if ($data['status'] == FALSE) {
			echo json_encode($data);
			exit;
		}
	}
}
