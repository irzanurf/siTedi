

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
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
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
            <col style='width:10%'>
            <col style='width:25%'>
            <col style='width:25%'>
            <col style='width:40%'>
            <tr>
                <th>No</th>
                <th>Tanggal Mulai</th>
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
                <td><?= $v->tgl_selesai?></td>
                <td>
                <a type="button" class="btn-sm btn-success" href="<?= base_url('admin/pengabdian/editJadwalPengabdian') ;?>/<?= $v->id; ?>">
                    Edit Jadwal
                </a>
                <a type="button" class="btn-sm btn-danger" href="<?= base_url('admin/pengabdian/hapusJadwalPengabdian') ;?>/<?= $v->id; ?>">
                    Hapus Jadwal
                </a>
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
