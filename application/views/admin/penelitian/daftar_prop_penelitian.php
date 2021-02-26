

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Proposal Penelitian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Proposal Penelitian
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
        
        
        <section class="content">
        <a href="<?=base_url('admin/penelitian/proposalexcel');?>"><button class='btn btn-success'><img src="<?= base_url('assets/excel.png');?>" alt="excel" width="30" height="30"/> Download List Pengajuan Proposal</button></a>
        <a href="<?=base_url('admin/penelitian/testexcel');?>"><button class='btn btn-success'><img src="<?= base_url('assets/excel.png');?>" alt="excel" width="30" height="30"/> Download List Proposal yang Disetujui</button></a>

        <table class="table">
            <tr>
                <th>No</th>
                <th>Ket. Jadwal</th>
                <th>Judul Proposal</th>
                <th>Jenis Penelitian</th>
                <th>Ketua Penelitian</th>
                <th>Nilai</th>
                <!-- <th>Detail</th> -->
                <th>Status</th>
                <th>Action</th>

            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->ket?></td>
                <td><?= $v->judul?></td>
                <td><?= $v->jenis ?></td>
                <td><?= $v->nama_dosen ?></td>
                <td><?php 
                if(!empty($v->nilai || $v->nilai2)) :
                    $rata = ($v->nilai+$v->nilai2)/2?><?= $rata ?>
                
                <?php else: echo "-"?>
                 <?php endif;?>
                </td>
                <!-- <t
                d>
                <a type="button" class="btn btn-info" href="<?= base_url('admin/penelitian/detailProposal') ;?>/<?= $v->id_proposal; ?>">
                    Detail
                </a>
                
                </td> -->
                <td>
                <?php if($v->status==0) : ?>
                SUBMITED (Belum difinalisasi)

                <?php elseif($v->status==1) : ?>
                SUBMITED (Sudah difinalisasi)

                <?php elseif($v->status==2) : ?>
                ACCEPTED

                <?php elseif($v->status==11||$v->status==12) : ?>
                REVIEW

                <?php elseif($v->status==13) : ?>
                MONEV (Belum difinalisasi)

                <?php elseif($v->status==3) : ?>
                MONEV (sudah difinalisasi) 

                <?php elseif($v->status==4) : ?>
                LAPORAN AKHIR (sudah difinalisasi) 

                <?php elseif($v->status==5) : ?>
                REJECTED

                <?php else: ?>

                    <?php endif;?>
                </td>

                <td>
                <?php if($v->status==0 || $v->status==1) : ?>
                    </form>
                                <form method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Proposal?');" action=<?= base_url('admin/penelitian/deleteProp');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="Submit" class="btn btn-danger">
                                        Hapus
                                    </button>
                                </form>
                <?php else: ?>

                    <?php endif;?>
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

