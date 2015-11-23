<div class="container">
    <div class="col-md-6">
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart("admin_cabang/foto_kader/simpan"); ?>
    <div class="input-group input-normal">
        <input type="text" class="form-control" id="nama_kader" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-user"></i> Nama</span>
    </div>

        <div class="input-group input-normal">
        <input type="file" name="userfile" id="userfile"/>
            <label><i class="fa fa-upload"></i> Foto Kader. <br/>Tipe file PNG, JPEG, JPG & max 3MB, 3.000 x 3.000 pixel.</label>
        </div>
	
	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
	<input type="hidden" name="gambar" value="<?php echo $gambar; ?>" />
	<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />

	<input type="submit" value="SIMPAN" />
	<?php echo form_close(); ?>
    </div>
    <div class="col-md-6">
        <img src="<?php echo base_url();?>/asset/images/foto_kader/thumb/<?php echo $gambar; ?>">
    </div>
    
</div>