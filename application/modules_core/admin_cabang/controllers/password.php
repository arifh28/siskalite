<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class password extends MX_Controller {

	public function index()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_cabang")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_cabang/dashboard');
			$this->breadcrumb->append_crumb("Password User", '/');

			
			$d['username'] = $this->session->userdata("username");
			$d['id_param'] = $this->session->userdata("id_admin_cabang");
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);

			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_cabang/password/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
	}
 
	public function simpan()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_cabang")
		{
			$this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required');
			$this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required');
			$this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'trim|required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->index();
			}
			else
			{
				$id['id_admin_cabang'] = $this->input->post("id_param");
				$id['username'] = $this->input->post("username");
				
				$password_lama = $this->input->post("password_lama");
				$password_baru = mysql_real_escape_string($this->input->post("password_baru"));
				$ulangi_password = mysql_real_escape_string($this->input->post("ulangi_password"));
				
				$encrypt = md5(mysql_real_escape_string($password_lama).$this->config->item("key_login"));
				$cek['username'] 	= $id['username'];
				$cek['password'] 	= $encrypt;
				$q_cek_login = $this->db->get_where('isa_admin_cabang', $cek);
				if(count($q_cek_login->result())>0)
				{
					if($password_baru!=$ulangi_password)
					{
						$this->session->set_flashdata("result_login","<h1>Password baru tidak sama</h1>");
						redirect("admin_cabang/password");
					}
					else
					{
						$up['password'] = md5(mysql_real_escape_string($password_baru).$this->config->item("key_login"));
						$this->db->update("isa_admin_cabang",$up,$id);
						$this->session->set_flashdata("result_login","<h1>Password berhasil diperbaharui</h1>");
						redirect("admin_cabang/password");
					}
				}
				else
				{
					$this->session->set_flashdata("result_login","<h1>Password lama tidak cocok</h1>");
					redirect("admin_cabang/password");
				}
			}
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
