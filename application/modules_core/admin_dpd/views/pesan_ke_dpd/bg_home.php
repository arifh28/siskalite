
	<div class="main-container">
		<div class="container-fluid">
			<section>
                <div class="row-fluid">
                <div class="col-md-12">
				<div class="page-header">
					<h1>Daftar Kader</h1>
				</div>
                </div>
                    <div class="col-md-6">
                        <div class="pull-left">
                            <?php echo form_open("superadmin/kader/set"); ?>
                            <select name="by_id_sekolah_profil">
                                <option value="1">PC IMM Banyumas</option>
                                <option value="2">PC IMM Solo</option>
                                <option value="3">PC IMM Semarang</option>
                            </select>
                            <input type="submit" class="btn btn-sm btn-default" type="button" value="Filter">
                            <?php echo form_close(); ?>
                        </div>
                        <div class="pull-left">
                            <?php echo form_open("superadmin/kader/set"); ?>
                            <input type="search" class="span2" id="appendedInputButton" name="by_id_sekolah_profil" style="display: none" /><input type="submit" class="btn btn-sm btn-default" type="button" value="Tampilkan Semua">
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <div class="col-md-6"><?php echo $this->breadcrumb->output(); ?></div>
                    <div class="col-md-12">
				<?php echo $data_retrieve; ?>
                    </div>
                </div>
			</section>