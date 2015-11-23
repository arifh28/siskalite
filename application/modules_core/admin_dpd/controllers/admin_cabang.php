<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_cabang extends MX_Controller {

   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dpd")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dpd/dashboard');
			$this->breadcrumb->append_crumb("Admin Cabang", '/');			

			
			$filter['nama_admin_cabang'] = $this->session->userdata("nama_admin_cabang");
			$d['data_retrieve'] = $this->app_global_admin_dpd_model->generate_index_admin_cabang($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('admin_cabang/bg_home');
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
			$this->breadcrumb->append_crumb("Admin Cabang", base_url().'admin_dpd/admin_cabang');
			$this->breadcrumb->append_crumb("Input Admin Cabang", '/');

			$d['nama_cabang'] = $this->db->get("isa_cabang");
			
			$d['id_sekolah'] = "";
			$d['nama_admin_cabang'] = "";
			$d['username'] = "";
			$d['password'] = "";
			$d['email'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('admin_cabang/bg_input');
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
			$this->breadcrumb->append_crumb("Admin Cabang", base_url().'admin_dpd/admin_cabang');
			$this->breadcrumb->append_crumb("Update Admin Cabang", '/');

			$where['id_admin_cabang'] = $id_param;
			$get = $this->db->get_where("isa_admin_cabang",$where)->row();
			
			$d['nama_cabang'] = $this->db->get("isa_cabang");
			
			$d['id_cabang'] = $get->id_cabang;
			$d['nama_admin_cabang'] = $get->nama_admin_cabang;
			$d['username'] = $get->username;
			$d['password'] = $get->password;
			$d['email'] = $get->email;
			
			$d['id_param'] = $get->id_admin_cabang;
			$d['tipe'] = "edit";

            $this->load->view('bg_header',$d);
            $this->load->view('admin_cabang/bg_input');
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
			$id['id_admin_cabang'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$cek = $this->db->get_where("isa_admin_cabang",array("username"=>$this->input->post("username")))->num_rows();
				if($cek>0)
				{
					$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya");
					redirect("admin_dpd/admin_cabang/tambah");
				}
				else
				{
					$in['nama_admin_cabang'] = $this->input->post("nama_admin_cabang");
					$in['username'] = $this->input->post("username");
					$in['password'] = md5($this->input->post("password").$this->config->item("key_login"));
					$in['id_cabang'] = $this->input->post("id_cabang");
					$in['email'] = $this->input->post("email");
					
					$this->db->insert("isa_admin_cabang",$in);
					redirect("admin_dpd/admin_cabang");
				}
			}
			else if($tipe=="edit")
			{	
				if($_POST['password']!="")
				{
					$cek = $this->db->get_where("dlmbg_admin_sekolah",array("username"=>$this->input->post("username")))->num_rows();
					if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username"))
					{
						$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya atau tetap gunakan username ini");
						redirect("admin_dpd/admin_cabang/edit/".$id['id_admin_sekolah']."");
					}
					else
					{
						$in['nama_admin_cabang'] = $this->input->post("nama_admin_cabang");
						$in['username'] = $this->input->post("username");
						$in['password'] = md5($this->input->post("password").$this->config->item("key_login"));
						$in['id_sekolah'] = $this->input->post("id_sekolah");
						$in['email'] = $this->input->post("email");
					
						$this->db->update("dlmbg_admin_sekolah",$in,$id);
						redirect("admin_dpd/admin_cabang");
					}
				}
				else
				{
					$cek = $this->db->get_where("isa_admin_cabang",array("username"=>$this->input->post("username")))->num_rows();
					if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username"))
					{
						$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya atau tetap gunakan username ini");
						redirect("admin_dpd/admin_cabang/edit/".$id['id_admin_sekolah']."");
					}
					else
					{
						$in['nama_admin_cabang'] = $this->input->post("nama_admin_cabang");
						$in['username'] = $this->input->post("username");
						$in['id_cabang'] = $this->input->post("id_cabang");
						$in['email'] = $this->input->post("email");
					
						$this->db->update("isa_admin_cabang",$in,$id);
						redirect("admin_dpd/admin_cabang");
					}
				}
			}
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
			$sess['nama_admin_cabang'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("admin_dpd/admin_cabang");
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
			$where['id_admin_cabang'] = $id_param;
			$this->db->delete("isa_admin_cabang",$where);
			redirect("admin_dpd/admin_cabang");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file admin_dpd.php */
