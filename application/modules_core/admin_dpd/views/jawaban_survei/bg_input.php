
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Pertanyaan Polling</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/jawaban_survei/set"); ?>
				<input type="hidden" name="id_pertanyaan" value="<?php echo $id_pertanyaan_survei; ?>" />
				<input type="search" class="span2" id="appendedInputButton" name="by_jawaban" placeholder="Cari berdasarkan pertanyaan" /><input 
				type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
					
				<?php echo form_open("admin_dpd/jawaban_survei/simpan"); ?>
				
				<label for="jawaban">Jawaban</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="jawaban" name="jawaban" placeholder="Jawaban" value="<?php echo $jawaban; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="jumlah">Jumlah</label>

				<input type="search" style="width:90%;" id="jumlah" name="jum" placeholder="Jumlah" value="<?php echo $jum; ?>" />
				<input type="hidden" name="id_pertanyaan_survei" value="<?php echo $id_pertanyaan_survei; ?>" />

				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />

				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>

					
			</section>