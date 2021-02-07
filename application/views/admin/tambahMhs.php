


        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tambah Mahasiswa
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Tambah Mahasiswa
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="form-row profile-row">
    
    <div class="col-lg-12">
        
        
        <hr>
        <form method='POST' action="<?= base_url('admin/dashboard/addMhsToDb');?>" >
        <div class="form-group"><label>NIM</label><input class="form-control" type="text" name="nim" value="" ></div>
        <div class="form-group"><label>Nama</label><input class="form-control" type="text" name="nama" value="" ></div>
        <div class="form-group"><label>Jenis Kelamin</label><input class="form-control" type="text" name="jenis_kelamin" value=""  ></div>
        <div class="form-group"><label>Angkatan</label><input class="form-control" type="text" name="angkatan" value="" ></div>
        <div class="form-group"><label>Program Studi</label><input class="form-control" type="text" name="program_studi" value="" ></div>
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
