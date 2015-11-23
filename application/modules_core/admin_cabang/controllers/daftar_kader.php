<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class daftar_kader extends MX_Controller {
 
	public function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_cabang")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_cabang/dashboard');
			$this->breadcrumb->append_crumb("Kader", '/');

			
			$filter['nama'] = $this->session->userdata("by_nama");
			$d['dt_data_daftar_kader'] = $this->app_global_admin_cabang_model->generate_index_daftar_kader(10,$uri,$filter);
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);

			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_cabang/daftar_kader/bg_home');
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
			$this->breadcrumb->append_crumb("Kader", base_url().'admin_cabang/daftar_kader');
			$this->breadcrumb->append_crumb("Tambah Data", '/');

            $d['nama'] = "";
			$d['wan_wati'] = "";
            $d['tgl_lahir'] = "";
            $d['alamat'] = "";
            $d['perti'] = "";
            $d['no_hape'] = "";
            $d['facebook'] = "";
            $d['email'] = "";
            $d['komisariat'] = "";
            $d['syahadah'] = "";

			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_cabang/daftar_kader/bg_input');
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
			$this->breadcrumb->append_crumb("Kader", base_url().'admin_cabang/daftar_kader');
			$this->breadcrumb->append_crumb("Edit Data", '/');
			

			
			$where['id_kader'] = $id_param;
			$where['id_cabang'] = $this->session->userdata("id_cabang");
			$get = $this->db->get_where("isa_kader",$where)->row();
			
			$d['nama'] = $get->nama;
			$d['wan_wati'] = $get->wan_wati;
			$d['alamat'] = $get->alamat;
            $d['no_hape'] = $get->no_hape;
            $d['komisariat'] = $get->komisariat;
            $d['facebook'] = $get->facebook;
            $d['perti'] = $get->perti;
            $d['email'] = $get->email;
            $d['tgl_lahir'] = $get->tgl_lahir;

            $d['syahadah'] = $get->syahadah;
			$d['id_param'] = $get->id_kader;
			$d['tipe'] = "edit";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_cabang/daftar_kader/bg_input');
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
			$id['id_kader'] = $this->input->post("id_param");
			$id['id_cabang'] = $this->session->userdata("id_cabang");
			
			if($tipe=="tambah")
			{
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('komisariat', 'Komisariat', 'trim|required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$this->tambah();
				}
				else
				{
					$config['upload_path'] = './asset/images/kader/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= FALSE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("syahadah")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./asset/images/kader/".$data['file_name'] ;
                        $destination_thumb	= "./asset/images/kader/thumb/" ;
                        $destination_medium	= "./asset/images/kader/medium/" ;

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
						
						$in_data['syahadah'] = $data['file_name'];
						$in_data['nama'] = $this->input->post("nama");
						$in_data['wan_wati'] = $this->input->post("wan_wati");
                        $in_data['alamat'] = $this->input->post("alamat");
                        $in_data['perti'] = $this->input->post("perti");
                        $in_data['komisariat'] = $this->input->post("komisariat");
                        $in_data['no_hape'] = $this->input->post("no_hape");
                        $in_data['tgl_lahir'] = $this->input->post("tgl_lahir");
                        $in_data['email'] = $this->input->post("email");
                        $in_data['nama'] = $this->input->post("nama");
                        $in_data['facebook'] = $this->input->post("facebook");
						$in_data['id_admin_cabang'] = $this->session->userdata("id_admin_cabang");
						$in_data['id_cabang'] = $this->session->userdata("id_cabang");
						$in_data['tanggal'] = time()+3600*7;;
						$in_data['stts'] = "0";
						$this->db->insert("isa_kader",$in_data);

				
						unlink($source);
						
						redirect("admin_cabang/daftar_kader");
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			}
			else if($tipe=="edit")
			{
				if(empty($_FILES['syahadah']['name']))
				{
                    $in_data['nama'] = $this->input->post("nama");
                    $in_data['wan_wati'] = $this->input->post("wan_wati");
                    $in_data['alamat'] = $this->input->post("alamat");
                    $in_data['no_hape'] = $this->input->post("no_hape");
                    $in_data['tgl_lahir'] = $this->input->post("tgl_lahir");
                    $in_data['komisariat'] = $this->input->post("komisariat");
                    $in_data['perti'] = $this->input->post("perti");
                    $in_data['email'] = $this->input->post("email");
                    $in_data['nama'] = $this->input->post("nama");
                    $in_data['facebook'] = $this->input->post("facebook");
					$in_data['id_admin_cabang'] = $this->session->userdata("id_admin_cabang");
					$in_data['id_cabang'] = $this->session->userdata("id_cabang");
					$this->db->update("isa_kader",$in_data,$id);
					redirect("admin_cabang/daftar_kader");
				}
				else
				{
					$config['upload_path'] = './asset/images/kader/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= FALSE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("syahadah")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./asset/images/kader/".$data['file_name'] ;
						$destination_thumb	= "./asset/images/kader/thumb/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_thumb    = 640 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
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
						
						$in_data['syahadah'] = $data['file_name'];
                        $in_data['nama'] = $this->input->post("nama");
                        $in_data['wan_wati'] = $this->input->post("wan_wati");
                        $in_data['alamat'] = $this->input->post("alamat");
                        $in_data['no_hape'] = $this->input->post("no_hape");
                        $in_data['perti'] = $this->input->post("perti");
                        $in_data['tgl_lahir'] = $this->input->post("tgl_lahir");
                        $in_data['email'] = $this->input->post("email");
                        $in_data['nama'] = $this->input->post("nama");
                        $in_data['facebook'] = $this->input->post("facebook");
						$this->db->update("isa_kader",$in_data,$id);
				
						$old_thumb	= "./asset/images/kader/thumb/".$this->input->post("gambar")."" ;
						unlink($source);
						unlink($old_thumb);
						
						redirect("admin_cabang/daftar_kader");
						
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
			redirect("admin_cabang/daftar_kader");
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
			$path = "./asset/images/kader/medium/".$file."";
			unlink($path);
			$where['id_kader'] = $id_param;
			$where['id_cabang'] = $this->session->userdata("id_cabang");
			$this->db->delete("isa_kader",$where);
			redirect("admin_cabang/daftar_kader");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
