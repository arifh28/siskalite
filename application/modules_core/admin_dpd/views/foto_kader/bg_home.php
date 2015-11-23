
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Foto Kader</h1>
				</div>
				<div class="col-md-3">
				<div class="form-group">
				<?php echo form_open("superadmin/galeri_sekolah/set"); ?>
				<input type="search" id="appendedInputButton" name="by_nama" placeholder="Cari berdasarkan Cabang" />
                    <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i> Cari</button>
				<?php echo form_close(); ?>
				</div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-6"><?php echo $this->breadcrumb->output(); ?></div>
				<div class="col-lg-12">
				<?php echo $data_retrieve; ?>
                </div>
			</section>
            </div>