

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Jadwal Pengajuan Proposal Pengabdian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Jadwal pengabdian
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
        <a href="<?=base_url('admin/pengabdian/formJadwalPengabdian');?>"><button class='btn btn-info'>Tambah Jadwal Pengabdian</button></a>
        
        <table class="table">
            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Tanggal Mulai</th>
                <th>Batas Akhir Pengumpulan Laporan Akhir</th>
                <th>Tanggal Selesai</th>
                <th>Aksi</th>
                <!-- <th>Tahun</th> -->

            </tr>
            <?php 
            $no = 1;
            foreach($jadwal as $v) { 
                $tgl_mulai = date('d-m-Y', strtotime($v->tgl_mulai));
                $tgl_akhir = date('d-m-Y', strtotime($v->tgl_akhir));
                $tgl_selesai = date('d-m-Y', strtotime($v->tgl_selesai));?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->keterangan?></td>
                <td><?= $tgl_mulai?></td>
                <td><?= $tgl_akhir?></td>
                <td><?= $tgl_selesai?></td>
                <td>
                <a type="button" class="btn btn-success" href="<?= base_url('admin/pengabdian/editJadwalPengabdian') ;?>/<?= $v->id; ?>">
                    Edit Jadwal
                </a>
                <form method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?');" action="<?= base_url('admin/pengabdian/hapusJadwalPengabdian');?>/<?= $v->id; ?>" >

                                    <button type="submit" class="btn btn-danger">
                                        Hapus Jadwal
                                    </button>
                                    
                                </form>
                <!-- <a type="button" class="btn btn-info" href="<?= base_url('#') ;?>/<?= $v->id; ?>">
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

