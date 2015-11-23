<div class="container">
	<div class="col-md-6">
    <?php echo validation_errors(); ?>
	<?php echo $this->session->flashdata("result_login"); ?>

	<?php echo form_open("admin_cabang/profil_cabang/simpan"); ?>

    <div class="input-group input-normal">
        <input type="text" class="form-control" id="nama_cabang" name="nama_cabang" placeholder="Nama Pimpinan Cabang" value="<?php echo $nama_cabang; ?>" aria-describedby="basic-addon2" readonly>
        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-home"></i> Nama Cabang</span>
    </div>

    <div class="input-group input-normal">
        <input type="text" class="form-control" id="ketua" name="ketua" placeholder="Nama Ketua Cabang" value="<?php echo $ketua; ?>" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-user"></i> Nama Ketua</span>
    </div>

    <div class="input-group input-normal">
        <input type="text" class="form-control" id="email" name="email" placeholder="Email Pimpinan Cabang" value="<?php echo $email; ?>" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-envelope-o"></i> Alamat Email</span>
    </div>
    </div>
    <div class="col-md-6">
    <div class="input-group input-normal">
        <textarea class="form-control" id="sekretariat" name="sekretariat" placeholder="Sekretariat Pimpinan Cabang <?php echo $nama_cabang; ?>"><?php echo $sekretariat;?></textarea>
    </div>

	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />

	<input type="submit" value="SIMPAN" />
	<?php echo form_close(); ?>
    </div>
</div>