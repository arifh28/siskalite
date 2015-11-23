<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jawaban_survei extends MX_Controller {
 
   public function index($id_question,$uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dpd/dashboard');
			$this->breadcrumb->append_crumb("Survei", base_url().'admin_dpd/survei');
			$this->breadcrumb->append_crumb("Jawaban Survei", base_url().'admin_dpd/jawaban_survei/index/'.$id_question.'');

			$d['id_pertanyaan_survei'] = $id_question;
			
			$filter['jawaban'] = $this->session->userdata("by_jawaban");
			
			$d['data_retrieve'] = $this->app_global_admin_dpd_model->generate_index_jawaban_survei($id_question,$this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('jawaban_survei/bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function tambah($id_question)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dpd/dashboard');
			$this->breadcrumb->append_crumb("Survei", base_url().'admin_dpd/survei');
			$this->breadcrumb->append_crumb("Jawaban Survei", base_url().'admin_dpd/jawaban_survei/index/'.$id_question.'');
			$this->breadcrumb->append_crumb("Input Jawaban Survei", '/');
			

			$d['jawaban'] = "";
			$d['jum'] = "";
			$d['id_pertanyaan_survei'] = $id_question;
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('jawaban_survei/bg_input');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function edit($id_question,$id_param)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dpd/dashboard');
			$this->breadcrumb->append_crumb("Survei", base_url().'admin_dpd/survei');
			$this->breadcrumb->append_crumb("Jawaban Survei", base_url().'admin_dpd/jawaban_survei/index/'.$id_question.'');
			$this->breadcrumb->append_crumb("Update Jawaban Survei", '/');
			
			$where['id_jawaban_survei'] = $id_param;
			$get = $this->db->get_where("isa_jawaban_survei",$where)->row();
			
			$d['id_pertanyaan_survei'] = $get->id_pertanyaan_survei;
			$d['jawaban'] = $get->jawaban;
			$d['jum'] = $get->jum;
			
			$d['id_param'] = $get->id_jawaban_survei;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('jawaban_survei/bg_input');
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
			$id['id_jawaban_survei'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['id_pertanyaan_survei'] = $this->input->post("id_pertanyaan_survei");
				$in['jawaban'] = $this->input->post("jawaban");
				$in['jum'] = $this->input->post("jum");
				
				$this->db->insert("isa_jawaban_survei",$in);
			}
			else if($tipe=="edit")
			{
				$in['id_pertanyaan_survei'] = $this->input->post("id_pertanyaan_survei");
				$in['jawaban'] = $this->input->post("jawaban");
				$in['jum'] = $this->input->post("jum");
				
				$this->db->update("isa_jawaban_survei",$in,$id);
			}
			
			redirect("admin_dpd/jawaban_survei/index/".$this->input->post("id_pertanyaan_survei")."");
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
			$sess['by_jawaban'] = $this->input->post("by_jawaban");
			$this->session->set_userdata($sess);
			redirect("admin_dpd/jawaban_survei/index/".$this->input->post("id_pertanyaan_survei")."");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_question,$id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$where['id_jawaban_survei'] = $id_param;
			$this->db->delete("isa_jawaban_survei",$where);
			redirect("admin_dpd/jawaban_survei/index/".$id_question."");
		}
		else
		{
			redirect("web");
		}
   }
}

