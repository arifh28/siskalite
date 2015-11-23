
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Admin Cabang</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("admin_dpd/admin_cabang/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_nama" placeholder="Cari berdasarkan nama" /><input 
				type="submit" class="btn btn-sm btn-default" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>

				<?php echo $data_retrieve; ?>
			</section>