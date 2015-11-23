<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class web extends MX_Controller {

   public function index()
   {
      $d['dt_polling'] = $this->app_global_model->generate_menu_polling();
      $d['dt_statistik'] = $this->app_global_model->generate_menu_statistik();
      $d['dt_daftar_kader'] = $this->app_global_model->generate_menu_kader_cabang(6,0);

      $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
      $this->load->view($_SESSION['site_theme'].'/bg_home');
      $this->load->view($_SESSION['site_theme'].'/bg_footer');
   }

    public function to_pro()
    {
        $this->load->view($_SESSION['site_theme'].'/to_pro');
    }

}
 
/* End of file web.php */
