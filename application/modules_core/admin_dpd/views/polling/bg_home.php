
		<div class="container-fluid">
<div class="row-fluid">
				<div class="page-header">
					<h1>Pertanyaan Survei</h1>
				</div>
				<div class="col-md-6">

				<?php echo form_open("superadmin/polling/set"); ?>
				<input type="search" class="input-append" id="appendedInputButton" name="by_pertanyaan" placeholder="Cari berdasarkan pertanyaan" /><input
				type="submit" class="btn btn-sm btn-default" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>

        <div class="col-md-6">
				<?php echo $this->breadcrumb->output(); ?>
        </div>
        <div class="col-md-12">
				<?php echo $data_retrieve; ?>
        </div>
</div>
        </div>