
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Pimpinan Cabang</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/cabang/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_nama" placeholder="Cari berdasarkan nama" /><input 
				type="submit" class="btn btn-default btn-sm" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>

				<?php echo $data_retrieve; ?>
			</section>