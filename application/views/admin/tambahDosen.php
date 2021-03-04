


        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tambah Dosen
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Tambah Dosen
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="form-row profile-row">
    
    <div class="col-lg-6" style="float:none;margin:auto;">
        
        
        <hr>
        <form method='POST' action="<?= base_url('admin/dashboard/addDosenToDb');?>" >
        <div class="form-group"><label>NIDN</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label><input class="form-control" type="text" name="nip" value="" required=""></div>
        <div class="form-group"><label>NIP</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label><input class="form-control" type="text" name="nomor_induk" value="" required=""></div>
        <div class="form-group"><label>Nama</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label><input class="form-control" type="text" name="nama" value="" required=""></div>
        <div class="form-group"><label>Jabatan</label><input class="form-control" type="text" name="jabatan" value="" ></div>
        <div class="form-group"><label>Pendidikan</label><input class="form-control" type="text" name="pendidikan" value=""  ></div>
        <div class="form-group"><label>Status Kepegawaian</label><input class="form-control" type="text" name="status_kepegawaian" value="" ></div>
        <div class="form-group"><label>Departemen / Prodi</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label><select class="form-control" name="program_studi" id="program_studi" required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($departemen as $dep) {
                                            ?>
                                            <option value="<?php echo $dep->departemen; ?>"><?php echo $dep->departemen; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select></div>
        <button type="submit">Submit</button>
                    </form>
        <hr>
        
        
        
        
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

