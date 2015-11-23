<div class="container">
    <div class="col-md-5">
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart("admin_cabang/daftar_kader/simpan"); ?>
        <fieldset>
        <div class="input-group input-normal">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-user"></i> Nama</span>
        </div>

        <div class="input-group input-normal">
            <input type="text" class="form-control" id="komisariat" name="komisariat" placeholder="Komisariat" value="<?php echo $komisariat; ?>" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-users"></i> Komisariat</span>
        </div>

        <div class="input-group input-normal">
            <input type="text" class="form-control" id="perti" name="perti" placeholder="Perguruan Tinggi" value="<?php echo $perti; ?>" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-building"></i> Asal PT</span>
        </div>

        <div class="checkbox">
        <?php $immawan='checked="checked"'; $immawati='checked="checked"';
        if($wan_wati=="Immawan"){ $immawan='checked="checked"'; $immawati=''; }
        else if($wan_wati=="Immawati"){ $immawan=''; $immawati='checked="checked"'; }
        ?>
            <input type="radio" name="wan_wati" value="Immawan" id="Immawan" <?php echo $immawan; ?> checked /><label>Immawan</label>
            <input type="radio" name="wan_wati" value="Immawati" id="Immawati" <?php echo $immawati; ?> /><label>Immawati</label>
        </div>

        <div class="input-group input-normal">
            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $tgl_lahir; ?>" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-calendar"></i> Tgl. Lahir</span>
        </div>
        <textarea id="alamat" name="alamat" placeholder="alamat" cols="15"><?php echo $alamat; ?></textarea>
    </div>
    <div class="col-md-4">

        <div class="input-group input-normal">
            <input type="text" class="form-control" id="no_hape" name="no_hape" placeholder="Nomor Handphone" value="<?php echo $no_hape; ?>" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-mobile-phone"></i> No. Hape</span>
        </div>

        <div class="input-group input-normal">
            <input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email" value="<?php echo $email; ?>" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-envelope"></i> Email</span>
        </div>

        <div class="input-group input-normal">
            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Nama Facebook" value="<?php echo $facebook; ?>" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-facebook-square"></i> Facebook</span>
        </div>

        <div class="input-group input-normal">
            <input type="file" name="syahadah" id="syahadah" />
            <label><i class="fa fa-upload"></i> Syahadah. <br/>Tipe file PNG, JPEG, JPG & max 3MB, 3.000 x 3.000 pixel.</label>
        </div>

	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
	<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />

	<input type="submit" value="SIMPAN" />
        </fieldset>
	<?php echo form_close(); ?>
    </div>
    <div class="col-md-3">
        <img src="<?php echo base_url();?>asset/images/kader/thumb/<?php echo $syahadah; ?>" class="img-responsive" width="150px">
    </div>
</div>