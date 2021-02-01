

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Jadwal Pengajuan Proposal Penelitian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Jadwal Penelitian
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
        <a href="<?=base_url('admin/penelitian/formJadwal');?>"><button class='btn btn-info'>Tambah Jadwal Penelitian</button></a>
        
        <table class="table">
            <tr>
                <th>No</th>
                <th>Tanggal Mulai</th>
                <th>Batas Akhir Pengumpulan Monev</th>
                <th>Batas Akhir Pengumpulan Laporan Akhir</th>
                <th>Tanggal Selesai</th>
                <th>Aksi</th>
                <!-- <th>Tahun</th> -->

            </tr>
            <?php 
            $no = 1;
            foreach($jadwal as $v) { ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->tgl_mulai?></td>
                <td><?= $v->tgl_monev?></td>
                <td><?= $v->tgl_akhir?></td>
                <td><?= $v->tgl_selesai?></td>
                <td>
                <a type="button" class="btn-sm btn-success" href="<?= base_url('admin/penelitian/editJadwalPenelitian') ;?>/<?= $v->id; ?>">
                    Edit Jadwal
                </a>
                <form method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?');" action="<?= base_url('admin/penelitian/hapusJadwalPenelitian');?>/<?= $v->id; ?>" >

                                    <button type="submit" class="btn-sm btn-danger">
                                        Hapus Jadwal
                                    </button>
                                    
                                </form>
                <!-- <a type="button" class="btn-sm btn-info" href="<?= base_url('#') ;?>/<?= $v->id; ?>">
                    Edit reviewer
                </a> -->
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

<!-- jQuery Version 1.11.0 -->
<script src="<?= base_url('assets/template/js/jquery-1.11.0.js');?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('assets/template/js/bootstrap.min.js');?>"></script>

</body>

</html>