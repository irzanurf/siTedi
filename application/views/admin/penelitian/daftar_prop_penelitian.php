

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
        <?php echo $this->session->flashdata('message');?>
        
        <a href="<?=base_url('admin/penelitian/tambahProp');?>/<?= $id ?>"><button class='btn btn-info'><i class="fa fa-plus"></i> Tambah</button></a>
        &nbsp;
        <a href="<?=base_url('admin/penelitian/proposalexcel');?>/<?= $id ?>"><button class='btn btn-success'><img src="<?= base_url('assets/excel.png');?>" alt="excel" width="30" height="30"/> List Pengajuan Proposal</button></a>
        <a href="<?=base_url('admin/penelitian/testexcel');?>/<?= $id ?>"><button class='btn btn-success'><img src="<?= base_url('assets/excel.png');?>" alt="excel" width="30" height="30"/> List Proposal yang Disetujui</button></a>
        <a href="<?=base_url('admin/penelitian/proposalreviewerexcel');?>/<?= $id ?>"><button class='btn btn-success'><img src="<?= base_url('assets/excel.png');?>" alt="excel" width="30" height="30"/> List Proposal dan Reviewer</button></a>

        
        <table class="table">
            <tr>
                <th>No</th>
                <th>Tgl Upload</th>
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
            foreach($view as $v) { 
                $tgl = date('d-m-Y', strtotime($v->tgl_upload));?>
            
            <tr>
                <td><?= $no++?></td>
                <td><?= $tgl?></td>
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
                Submited 

                <?php elseif($v->status==1) : ?>
                Submited

                <?php elseif($v->status==2) : ?>
                Accepted

                <?php elseif($v->status==11||$v->status==12) : ?>
                Review

                <?php elseif($v->status==13) : ?>
                    Review

                <?php elseif($v->status==3) : ?>
                Monev

                <?php elseif($v->status==4) : ?>
                Laporan Akhir

                <?php elseif($v->status==5) : ?>
                Rejected

                <?php else: ?>

                    <?php endif;?>
                </td>

                <td>
                <form style="display:inline-block;" method="post" action="<?= base_url('admin/penelitian/editProposal') ;?>/<?= $v->id; ?>">
                                    <input type='hidden' name="jadwal" value=<?=$id?>>
                                    <button type="Submit" class="btn btn-info">
                                        Edit
                                    </button>
                                </form>

                    <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Proposal?');" action=<?= base_url('admin/penelitian/deleteProp');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <input type='hidden' name="jadwal" value=<?=$id?>>
                                    <button type="Submit" class="btn btn-danger">
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

