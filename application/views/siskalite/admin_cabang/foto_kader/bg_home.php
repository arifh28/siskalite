
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-default" href="<?php echo base_url(); ?>admin_cabang/foto_kader/tambah"><i class="fa fa-plus"></i> Tambah Foto Kader</a>
        </div>
    <div class="col-md-6">
	<?php echo form_open("admin_cabang/foto_kader/set"); ?>
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
<div class="col-md-12">
	<?php echo $dt_foto_kader; ?>
</div>
    </div>
</div>