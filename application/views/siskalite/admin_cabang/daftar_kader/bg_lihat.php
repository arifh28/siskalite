<div class="container">
    <div class="col-md-12 lihat">
        <div class="row panel">
            <div class="col-md-4 bg_blur ">

            </div>
            <div class="col-md-8 col-xs-12">
                <img src="<?php echo base_url();?>asset/images/kader/thumb/<?php echo $syahadah; ?>" class="img-thumbnail picture hidden-xs" />
                <img src="<?php echo base_url();?>asset/images/kader/thumb/<?php echo $syahadah; ?>" class="img-thumbnail visible-xs picture_mob" />
                <div class="header">
                    <h1><?php echo $wan_wati; ?> <?php echo $nama; ?></h1>
                    <div class="col-md-6">
                        <p> <i class="fa fa-map-marker"></i> <?php echo $alamat; ?></p>
                        <p><i class="fa fa-users"></i> <?php echo $komisariat; ?></p>
                        <p><i class="fa fa-calendar"></i> <?php echo $tgl_lahir; ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><i class="fa fa-clock-o"></i> <?php echo generate_tanggal(gmdate('d/m/Y-H:i:s',$tanggal)); ?></p>
                        <p><i class="fa fa-mobile-phone"></i> <?php echo $no_hape; ?></p>
                        <p><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo $email; ?>?subject=Terdaftar%20Database%20Kader%20IMM%20Jateng&body=Alamat%20email%20ini%20terdaftar%20dalam%20Sistem%20Informasi%20kader%20IMM%20Jateng%20dengan%20nama%20<?php echo $wan_wati; ?>%20<?php echo $nama; ?>!"><?php echo $email; ?></a></p>
                        <p><i class="fa fa-facebook-square"></i> <a href="https://www.facebook.com/search/results/?init=quick&q=<?php echo $facebook; ?>"><?php echo $facebook; ?></a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
