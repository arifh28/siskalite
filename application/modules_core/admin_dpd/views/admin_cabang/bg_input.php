	<link href="<?php echo base_url(); ?>asset/admin/css/chosen.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/chosen.jquery.js"></script>
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Admin Cabang</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("admin_dpd/admin_cabang/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_nama_cabang" placeholder="Cari berdasarkan nama" /><input
				type="submit" class="btn btn-default btn-sm" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
				
				<?php echo $this->session->flashdata("simpan_akun"); ?>
				<div class="cleaner_h10"></div>
					
				<?php echo form_open("admin_dpd/admin_cabang/simpan"); ?>
				
				<label for="bidang">Pimpinan Cabang</label>
				<div class="cleaner_h5"></div>
				<select id="id_cabang" name="id_cabang" class="chzn-select" data-placeholder="Pilih Pimpinan Cabang" tabindex="2" style="width:90%;" >
				<option value=""></option>
					<?php 
					foreach($nama_cabang->result_array() as $b)
					{
						if($b['id_cabang']==$id_cabang)
						{
					?>
						<option value="<?php echo $b['id_cabang']; ?>" selected="selected"><?php echo $b['nama_cabang']; ?></option>
						<?php
						}
						else
						{
						?>
						<option value="<?php echo $b['id_cabang']; ?>"><?php echo $b['nama_cabang']; ?></option>
						<?php
						}
					}
					?>
				</select>

				
				<label for="nama_operator">Nama Admin Cabang</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nama_admin_cabang" name="nama_admin_cabang" placeholder="Nama Operator"
				value="<?php echo $nama_admin_cabang; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="username_admin_dinas">Username</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="username" name="username" placeholder="Username" 
				value="<?php echo $username; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="password">Password</label>
				<div class="cleaner_h5"></div>
				<input type="password" style="width:90%;" id="password" name="password" placeholder="Password"  />
				<div class="cleaner_h10"></div>
				
				<label for="email">Email</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>"  />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="username_temp" value="<?php echo $username; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-default" value="SIMPAN" />
				<script>
					$(".chzn-select").chosen();
				</script>

				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>