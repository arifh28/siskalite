<div class="container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
<?php echo validation_errors(); ?>
	<p><?php echo $this->session->flashdata("result_login"); ?></p>
	<?php echo form_open("admin_cabang/password/simpan"); ?>
    <div class="input-group input-normal">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username Admin Cabang" value="<?php echo $username; ?>" readonly="true" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-user"></i> Username</span>
    </div>

    <div class="input-group input-normal">
        <input type="password" class="form-control showpassword" id="password_lama" name="password_lama" placeholder="Masukkan Password Lama" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-key"></i> Password Lama</span>
    </div>

    <div class="input-group input-normal">
        <input type="password" class="form-control showpassword" id="password_baru" name="password_baru" placeholder="Masukkan Password Baru" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-key"></i> Password Baru</span>
    </div>

    <div class="input-group input-normal">
        <input type="password" class="form-control showpassword" id="ulangi_password" name="ulangi_password" placeholder="Ulangi Password Baru" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-key"></i> Ulangi Password</span>
    </div>

	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />

		<input type="submit" value="UPDATE DATA" />
		<input type="reset" value="HAPUS" />
	<?php echo form_close(); ?>
    </div>
    <div class="col-md-4"></div>
</div>