<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class foto_kader extends MX_Controller {

	public function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_cabang")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_cabang/dashboard');
			$this->breadcrumb->append_crumb("Foto Kader", '/');

			
			$filter['nama'] = $this->session->userdata("by_nama");
			$d['dt_foto_kader'] = $this->app_global_admin_cabang_model->generate_index_foto_kader(9,$uri,$filter);
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_cabang/foto_kader/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
	}
 
	public function tambah()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_cabang")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_cabang/dashboard');
			$this->breadcrumb->append_crumb("Foto Kader", base_url().'admin_cabang/foto_kader');
			$this->breadcrumb->append_crumb("Tambah Data", '/');
			
			
			$d['nama'] = "";
			$d['gambar'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_cabang/foto_kader/bg_input');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
   }
 
	public function edit($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_cabang")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_cabang/dashboard');
			$this->breadcrumb->append_crumb("Foto Kader", base_url().'admin_cabang/foto_kader');
			$this->breadcrumb->append_crumb("Edit Data", '/');
				
			
			$where['id_foto_kader'] = $id_param;
			$where['id_cabang'] = $this->session->userdata("id_cabang");
			$get = $this->db->get_where("isa_foto_kader",$where)->row();
			
			$d['nama'] = $get->nama;
			$d['gambar'] = $get->gambar;
			
			$d['id_param'] = $get->id_foto_kader;
			$d['tipe'] = "edit";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_cabang/foto_kader/bg_input');
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
			$id['id_foto_kader'] = $this->input->post("id_param");
			$id['id_cabang'] = $this->session->userdata("id_cabang");
			
			if($tipe=="tambah")
			{
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$this->tambah();
				}
				else
				{
					$config['upload_path'] = './asset/images/foto_kader/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= FALSE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./asset/images/foto_kader/".$data['file_name'] ;
						$destination_thumb	= "./asset/images/foto_kader/thumb/" ;
						$destination_medium	= "./asset/images/foto_kader/medium/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 800 ;
						$limit_thumb    = 250 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
	 
						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['gambar'] = $data['file_name'];
						$in_data['nama'] = $this->input->post("nama");
						$in_data['id_admin_cabang'] = $this->session->userdata("id_admin_cabang");
						$in_data['id_cabang'] = $this->session->userdata("id_cabang");
						$in_data['stts'] = "0";
						$this->db->insert("isa_foto_kader",$in_data);
				
						unlink($source);
						
						redirect("admin_cabang/foto_kader");
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			}
			else if($tipe=="edit")
			{
				if(empty($_FILES['userfile']['name']))
				{
					$in_data['nama'] = $this->input->post("nama");
					$in_data['id_admin_cabang'] = $this->session->userdata("id_admin_cabang");
					$in_data['id_cabang'] = $this->session->userdata("id_cabang");
					$this->db->update("isa_foto_kader",$in_data,$id);
					redirect("admin_cabang/foto_kader");
				}
				else
				{
					$config['upload_path'] = './asset/images/foto_kader/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= FALSE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./asset/images/foto_kader/".$data['file_name'] ;
						$destination_thumb	= "./asset/images/foto_kader/thumb/" ;
						$destination_medium	= "./asset/images/foto_kader/medium/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 800 ;
						$limit_thumb    = 250 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
	 
						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['gambar'] = $data['file_name'];
						$in_data['nama'] = $this->input->post("nama");
						$in_data['id_admin_cabang'] = $this->session->userdata("id_admin_cabang");
						$in_data['id_cabang'] = $this->session->userdata("id_cabang");
						$this->db->update("isa_foto_kader",$in_data,$id);
				
						$old_thumb	= "./asset/images/foto_kader/thumb/".$this->input->post("gambar")."" ;
						$old_medium	= "./asset/images/foto_kader/medium/".$this->input->post("gambar")."" ;
						unlink($source);
						unlink($old_thumb);
						unlink($old_medium);
						
						redirect("admin_cabang/foto_kader");
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			}
		}
		else
		{
			redirect("web");
		}
   }
 
	public function set()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_cabang")
		{
			$sess['by_nama'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("admin_cabang/foto_kader");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param,$file)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_cabang")
		{
			$path = "./asset/images/foto_kader/medium/".$file."";
			$path_thumb = "./asset/images/foto_kader/thumb/".$file."";
			unlink($path);
			unlink($path_thumb);
			$where['id_foto_kader'] = $id_param;
			$where['id_cabang'] = $this->session->userdata("id_cabang");
			$this->db->delete("isa_foto_kader",$where);
			redirect("admin_cabang/foto_kader");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
