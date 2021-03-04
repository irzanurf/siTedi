


        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Edit Data
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Edit Data
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
        <form method='POST' action="<?= base_url('admin/dashboard/editKadepInDb');?>" >
        <div class="form-group">
                                    <input type="hidden" class="form-control" name="nip" value=<?= $v->nip?>  >
                            </div>
        <div class="form-group"><label>NIDN</label><input class="form-control" type="text" name="nip" value="<?= $v->nip ?>" readonly></div>
        <div class="form-group"><label>NIP</label><input class="form-control" type="text" name="nomor_induk" value="<?= $v->nomor_induk ?>" ></div>
        <div class="form-group"><label>Nama</label><input class="form-control" type="text" name="nama" value="<?= $v->nama ?>" ></div>
        <div class="form-group"><label>Departemen / Prodi</label>
        <select class="form-control" name="dep" id="dep" required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($departemen as $dep) {
                                            ?>
                                            <option value="<?php echo $dep->id; ?>"<?php echo ($dep->id==$v->id_departemen) ? "selected='selected'" : "" ?>><?php echo $dep->departemen; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select></div>
        <button type="submit">Submit</button>
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

<!-- Morris Charts JavaScript -->
<script src="<?= base_url('assets/template/js/plugins/morris/raphael.min.js');?>"></script>
<script src="<?= base_url('assets/template/js/plugins/morris/morris.min.js');?>"></script>
<script src="<?= base_url('assets/template/js/plugins/morris/morris-data.js');?>"></script>

