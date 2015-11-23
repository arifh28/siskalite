<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends MX_Controller {

   public function index()
   {
	if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_cabang")
	  {

	
		  $this->breadcrumb->append_crumb('Beranda', base_url());
		  $this->breadcrumb->append_crumb('Dashboard', '/');
		  
		  $this->load->view($_SESSION['site_theme'].'/bg_header');
		  $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
		  $this->load->view($_SESSION['site_theme'].'/admin_cabang/bg_home');
		  $this->load->view($_SESSION['site_theme'].'/bg_footer');
		  
		}
		else
		{
			redirect("web");
		}
   }
   
   function logout()
   {
   		$this->session->sess_destroy();
		redirect("web");
   }
}
 
/* End of file web.php */
