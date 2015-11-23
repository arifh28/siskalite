<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_config_model extends CI_Model {

	//query login
	public function __construct()
	{
		$dt = $this->db->get("isa_setting");
		$i = 1;
		foreach($dt->result() as $d)
		{
			$_SESSION['konfig_app_'.$i] = $d->content_setting;
			$i++;
		}
		$_SESSION['site_title'] = $_SESSION['konfig_app_1'];
		$_SESSION['site_footer'] = $_SESSION['konfig_app_2'];
		$_SESSION['site_quotes'] = $_SESSION['konfig_app_3'];
		$_SESSION['site_theme'] = $_SESSION['konfig_app_4'];

		
		$st['stts'] = 0;
		$_SESSION['juml_kader'] = $this->db->get_where("isa_kader",$st)->num_rows();
		$_SESSION['juml_foto_kader'] = $this->db->get_where("isa_foto_kader",$st)->num_rows();
	}
}

/* End of file app_load_config_model.php */
/* Location: ./application/models/app_load_config_model.php */