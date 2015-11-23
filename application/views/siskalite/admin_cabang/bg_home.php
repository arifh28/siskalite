<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="navbar-text"><i class="fa fa-user"></i> <?php echo $this->session->userdata('nama_user_login'); ?> dari PC IMM <?php echo $this->session->userdata('nama_cabang'); ?> | <a href="<?php echo base_url(); ?>auth/user_login/logout"><i class="fa fa-unlock"></i> Log Out </a></div>
        </div>
        <div class="col-md-4">
            <?php echo form_open("operator/artikel_sekolah/set"); ?>
            <div id="custom-search-input">
                <div class="input-group">
                    <input type="text" name="by_nama" class="form-control" placeholder="Cari Nama Kader" />
                    <span  class="input-group-btn">
                        <button type="submit" class="btn btn-info btn-lg" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
	<div class="row">
        <div class="menu-cabang">
	<div class="col-md-2 card">

		<a href="<?php echo base_url(); ?>admin_cabang/foto_kader">
		<i class="fa fa-picture-o fa-5x"></i>
		</a>

        <div class="card_content">
        Foto Kader
        </div>
	</div>
	
	<div class="col-md-2 card">
		<a href="<?php echo base_url(); ?>admin_cabang/daftar_kader">
            <i class="fa fa-user fa-5x"></i>
		</a>
        <div class="card_content">
		Daftar KTA
            </div>
	</div>
	
	<div class="col-md-2 card">
		<a href="<?php echo base_url(); ?>web/to_pro">
            <i class="fa fa-envelope-o fa-5x"></i>
		</a>
        <div class="card_content">
		Pesan ke DPD
            </div>
	</div>
	
	<div class="col-md-2 card">
		<a href="<?php echo base_url(); ?>operator/profil_sekolah">
            <i class="fa fa-cogs fa-5x"></i>
		</a>
        <div class="card_content">
		Profil Cabang
            </div>
	</div>
	
	<div class="col-md-2 card">
		<a href="<?php echo base_url(); ?>admin_cabang/profil">
            <i class="fa fa-cog fa-5x"></i>
		</a>
        <div class="card_content">
		Profil Admin
            </div>
	</div>
	
	<div class="col-md-2">
        <div class="card">
		<a href="<?php echo base_url(); ?>admin_cabang/password">
            <i class="fa fa-key fa-5x"></i>
		</a>
        <div class="card_content">
		Ganti Password
            </div>
        </div>
	</div>
        </div>
  </div>
</div>



