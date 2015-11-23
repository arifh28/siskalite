
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Profil User</h1>
				</div>
                <div class="row-fluid">
                    <div class="col-md-12">
                        <?php echo $this->breadcrumb->output(); ?>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
				<?php echo $this->session->flashdata("simpan_akun"); ?>
				<?php echo form_open("superadmin/profil/simpan"); ?>
                        <div class="input-group input-normal">
                            <input type="text" class="form-control" id="nama_super_admin" name="nama_super_admin" placeholder="Nama Super Admin" value="<?php echo $nama_super_admin; ?>" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-user"></i> Nama</span>
                        </div>

                        <div class="input-group input-normal">
                            <input type="text" class="form-control" id="username_super_admin" name="username_super_admin" placeholder="Username Super Admin"
                                   value="<?php echo $username_super_admin; ?>" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-user"></i> Username</span>
                        </div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="username_temp" value="<?php echo $username_super_admin; ?>" />

				<input type="submit" class="btn btn-default" value="SIMPAN" />
				<?php echo form_close(); ?>

					
			</section>