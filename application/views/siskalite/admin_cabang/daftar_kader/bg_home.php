<div class="container">
    <div class="row">
<div class="col-md-8">
    <div class="navbar-text"><i class="fa fa-user"></i> <?php echo $this->session->userdata('nama_user_login'); ?> dari PC IMM <?php echo $this->session->userdata('nama_cabang'); ?> | <a href="<?php echo base_url(); ?>auth/user_login/logout"><i class="fa fa-unlock"></i> Log Out </a></div>
</div>
<div class="col-md-4">
<?php echo form_open("admin_cabang/daftar_kader/set"); ?>
<div id="custom-search-input">
    <div class="input-group">
        <input type="text" name="by_nama" class="form-control" placeholder="Cari Berdasarkan Nama" />
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
    <div class="col-12">
        <?php echo $dt_data_daftar_kader; ?>
    </div>
</div>
</div>

