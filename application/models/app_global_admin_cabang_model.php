<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_admin_cabang_model extends CI_Model {

	public function generate_index_foto_kader($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama'] = $filter['nama'];
				$query_add = "and a.nama like '%".$where['nama']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.gambar, a.nama, b.nama_cabang, a.id_foto_kader, a.stts from isa_foto_kader a left join isa_cabang b on a.id_cabang=b.id_cabang where
		a.id_cabang='".$this->session->userdata("id_cabang")."' ".$query_add."");
		
		$config['base_url'] = base_url() . 'admin_cabang/foto_kader/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.gambar, a.nama, b.nama_cabang, a.id_foto_kader, a.stts from isa_foto_kader a left join isa_cabang b on a.id_cabang=b.id_cabang where
		a.id_cabang='".$this->session->userdata("id_cabang")."' ".$query_add."
		 order by a.nama ASC LIMIT ".$offset.",".$limit."");
		
		foreach($w->result() as $h)
		{
			$color = '';
			if($h->stts==0)
			{
				$color = '';
			}
			$hasil .= '<div class="col-md-4"><div class="border-photo-gallery-index" '.$color.'><div class="hide-photo-gallery-index">
			<a href="'.base_url().'asset/images/foto_kader/medium/'.$h->gambar.'" rel="galeri" title="'.$h->nama.'">
			<img src="'.base_url().'asset/images/foto_kader/thumb/'.$h->gambar.'" title="'.$h->nama.'" /></a></div>
<p>'.$h->nama.', PC IMM '.$h->nama_cabang.'</p>
			<a href="'.base_url().'admin_cabang/foto_kader/edit/'.$h->id_foto_kader.'"><i class="fa fa-pencil"></i> Edit</a> |
			<a href="'.base_url().'admin_cabang/foto_kader/hapus/'.$h->id_foto_kader.'/'.$h->gambar.'" onClick=\'return confirm("Anda yakin?");\'><i class="fa fa-times"></i> Hapus</a>
			</div></div>';
		}
        $hasil .= "<div class='col-md-12'>";
        $hasil .= $this->pagination->create_links();
        $hasil .= "</div>";
		return $hasil;
	}

	public function generate_index_daftar_kader($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama'] = $filter['nama'];
				$query_add = "and a.nama like '%".$where['nama']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.nama, a.perti, a.tgl_lahir, a.wan_wati, a.alamat, a.komisariat, a.email, a.no_hape, a.tanggal, a.syahadah, a.facebook, a.email, b.nama_cabang, a.id_kader, a.stts from isa_kader a left join isa_cabang b
		on a.id_cabang=b.id_cabang where a.id_cabang='".$this->session->userdata("id_cabang")."' ".$query_add."");

		$config['base_url'] = base_url() . 'admin_cabang/artikel_sekolah/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama, a.perti, a.tgl_lahir, a.wan_wati, a.alamat, a.komisariat, a.email, a.no_hape, a.tanggal, a.syahadah, a.facebook, a.email, b.nama_cabang, a.id_kader, a.stts from isa_kader a left join isa_cabang b
		on a.id_cabang=b.id_cabang where a.id_cabang='".$this->session->userdata("id_cabang")."' ".$query_add." order by a.nama ASC
		LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-hover'>
					<tr class='info'>
					<td>No.</td>
					<td>Nama</td>
					<td>Gender</td>
					<td>Asal Komisariat</td>
					<td>Perguruan Tinggi</td>
					<td>Asal Cabang</td>
					<td>Tanggal Daftar</td>
					<td>Status</td>
					<td class='info' colspan='2'><a href='".base_url()."admin_cabang/daftar_kader/tambah'><i class='fa fa-plus'></i> Tambah</a></td>
					</tr>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="Menunggu Moderasi";
			$color="#e6e6e6";
			if($h->stts==1){$st="Diterima DPD"; $color="";}
			$hasil .= "<tr bgcolor='".$color."'>
					<td>".$i."</td>
					<td><a href='".base_url()."web/to_pro' title='Lihat Detail Kader'>".$h->nama."</a></td>
					<td>".$h->wan_wati."</td>
					<td>".$h->komisariat."</td>
					<td>".$h->perti."</td>
					<td>".$h->nama_cabang."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$st."</td>
					<td class='danger'><a href='".base_url()."admin_cabang/daftar_kader/edit/".$h->id_kader."'><i class='fa fa-pencil'></i> Edit</a></td>
					<td class='danger'><a href='".base_url()."admin_cabang/daftar_kader/hapus/".$h->id_kader."/".$h->syahadah."'
					onClick=\"return confirm('Anda yakin?');\"><i class='fa fa-times'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
}