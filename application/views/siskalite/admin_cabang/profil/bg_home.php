<div class="container">
<div class="col-md-6">
	<?php echo form_open("admin_cabang/profil/simpan"); ?>

    <div class="input-group input-normal">
        <input type="text" class="form-control" id="nama_cabang" name="nama_cabang" placeholder="Nama Pimpinan Cabang" value="<?php echo $nama_cabang; ?>" readonly="true" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-home"></i> Nama Cabang</span>
    </div>

    <div class="input-group input-normal">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>" readonly="true" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-user"></i> Username</span>
    </div>
</div>
    <div class="col-md-6">
    <div class="input-group input-normal">
        <input type="text" class="form-control" id="nama_admin_cabang" name="nama_admin_cabang" placeholder="Nama Admin Pimpinan Cabang" value="<?php echo $nama_admin_cabang; ?>" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-user"></i> Nama Admin</span>
    </div>

    <div class="input-group input-normal">
        <input type="text" class="form-control" id="email" name="email" placeholder="Email Admin Cabang" value="<?php echo $email; ?>" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-envelope-o"></i> Email Admin</span>
    </div>

	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />

	<input type="submit" value="SIMPAN" />
	<?php echo form_close(); ?>
    </div>
    </div>

