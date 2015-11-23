
	<div class="main-container">
		<div class="container-fluid">
			<section>
                <div class="row-fluid">
                <div class="col-md-12">
				<div class="page-header">
					<h1>Daftar Kader</h1>
				</div>
                </div>
                    <div class="col-md-9">
                        <div class="pull-left">
                            <?php echo form_open("admin_dpd/kader/set"); ?>
                            <select name="by_id_cabang">
                                <option value="1">PC IMM Banyumas</option>
                                <option value="2">PC IMM Solo</option>
                                <option value="3">PC IMM Semarang</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i> Filter</button>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="pull-left">
                            <?php echo form_open("admin_dpd/kader/set"); ?>
                            <input type="search" class="span2" id="appendedInputButton" name="by_id_cabang" style="display: none" /><button type="submit" class="btn btn-sm btn-default"><i class="fa fa-list-alt"></i> Tampilkan Semua</button>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="pull-left">
                            <a href="<?php echo base_url();?>web/to_pro" class="btn btn-default btn-sm"><i class="fa fa-file-pdf-o"></i> Cetak Ke PDF</a>
                        </div>
                        <div class="pull-left">
                            <a href="<?php echo base_url();?>web/to_pro" class="btn btn-default btn-sm"><i class="fa fa-file-excel-o"></i> Cetak Ke Ms. Excel</a>
                        </div>
                    </div>
                    <div class="col-md-3"><?php echo $this->breadcrumb->output(); ?></div>
                    <div class="col-md-12">
				<?php echo $data_retrieve; ?>
                    </div>
                </div>
			</section>