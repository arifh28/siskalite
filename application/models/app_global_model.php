<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_model extends CI_Model {


	public function generate_menu_polling()
	{
		$hasil = "<div class='panel panel-imm'>";
        $hasil .= "<div class='panel-heading'><h3 class='panel-title'>Survei</h3></div> ";
		$hasil .= form_open('web/polling/simpan');
		$where['aktif'] = 1;
		$w = $this->db->get_where("isa_pertanyaan_survei",$where);
		foreach($w->result() as $h)
		{
            $hasil .= "<input type='hidden' name='id_soal' value='".$h->id_pertanyaan_survei."'>";
			$hasil .= "<div class='panel-body'><strong>".$h->pertanyaan."</strong><br/>";
		}
		$where_jawaban['id_pertanyaan_survei'] = $h->id_pertanyaan_survei;
		$jawaban_polling = $this->db->get_where("isa_jawaban_survei",$where_jawaban);
		foreach($jawaban_polling->result() as $jawaban)
		{
			$hasil .= "<input type='radio' name='polling' value='".$jawaban->id_jawaban_survei."' class='radio-class'> ".$jawaban->jawaban."<br>";
		}
		$hasil .= '<input type="submit" value="PILIH" />
<a class="btn btn-default" href="'.base_url().'web/polling">Hasil Survei <i class="fa fa-chevron-right"></i></a><br/>';
		$hasil .= "</div></div>";
		$hasil .= form_close();
		return $hasil;
	}
	 
	public function generate_menu_statistik()
	{
        $hasil = "<div class='panel panel-imm'>";
		$hasil .= "<div class='panel-body'><p>Immawan/Immawati menggunakan ".$this->agent->browser()." versi ".$this->agent->version()." di ".$this->agent->platform()." dengan resolusi <span id='lebar'></span> x <span id='tinggi'></span> pixel.</p>";
		$hasil .= "<p>Browser yang disarankan Mozilla Firefox versi 3 keatas dengan resolusi layar 1024 x 600 pixel menggunakan Ubuntu Linux.</p>";
		$hasil .= "<p>Dikunjungi sebanyak : ".$this->db->get("isa_counter_pengunjung")->num_rows()." pengunjung.</p></div></div>";
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$d_in['ip_address'] = $_SERVER['REMOTE_ADDR'];
			$d_in['tanggal'] = gmdate("d-M-Y H:i:s",time()+3600*9);
			$this->db->insert("isa_counter_pengunjung",$d_in);
		}
		return $hasil;
	}
	 
	public function generate_menu_kader_cabang($limit,$offset)
	{
		$hasil="";
		$where['stts'] = 1;
        $w = $this->db->query("select a.nama, a.wan_wati, a.tanggal, a.syahadah, a.id_cabang, b.nama_cabang, a.stts from isa_kader a left join isa_cabang b
		on a.id_cabang=b.id_cabang order by a.nama ASC
		LIMIT ".$offset.",".$limit."");
		foreach($w->result() as $h)
		{
			$hasil .= "<div class='col-md-4'><div class='card radius shadowDepth1'><div class='card__image border-tlr-radius'><img src='".base_url()."asset/images/kader/thumb/".$h->syahadah."' alt='image' class='border-tlr-radius img-responsive'></div><div class='card__content card__padding'><div class='card__share'><a id='share' class='share-toggle share-icon' href='#'></a></div>
<div class='card__meta'><time>".generate_tanggal(gmdate('d/m/Y',$h->tanggal))."</time></div><article class='card__article'><h3>".$h->nama."</h3><p>PC IMM.$h->nama_cabang.</p></article>
</div><div class='card__action'></div></div></div>";
		}
		return $hasil;
	}

    public function generate_hasil_polling()
    {
        $hasil="";
        $where['aktif'] = 1;
        $w = $this->db->get_where("isa_pertanyaan_survei",$where);
        foreach($w->result() as $h)
        {
            $hasil .= "<div class='row'><div class='col-md-12'><strong>".$h->pertanyaan."</strong></div>";
        }
        $hasil .= "<br>";
        $where_jawaban['id_pertanyaan_survei'] = $h->id_pertanyaan_survei;
        $jawaban_polling = $this->db->get_where("isa_jawaban_survei",$where_jawaban);

        $jum = $this->db->query("select SUM(jum) as jum from
		isa_jawaban_survei where id_pertanyaan_survei='".$where_jawaban['id_pertanyaan_survei']."'")->row();

        $hasil .= '<div class="col-md-12">';
        foreach($jawaban_polling->result() as $jawaban)
        {
            $pr = 0;
            if($jawaban->jum!=0)
            {
                $pr = sprintf("%2.1f",(($jawaban->jum/$jum->jum)*100));
            }
            $gbr = $pr * 1.5;
            $hasil .= "<p>".$jawaban->jawaban."</p>
<div class='progress'>
  <div class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='".$pr."' aria-valuemin='0' aria-valuemax='100' style='width: ".$pr."%'>
    ".$pr."% <span class='sr-only'>".$pr."%</span>
  </div>
</div>
";
        }
        $hasil .= '</div>';
        $hasil .= "<div class='col-md-12'>Hasil berdasarkan dari ".$jum->jum." orang responden.</div></div>";
        return $hasil;
    }
	
}

/* End of file app_global_model.php */