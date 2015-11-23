<div class="container">
<div class="col-md-5"></div>
    <div class="col-md-3">
    <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">LOGIN</h3></div>
    <div class="panel-body">
        <?php echo validation_errors(); ?>
        <p><?php echo $this->session->flashdata("result_login"); ?></p>
        <?php echo form_open("auth/user_login"); ?>
        <div class="input-group">
            <input type="text" name="username" id="username" placeholder="Masukkan username...." class="form-control" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-user"></i> Username </span>
        </div>

        <div class="input-group">
            <input type="password" name="password" id="password" placeholder="Masukkan password...." class="form-control" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-lock"></i> Password </span>
        </div>

        <select name="log_as" class="form-control" style="margin: 10px 0 5px 0">
            <option value="">-- Pilih --</option>
            <option value="admin_cabang">Pimpinan Cabang</option>
            <option value="admin_dpd">Admin DPD</option>
        </select>
        <div class="btn-group">
            <input type="submit" class="btn btn-default" value="LOG IN" />
            <input type="reset" class="btn btn-default" value="RESET" />
        </div>
    </div>


    <?php echo form_close(); ?>
    </div>

</div>
    <div class="col-md-4"></div>

</div>