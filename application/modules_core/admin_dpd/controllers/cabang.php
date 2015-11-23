<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cabang extends MX_Controller {

   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dpd/dashboard');
			$this->breadcrumb->append_crumb("Pimpinan Cabang", '/');
						
			$filter['nama_cabang'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_admin_dpd_model->generate_index_cabang($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('cabang/bg_home');
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
			$this->breadcrumb->append_crumb("Pimpinan Cabang", base_url().'admin_dpd/cabang');
			$this->breadcrumb->append_crumb("Tambah Cabang", '/');

			$d['nama_cabang'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('cabang/bg_input');
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
			$this->breadcrumb->append_crumb("Pimpinan Cabang", base_url().'admin_dpd/cabang');
			$this->breadcrumb->append_crumb("Update Pimpinan Cabang", '/');


			$where['id_cabang'] = $id_param;
			$get = $this->db->get_where("isa_cabang",$where)->row();

			$d['nama_cabang'] = $get->nama_cabang;
			
			$d['id_param'] = $get->id_cabang;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('cabang/bg_input');
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
			$id['id_cabang'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama_cabang'] = $this->input->post("nama_cabang");
				
				$this->db->insert("isa_cabang",$in);
			}
			else if($tipe=="edit")
			{
				$in['nama_cabang'] = $this->input->post("nama_cabang");
				
				$this->db->update("isa_cabang",$in,$id);
			}
			
			redirect("admin_dpd/cabang");
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
			$sess['by_nama'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("admin_dpd/cabang");
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
			$where['id_cabang'] = $id_param;
			$this->db->delete("isa_cabang",$where);
			redirect("admin_dpd/cabang");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file admin_dpd.php */
