<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class foto_kader extends MX_Controller {
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dpd/dashboard');
			$this->breadcrumb->append_crumb("Foto Kader", '/');

			
			$filter['nama_cabang'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_admin_dpd_model->generate_index_foto_kader(5,$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('foto_kader/bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function detail($id_param,$uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$where['id_cabang'] = $id_param;
			$get = $this->db->get_where("isa_cabang",$where)->row();

			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dpd');
			$this->breadcrumb->append_crumb("Foto Kader", base_url().'admin_dpd/foto_kader');
			$this->breadcrumb->append_crumb("PC IMM $get->nama_cabang" , '/');

			
			$d['data_retrieve'] = $this->app_global_admin_dpd_model->generate_index_semua_foto_kader($id_param,$this->config->item("limit_item"),$uri);
			
			$this->load->view('bg_header',$d);
			$this->load->view('foto_kader/bg_detail');
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
			$sess['by_nama'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("admin_dpd/foto_kader");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function approve($id_cabang,$id_param,$value)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$id['id_foto_kader'] = $id_param;
			$up['stts'] = $value;
			$this->db->update("isa_foto_kader",$up,$id);
			redirect("admin_dpd/foto_kader/detail/".$id_cabang."");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_sekolah,$id_param,$file)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$path = "./asset/images/galeri-sekolah/medium/".$file."";
			$path_thumb = "./asset/images/galeri-sekolah/thumb/".$file."";
			unlink($path);
			unlink($path_thumb);

			$where['id_sekolah_foto_kader'] = $id_param;
			$this->db->delete("dlmbg_sekolah_foto_kader",$where);
			redirect("admin_dpd/foto_kader/detail/".$id_sekolah."");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file admin_dpd.php */
