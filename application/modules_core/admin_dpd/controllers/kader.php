<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kader extends MX_Controller {

   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
            $this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dpd/dashboard');
            $this->breadcrumb->append_crumb("Kader", '/');


			$filter['id_cabang'] = $this->session->userdata("by_id_cabang");
			$d['data_retrieve'] = $this->app_global_admin_dpd_model->generate_index_kader($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('kader/bg_home');
			$this->load->view('bg_footer');
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
			$sess['by_id_cabang'] = $this->input->post("by_id_cabang");
			$this->session->set_userdata($sess);
			redirect("admin_dpd/kader");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param,$file)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$path = "./asset/images/kader/thumb/".$file."";
			unlink($path);
			$where['id_kader'] = $id_param;
			$this->db->delete("isa_kader",$where);
			redirect("admin_dpd/kader");
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
			$id['id_kader'] = $id_param;
			$up['stts'] = $value;
			$this->db->update("isa_kader",$up,$id);
			redirect("admin_dpd/kader");
		}
		else
		{
			redirect("web");
		}
   }
}
