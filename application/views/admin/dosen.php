

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Daftar Dosen
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Daftar Dosen
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class='row'>
    

    
    </div>

    <div class="row">
        <div class="col-lg-12">
        <section class="content">
        <?php 
            if($cek == "cari"){
                ?>
            <a href="<?=base_url('admin/dashboard/viewDosen');?>"><button class='btn btn-success'>Back</button></a>
            <?php }
            else{
                ?>
        
        <a href="<?=base_url('admin/dashboard/tambahDosen');?>"><button class='btn btn-info'>Tambah Dosen</button></a>
        <?php } ?>
        <table class="table">
            <div class="control-group1 input-group" style="margin-top:10px">
                <form action="<?=base_url('admin/dashboard/searchDosen');?>" method="post">
	            <input class="form-control" type="text" name="cari" placeholder="Masukkan nama dosen">
                <div class="input-group-btn"> 
                                        <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-search"></i> Search</button>
                                        </div>
                </form>
            </div>
            <tr>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Departemen / Prodi</th>
                <th></th>
                <th></th>
                <th></th>

            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <tr>
                <td><?= $v->nip?></td>
                <td><?= $v->nama?></td>
                <td><?= $v->program_studi?></td>
                <td>
                
                <form method="post" action=<?= base_url('admin/dashboard/editDosen');?>>
                                    <input type='hidden' name="nip" value="<?= $v->nip ?>">
                                    <button type="submit" class="btn btn-success">
                                        Edit
                                    </button>
                                    
                                </form>
            </td>

            <td>
                <form method="post" action=<?= base_url('admin/dashboard/editAkun');?>>
                                    <input type='hidden' name="nip" value="<?= $v->nip ?>">
                                    <button type="submit" class="btn btn-info">
                                        Akun
                                    </button>
                                    
                                </form>
                </td>
            <td>
                <form method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?');" action=<?= base_url('admin/dashboard/hapusDosen');?>>
                                    <input type='hidden' name="nip" value="<?= $v->nip ?>">
                                    <button type="submit" class="btn btn-danger">
                                        Hapus
                                    </button>
                                    
                                </form>
                </td>
                
                
            </tr>
            
            <?php } ?>
        </table>
        </section>
        

       
        

            

        </div>
        


        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

