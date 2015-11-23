<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profil_cabang extends MX_Controller {


	public function index()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_cabang")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_cabang/dashboard');
			$this->breadcrumb->append_crumb("Profil Pimpinan Cabang", '/');
			
			$id['id_cabang'] = $this->session->userdata("id_cabang");
			$get = $this->db->get_where("isa_cabang",$id)->row();
			$d['id_param'] = $get->id_cabang;
			$d['nama_cabang'] = $get->nama_cabang;
			$d['sekretariat'] = $get->sekretariat;
            $d['ketua'] = $get->ketua;
			$d['email'] = $get->email;
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_cabang/profil_cabang/bg_home');
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

			$this->form_validation->set_rules('nama_cabang', 'Nama Cabang', 'trim|required');
			$this->form_validation->set_rules('ketua', 'Nama Ketua Cabang', 'trim|required');

			
			if ($this->form_validation->run() == FALSE)
			{
				$this->index();
			}
			else
			{
				$id['id_cabang'] = $this->input->post("id_param");
				
				$up['nama_cabang'] = $this->input->post("nama_cabang");
				$up['sekretariat'] = $this->input->post("sekretariat");
				$up['ketua'] = $this->input->post("ketua");
				$up['email'] = $this->input->post("email");
				
				$this->db->update("isa_cabang",$up,$id);
				$this->session->set_flashdata("result_login","Data berhasil diperbaharui");
				redirect("admin_cabang/dashboard");
				
			}
		}
		else
		{
			redirect("web");
		}
   }
}

