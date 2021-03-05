


        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-6" style="float:none;margin:auto;">
            <h1 class="page-header">
            Edit Akun
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Edit Akun
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="form-row profile-row">
    
    <div class="col-lg-6" style="float:none;margin:auto;">
        
    <?php 
        foreach($view as $v) { ?>
        <hr>
        <form method='POST' action="<?= base_url('admin/dashboard/gantiPass');?>" >
        <div class="form-group">
                                    <input type="hidden" class="form-control" name="nip" value=<?= $v->nip?>  >
                            </div>
        <div class="form-group"><label>NIDN</label><input class="form-control" type="text" name="nip" value="<?= $v->nip ?>" readonly></div>
        <div class="form-group"><label>NIP</label><input class="form-control" type="text" name="nomor_induk" value="<?= $v->nomor_induk ?>" readonly></div>
        <div class="form-group"><label>Nama</label><input class="form-control" type="text" name="nama" value="<?= $v->nama ?>" readonly></div>
        <div class="form-group"><label>Departemen / Prodi</label><input class="form-control" type="text" name="program_studi" value="<?= $v->program_studi ?>" readonly></div>

            <h3>Ganti Password</h3>
        <div class="form-group"><label>Password Baru</label><input class="form-control" type="password" name="pass" id="txtPassword"  ></div>
        <div class="form-group"><label>Ulangi Password</label><input class="form-control" type="password" name="re" id="txtConfirmPassword"  ></div>
        <button id="btnSubmit" type="submit" onclick="return Validate()">Submit</button>
                    </form>
        <hr>
        <?php }?>
        
        
        
        
    </div>
</div>

   
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
<!-- Morris Charts JavaScript -->
<script src="<?= base_url('assets/template/js/plugins/morris/raphael.min.js');?>"></script>
<script src="<?= base_url('assets/template/js/plugins/morris/morris.min.js');?>"></script>
<script src="<?= base_url('assets/template/js/plugins/morris/morris-data.js');?>"></script>


