

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Approval Proposal Penelitian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Approval Proposal Penelitian
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
        
        
        <section class="content">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Judul Proposal</th>
                <th>Ketua Penelitian</th>
                <th>Nilai Reviewer1</th>
                <th>Nilai Reviewer2</th>
                <th>Nilai rata-rata</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <?php if ($v->nilai!==NULL) : ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->judul?></td>
                <td><?= $v->nama ?></td>
                <td><?php if($v->status==12) : ?><?php else :?><?=$v->nilai?><?php endif?></td>
                <td><?php if($v->status==11) : ?> <?php else :?><?=$v->nilai2 ?><?php endif?></td>
                <td>
                <!-- <a type="button" class="btn btn-info" href="<?= base_url('admin/pengabdian/detailProposal') ;?>/<?= $v->id_proposal; ?>">
                    Detail
                </a> -->
                <?php if($v->status==13||$v->status==2||$v->status==3||$v->status==4||$v->status==5) :?>
                <?php $rata = ($v->nilai+$v->nilai2)/2?><?= $rata?>
                <?php else : ?> - 
                <?php endif ?>
                </td>
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
                
                <?php if($v->status==13) :?>
                <div style="display:flex;">
                    <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda Yakin dengan Pilihan Approval?');" action="<?= base_url('admin/penelitian/acceptProposal') ;?>/<?= $v->id_proposal; ?>">
                                    <input type='hidden' name="jadwal" value=<?=$id?>>
                                    <button type="Submit" class="btn btn-success">
                                    Accept
                                    </button>
                                </form>
                                
                    <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda Yakin dengan Pilihan Approval?');" action="<?= base_url('admin/penelitian/rejectProposal') ;?>/<?= $v->id_proposal; ?>">
                                    <input type='hidden' name="jadwal" value=<?=$id?>>
                                    <button type="Submit" class="btn btn-danger">
                                    Reject
                                    </button>
                                </form>
                </div>
                <!-- <a type="button" class="btn btn-success" href="<?= base_url('admin/penelitian/acceptProposal') ;?>/<?= $v->id_proposal; ?>" onclick="return confirm('Apakah Anda Yakin dengan Pilihan Approval?');">
                    Accept
                </a>
                <a type="button" class="btn btn-danger" href="<?= base_url('admin/penelitian/rejectProposal') ;?>/<?= $v->id_proposal; ?>" onclick="return confirm('Apakah Anda Yakin dengan Pilihan Approval?');">
                    Reject
                </a>      -->
                <?php elseif($v->status==2 || $v->status==5) :?> 
                <div style="text-align: center;">
                    <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda Yakin ingin melakukan Pembatalan?');" action="<?= base_url('admin/penelitian/cancelProposal') ;?>/<?= $v->id_proposal; ?>">
                                    <input type='hidden' name="jadwal" value=<?=$id?>>
                                    <button type="Submit" class="btn btn-danger">
                                    Cancel
                                    </button>
                                </form>
                </div>
                    <!-- <a type="button" class="btn btn-danger" href="<?= base_url('admin/penelitian/cancelProposal') ;?>/<?= $v->id_proposal;?>" onclick="return confirm('Apakah Anda Yakin ingin melakukan Pembatalan?');">
                    Cancel
                </a>  -->
                <?php else : ?> 
                <?php endif ?>         
                </td>
                
            </tr>
            <?php endif; ?>
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

