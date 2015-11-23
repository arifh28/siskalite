
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Tambah Pimpinan Cabang</h1>
				</div>
                <div class="row-fluid">
				<div class="col-md-6">
				<div class="input-append">
				<?php echo form_open("admin_dpd/cabang/set"); ?>
				<input type="search" id="appendedInputButton" name="by_nama" placeholder="Cari berdasarkan nama" /><input
				type="submit" class="btn btn-sm btn-default" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
                </div>
                <div class="col-md-6">
				<?php echo $this->breadcrumb->output(); ?>
                    </div>
					<div class="col-md-6">
				<?php echo form_open("admin_dpd/cabang/simpan"); ?>
				
				<label for="n">Nama Pimpinan Cabang</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nama_cabang" name="nama_cabang" placeholder="Nama Pimpinan Cabang" value="<?php echo $nama_cabang; ?>" />

				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-sm btn-default" value="SIMPAN" />
				<?php echo form_close(); ?>
                    </div>
				<div class="col-md-6"></div>
                </div>
			</section>