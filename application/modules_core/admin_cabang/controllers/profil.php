<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profil extends MX_Controller {
 
	public function index()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_cabang")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_cabang/dashboard');
			$this->breadcrumb->append_crumb("Profil User", '/');			
			
			
			$d['nama_cabang'] = $this->session->userdata("nama_cabang");
			$d['nama_admin_cabang'] = $this->session->userdata("nama_user_login");
			$d['username'] = $this->session->userdata("username");
			$d['email'] = $this->session->userdata("email");
			$d['id_param'] = $this->session->userdata("id_admin_cabang");
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_cabang/profil/bg_home');
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
			$tipe = $this->input->post("tipe");
			$id['id_admin_cabang'] = $this->input->post("id_param");
			$id['username'] = $this->input->post("username");
			
			$in['nama_admin_cabang'] = $this->input->post("nama_admin_cabang");
			$in['email'] = $this->input->post("email");
			
			$sess['nama_user_login'] = $in['nama_admin_cabang'];
			$sess['email'] = $in['email'];
			$this->session->set_userdata($sess);
			
			$this->db->update("dlmbg_admin_cabang",$in,$id);
			
			redirect("admin_cabang/dashboard");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
