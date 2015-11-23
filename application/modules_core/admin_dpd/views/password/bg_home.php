
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Ganti Password</h1>
				</div>
				<div class="row-fluid">
                <div class="col-md-12">
				<?php echo $this->breadcrumb->output(); ?>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
				<?php echo $this->session->flashdata("simpan_akun"); ?>
				<?php echo validation_errors(); ?>
				<?php echo form_open("superadmin/password/simpan"); ?>

                <div class="input-group input-normal">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username Admin Cabang" value="<?php echo $username_super_admin; ?>" readonly="true" aria-describedby="basic-addon2">
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
				<input type="hidden" name="username_temp" value="<?php echo $username_super_admin; ?>" />

				<input type="submit" class="btn btn-default" value="SIMPAN" />
				<?php echo form_close(); ?>
                </div>
                <div class="col-md-6"></div>
                </div>
			</section>