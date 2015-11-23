<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_user_login_model extends CI_Model {

	public function cekUserLogin($data)
	{
		$tipe 				= $data['tipe'];
		
		if($tipe=="admin_cabang")
		{
			$cek['username'] 	= mysql_real_escape_string($data['username']);
			$cek['password'] 	= md5(mysql_real_escape_string($data['password']).$this->config->item("key_login"));
			$q_cek_login = $this->db->get_where('isa_admin_cabang', $cek);
			if(count($q_cek_login->result())>0)
			{
				foreach($q_cek_login->result() as $qad)
				{
					$sess_data['logged_in'] = 'yesGetMeLoginBaby';
					$sess_data['nama_user_login'] = $qad->nama_admin_cabang;
					$sess_data['id_cabang'] = $qad->id_cabang;
					$sess_data['username'] = $qad->username;
					$sess_data['email'] = $qad->email;
					$sess_data['id_admin_cabang'] = $qad->id_admin_cabang;
					$sess_data['tipe_user'] = $tipe;
					$get_p_cabang = $this->db->get_where("isa_cabang",array("id_cabang"=>$qad->id_cabang))->row();
					$sess_data['nama_cabang'] = $get_p_cabang->nama_cabang;
					$this->session->set_userdata($sess_data);
				}
				redirect("admin_cabang/dashboard");
			}
			else
			{
				$this->session->set_flashdata("result_login","Gagal Login. Username dan Password Tidak Cocok....");
				redirect("auth/user_login");
			}
		}

		else if($tipe=="admin_dpd")
		{
			$cek['username_admin_dpd'] 	= mysql_real_escape_string($data['username']);
			$cek['password'] 	= md5(mysql_real_escape_string($data['password']).$this->config->item("key_login"));
			$q_cek_login = $this->db->get_where('isa_admin_dpd', $cek);
			if(count($q_cek_login->result())>0)
			{
				foreach($q_cek_login->result() as $qad)
				{
					$sess_data['logged_in'] = 'yesGetMeLoginBaby';
					$sess_data['nama_user_login'] = $qad->nama_admin_dpd;
					$sess_data['username'] = $qad->username_admin;
					$sess_data['id_admin_dpd'] = $qad->id_admin_dpd;
					$sess_data['tipe_user'] = $tipe;
					
					$this->session->set_userdata($sess_data);
				}
				redirect("admin_dpd/dashboard");
			}
			else
			{
				$this->session->set_flashdata("result_login","Gagal Login. Username dan Password Tidak Cocok....");
				redirect("auth/user_login");
			}
		}
	}
}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */