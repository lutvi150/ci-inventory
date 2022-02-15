<?php

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			'Customer_model',
			'User_model',
			'Proyek_model'
		]);
	}

	public function index()
	{

		$data = [
			"title" => "Home",
			"proyek" => $this->Proyek_model->getAllProyekDepan(),
			"user" => $this->User_model->getAllUsersDepan(),
		];

		$this->load->view("auth/home", $data);
	}
	public function profil()
	{
		$data["title"] = "Profil";

		$this->load->view("auth/profil", $data);
	}



	public function login()
	{
		$data["title"] = "Login";

		$this->form_validation->set_rules('user_email', 'E-mail', 'required|trim|valid_email');
		$this->form_validation->set_rules('user_password', 'Password', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			// $this->load->view("auth/v_login", $data);
			$this->load->view("auth/v_login", $data);
		} else {
			$this->_loginAction();
		}
	}

	private function _loginAction()
	{
		$email = $this->input->post("user_email");
		$password = $this->input->post("user_password");

		// cek apakah dengan email yang di input ada
		$userData = $this->db->get_where("users", ["email_user" => $email])->row_array();
		if ($userData) {
			// cek apakah password yang dimasukkan benar
			if (password_verify($password, $userData["password_user"])) {
				$data = [
					"user_name" => $userData["nama_user"],
					"user_email" => $userData["email_user"],
					"user_phone" => $userData["no_user"],
					"user_address" => $userData["alamat_user"],
					"user_avatar" => $userData["foto_user"],
					"user_role" => $userData["hak_akses"],
					"created_at" => $userData["created_at"],

				];

				$this->session->set_userdata($data);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Password kamu salah</div>');
				redirect("auth");
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">E-mail kamu salah</div>');
			redirect("auth");
		}
	}

	public function logout()
	{
		$this->session->unset_userdata("id_user");
		$this->session->unset_userdata("user_name");
		$this->session->unset_userdata("user_email");
		$this->session->unset_userdata('user_phone');
		$this->session->unset_userdata('user_address');
		$this->session->unset_userdata('user_avatar');
		$this->session->unset_userdata('user_role');
		$this->session->set_flashdata('message', '<div class="alert alert-success">Kamu berhasil logout</div>');
		redirect("auth");
	}

	public function block()
	{
		echo 'Kamu tidak memiliki hak akses';
	}
}
