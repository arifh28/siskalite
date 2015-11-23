<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_login extends MX_Controller {

   public function index()
   {

      if($this->session->userdata("logged_in")=="")
	  {

	
		  $this->breadcrumb->append_crumb('Beranda', base_url());
		  $this->breadcrumb->append_crumb('User Login', '/');


		  $this->form_validation->set_rules('username', 'Username', 'trim|required');
		  $this->form_validation->set_rules('password', 'Password', 'trim|required');
		  $this->form_validation->set_rules('log_as', 'Log In Sebagai', 'trim|required');
		  
		  if ($this->form_validation->run() == FALSE)
		  {
			  $this->load->view($_SESSION['site_theme'].'/bg_header');

			  $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			  $this->load->view($_SESSION['site_theme'].'/user_login/bg_home');
			  $this->load->view($_SESSION['site_theme'].'/bg_footer');
		  }
		  else
		  {
				$data['username']	=	$this->input->post("username");
				$data['password']	=	$this->input->post("password");
				$data['tipe']		=	$this->input->post("log_as");
				
				$this->app_user_login_model->cekUserLogin($data);
		  }
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
