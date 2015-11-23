<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class survei extends MX_Controller {

   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dpd/dashboard');
			$this->breadcrumb->append_crumb("Survei", '/');

			
			$filter['pertanyaan'] = $this->session->userdata("by_pertanyaan");
			$d['data_retrieve'] = $this->app_global_admin_dpd_model->generate_index_survei(5,$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('survei/bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dpd/dashboard');
			$this->breadcrumb->append_crumb("Survei", base_url().'admin_dpd/survei');
			$this->breadcrumb->append_crumb("Tambah Pertanyaan Survei", '/');

			
			$d['pertanyaan'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('survei/bg_input');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dpd/dashboard');
			$this->breadcrumb->append_crumb("Survei", base_url().'admin_dpd/survei');
			$this->breadcrumb->append_crumb("Edit Pertanyaan Survei", '/');

			
			$where['id_pertanyaan_survei'] = $id_param;
			$get = $this->db->get_where("isa_pertanyaan_survei",$where)->row();
			
			$d['pertanyaan'] = $get->pertanyaan;
			
			$d['id_param'] = $get->id_pertanyaan_survei;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('survei/bg_input');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$tipe = $this->input->post("tipe");
			$id['id_pertanyaan_survei'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['pertanyaan'] = $this->input->post("pertanyaan");
				$in['aktif'] = 0;
				
				$this->db->insert("isa_pertanyaan_survei",$in);
			}
			else if($tipe=="edit")
			{
				$in['pertanyaan'] = $this->input->post("pertanyaan");
				
				$this->db->update("isa_pertanyaan_survei",$in,$id);
			}
			
			redirect("admin_dpd/survei");
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
	public function set()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$sess['by_pertanyaan'] = $this->input->post("by_pertanyaan");
			$this->session->set_userdata($sess);
			redirect("admin_dpd/survei");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$where['id_pertanyaan_survei'] = $id_param;
			$this->db->delete("isa_pertanyaan_survei",$where);
			$where2['id_pertanyaan'] = $id_param;
			$this->db->delete("isa_jawaban_survei",$where2);
			redirect("admin_dpd/survei");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function approve($id_param,$value)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$id['id_pertanyaan_survei'] = $id_param;
			$up['aktif'] = $value;
			$this->db->update("isa_pertanyaan_survei",$up,$id);
			redirect("admin_dpd/survei");
		}
		else
		{
			redirect("web");
		}
   }
}