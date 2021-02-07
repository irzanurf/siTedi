

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
        <a href="<?=base_url('admin/dashboard/tambahDosen');?>"><button class='btn btn-info'>Tambah Dosen</button></a>
        
        <table class="table">
            <col style='width:10%'>
            <col style='width:50%'>
            <col style='width:40%'>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Departemen</th>
                <th>Program Studi</th>
                <th>Email</th>
                <th>No. Telephone</th>
                <th>Edit</th>
                <th>Hapus</th>

            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <tr>
                <td><?= $v->nip?></td>
                <td><?= $v->nama?></td>
                <td><?= $v->jabatan?></td>
                <td><?= $v->departemen?></td>
                <td><?= $v->program_studi?></td>
                <td><?= $v->email?></td>
                <td><?= $v->no_telp?></td>
                <td>
                
                <form method="post" action=<?= base_url('admin/dashboard/editDosen');?>>
                                    <input type='hidden' name="nip" value="<?= $v->nip ?>">
                                    <button type="submit" class="btn btn-success">
                                        Edit
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

