<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_admin_dpd_model extends CI_Model {


	public function generate_index_kader($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['id_cabang']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['id_cabang'] = $filter['id_cabang'];
				$query_add = "where a.id_cabang like '%".$where['id_cabang']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.nama, a.wan_wati, a.alamat, a.komisariat, a.email, a.no_hape, a.tanggal, a.syahadah, a.facebook, a.email, b.nama_cabang, a.id_kader, a.stts from isa_kader a left join isa_cabang b
		on a.id_cabang=b.id_cabang ".$query_add."");

		$config['base_url'] = base_url() . 'admin_dpd/kader/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama, a.wan_wati, a.alamat, a.komisariat, a.email, a.no_hape, a.tanggal, a.syahadah, a.facebook, a.email, a.id_kader, b.nama_cabang, a.stts from isa_kader a left join isa_cabang b
		on a.id_cabang=b.id_cabang ".$query_add." order by a.stts ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Tanggal Daftar</th>
					<th>Asal Pimpinan Cabang</th>
					<th>Status</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-danger'>Moderasi</span>";
			if($h->stts==1){$st="<span class='label label-success'>Diterima</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td><a href='".base_url()."web/to_pro'>".$h->nama."</a></td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$h->nama_cabang."</td>
					<td>".$st."</td>
					<td>";
					$hasil .= "";
			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."admin_dpd/kader/approve/".$h->id_kader."/0' class='btn btn-default btn-small'><i class='fa fa-times'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."admin_dpd/kader/approve/".$h->id_kader."/1' class='btn btn-default btn-small'><i class='fa fa-check'></i></a>";
			}
			$hasil .= "<a href='".base_url()."admin_dpd/kader/hapus/".$h->id_kader."/".$h->syahadah."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-default btn-small'><i class='fa fa-trash-o'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_cabang($limit,$offset,$filter)
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama_cabang']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama_cabang'] = $filter['nama_cabang'];
				$query_add = "where a.nama_cabang like '%".$where['nama_cabang']."%'";
			}
		}

		$tot_hal = $this->db->like('nama_cabang',$filter['nama_cabang'])->get("isa_cabang");

		$config['base_url'] = base_url() . 'admin_dpd/cabang/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query('select a.nama_cabang, a.id_cabang from isa_cabang a '.$query_add.' LIMIT '.$offset.','.$limit.'');
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th width='50'>No.</th>
					<th>Nama Cabang</th>
					<th width='110'><a href='".base_url()."admin_dpd/cabang/tambah' class='btn btn-default btn-sm'><i class='fa fa-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_cabang."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin_dpd/cabang/edit/".$h->id_cabang."' class='btn btn-sm btn-default'><i class='fa fa-pencil'></i></a>";
			$hasil .= "<a href='".base_url()."admin_dpd/cabang/hapus/".$h->id_cabang."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-sm btn-default'><i class='fa fa-trash-o'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_admin_cabang($limit,$offset,$filter)
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama_admin_cabang']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama_admin_cabang'] = $filter['nama_admin_cabang'];
				$query_add = "where a.nama_admin_cabang like '%".$where['nama_admin_cabang']."%'";
			}
		}

		$tot_hal = $this->db->like('nama_admin_cabang',$filter['nama_admin_cabang'])->get("isa_admin_cabang");

		$config['base_url'] = base_url() . 'admin_dpd/admin_cabang/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query('select b.nama_cabang, a.nama_admin_cabang, a.username, a.email, a.id_admin_cabang from isa_admin_cabang a left join
		isa_cabang b on a.id_cabang=b.id_cabang '.$query_add.' LIMIT '.$offset.','.$limit.'');
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Operator</th>
					<th>Nama Cabang</th>
					<th>Username</th>
					<th>Email</th>
					<th width='110'><a href='".base_url()."admin_dpd/admin_cabang/tambah' class='btn btn-sm btn-default'><i class='fa fa-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_admin_cabang."</td>
					<td>".$h->nama_cabang."</td>
					<td>".$h->username."</td>
					<td>".$h->email."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin_dpd/admin_cabang/edit/".$h->id_admin_cabang."' class='btn btn-sm btn-default'><i class='fa fa-pencil'></i></a>";
			$hasil .= "<a href='".base_url()."admin_dpd/admin_cabang/hapus/".$h->id_admin_cabang."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-sm btn-default'><i class='fa fa-trash-o'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_survei($limit,$offset,$filter)
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['pertanyaan']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['pertanyaan'] = $filter['pertanyaan']; 
				$query_add = "where a.pertanyaan like '%".$where['pertanyaan']."%'";
			}
		}

		$tot_hal = $this->db->like('pertanyaan',$filter['pertanyaan'])->get("isa_pertanyaan_survei");

		$config['base_url'] = base_url() . 'admin_dpd/survei/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like('pertanyaan',$filter['pertanyaan'])->get("isa_pertanyaan_survei",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Pertanyaan</th>
					<th>Status</th>
					<th width='250'><a href='".base_url()."admin_dpd/survei/tambah' class='btn btn-default'><i class='fa fa-plus'></i> Tambah Pertanyaan</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st = "<span class='label label-default'>Tidak Aktif</span>";
			if($h->aktif=="1"){$st="<span class='label label-danger'>Aktif</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->pertanyaan."</td>
					<td>".$st."</td>
					<td>";
			if($h->aktif==1)
			{
				$hasil .= "<a href='".base_url()."admin_dpd/survei/approve/".$h->id_pertanyaan_survei."/0' class='btn btn-default btn-sm'><i class='fa fa-times'> Non Aktifkan</i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."admin_dpd/survei/approve/".$h->id_pertanyaan_survei."/1' class='btn btn-sm btn-default'><i class='fa fa-check'></i> Aktifkan</a>";
			}
			$hasil .= "<a href='".base_url()."admin_dpd/jawaban_survei/index/".$h->id_pertanyaan_survei."' class='btn btn-sm btn-default'><i class='fa fa-list'></i> Jawaban</a>";
			$hasil .= "<a href='".base_url()."admin_dpd/survei/edit/".$h->id_pertanyaan_survei."' class='btn btn-default btn-sm'><i class='fa fa-pencil'></i> Edit</a>";
			$hasil .= "<a href='".base_url()."admin_dpd/survei/hapus/".$h->id_pertanyaan_survei."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-sm btn-default'><i class='fa fa-trash-o'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_jawaban_survei($id_question,$limit,$offset,$filter)
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['jawaban']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['jawaban'] = $filter['jawaban']; 
				$query_add = "where a.jawaban like '%".$where['jawaban']."%'";
			}
		}
		
		$where['id_pertanyaan_survei'] = $id_question;

		$tot_hal = $this->db->like('jawaban',$filter['jawaban'])->get_where("isa_jawaban_survei",$where);

		$config['base_url'] = base_url() . 'admin_dpd/jawaban_survei/index/'.$id_question.'/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like('jawaban',$filter['jawaban'])->get_where("isa_jawaban_survei",$where,$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Jawaban</th>
					<th>Jumlah</th>
					<th width='110'><a href='".base_url()."admin_dpd/jawaban_survei/tambah/".$id_question."' class='btn btn-default btn-sm'><i class='fa fa-plus'></i> Tambah Jawaban</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->jawaban."</td>
					<td>".$h->jum."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin_dpd/jawaban_survei/edit/".$id_question."/".$h->id_jawaban_survei."' class='btn btn-sm btn-default'><i class='fa fa-pencil'></i> Edit</a>";
			$hasil .= "<a href='".base_url()."admin_dpd/jawaban_survei/hapus/".$id_question."/".$h->id_jawaban_survei."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-sm btn-default'><i class='fa fa-trash-o'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_user($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->like('nama_super_admin',$filter['nama_super_admin'])->get("dlmbg_admin_super");

		$config['base_url'] = base_url() . 'superadmin/admin_dinas/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like('nama_super_admin',$filter['nama_super_admin'])->get("dlmbg_admin_super",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Super Admin</th>
					<th>Username Super Admin</th>
					<th width='110'><a href='".base_url()."superadmin/user/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_super_admin."</td>
					<td>".$h->username_super_admin."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/user/edit/".$h->id_admin_super."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/user/hapus/".$h->id_admin_super."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sistem($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_setting");

		$config['base_url'] = base_url() . 'superadmin/sistem/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_setting",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Pengaturan</th>
					<th>Tipe</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->title."</td>
					<td>".$h->tipe."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/sistem/edit/".$h->id_setting."' class='btn'><i class='icon-edit'></i> Edit</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_foto_kader($limit,$offset,$filter)
	{
        $hasil="";
        $query_add = "";
        if(!empty($filter))
        {
            if($filter['nama_cabang']=="")
            {
                $query_add = "";
            }
            else
            {
                $where['nama_cabang'] = $filter['nama_cabang'];
                $query_add = "where a.nama_cabang like '%".$where['nama_cabang']."%'";
            }
        }

        $tot_hal = $this->db->like('nama_cabang',$filter['nama_cabang'])->get("isa_cabang");

        $config['base_url'] = base_url() . 'superadmin/galeri_sekolah/index/';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $this->pagination->initialize($config);

        $w = $this->db->query('select a.nama_cabang, a.id_cabang, (select count(id_foto_kader) as jum from isa_foto_kader where stts=0 and id_cabang=a.id_cabang) jum from isa_cabang a '.$query_add.' order by jum DESC LIMIT '.$offset.','.$limit.'');

        $hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Pimpinan Cabang </th>
					<th>Moderasi</th>
					<th width='110'></th>
					</tr>
					</thead>";
        $i = $offset+1;
        foreach($w->result() as $h)
        {
            $jum="<span class='label label-default'>".$h->jum." foto</span>";
            if($h->jum>0){$jum="<span class='label label-warning'>".$h->jum." foto</span>";}
            $hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_cabang."</td>
					<td>".$jum."</td>
					<td>";
            $hasil .= "<a class='btn btn-default btn-small' href='".base_url()."admin_dpd/foto_kader/detail/".$h->id_cabang."'><i class='fa fa-pencil'></i></a></td>
					</tr>";
            $i++;
        }
        $hasil .= '</table>';
        $hasil .= $this->pagination->create_links();
        return $hasil;
	}
	 
	public function generate_index_semua_foto_kader($id_cabang,$limit,$offset)
	{
		$hasil="";
		$where['id_cabang'] = $id_cabang;
		$tot_hal = $this->db->get_where("isa_foto_kader",$where);

		$config['base_url'] = base_url() . 'admin_dpd/foto_kader/detail/'.$id_cabang.'';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w =  $this->db->order_by("stts","ASC")->get_where("isa_foto_kader",$where,$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Status</th>
					<th>Gambar</th>
					<th width='110'></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-default'>Moderasi</span>";
			if($h->stts==1){$st="<span class='label label-warning'>Diterima</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$st."</td>
					<td><img src='".base_url()."asset/images/foto_kader/thumb/".$h->gambar."' width='50'></td>
					<td>";

			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."admin_dpd/foto_kader/approve/".$id_cabang."/".$h->id_foto_kader."/0' class='btn btn-default btn-small'><i class='fa fa-times'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."admin_dpd/foto_kader/approve/".$id_cabang."/".$h->id_foto_kader."/1' class='btn btn-default btn-small'><i class='fa fa-check'></i></a>";
			}
			$hasil .= "<a href='".base_url()."admin_dpd/foto_kader/hapus/".$id_cabang."/".$h->id_foto_kader."/".$h->gambar."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-default btn-small'><i class='fa fa-trash-o'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	
}

