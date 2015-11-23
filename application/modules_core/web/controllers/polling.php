<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class polling extends MX_Controller {

   public function index()
   {

      $this->breadcrumb->append_crumb('Beranda', base_url());
	  $this->breadcrumb->append_crumb('Hasil Polling', '/');
      $d['dt_hasil_polling'] = $this->app_global_model->generate_hasil_polling();
       $d['dt_statistik'] = $this->app_global_model->generate_menu_statistik();

      $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
      $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
      $this->load->view($_SESSION['site_theme'].'/polling/bg_home');
      $this->load->view($_SESSION['site_theme'].'/bg_footer');
   }
 
   public function simpan()
   {  
		if (empty($_COOKIE["poling"])) 
		{
			$pilih=$this->input->post('polling');
			$id_soal=$this->input->post('id_soal');
			setcookie("poling", "sudah poling", time() + 3600 * 24);
			$this->db->query("update isa_jawaban_survei set jum=jum+1 where
			id_jawaban_survei='".$pilih."' and id_pertanyaan='".$id_soal."'");
 		}
		redirect("web/polling");
   }
}