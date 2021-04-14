

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Approval Proposal Pengabdian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Approval proposal
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
        
        
        <section class="content">
        <table class="table">
            <col style='width:5%'>
            <col style='width:30%'>
            <col style='width:15%'>
            <col style='width:10%'>
            <col style='width:10%'>
            <col style='width:10%'>
            <col style='width:15%'>
            <tr>
                <th>No</th>
                <th>Judul Proposal</th>
                <th>Instansi Mitra</th>
                <th>Nilai Reviewer1</th>
                <th>Nilai Reviewer2</th>
                <th>Nilai rata-rata</th>
                <th>Aksi</th>

            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <?php if ($v->nilai!==NULL || $v->nilai2!==NULL) : ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->judul?></td>
                <td>
                <?php if($v->id_mitra==0) :?>
                    -
                <?php else : ?> 
                    <?= $v->nama_instansi ?>
                <?php endif ?>
                </td>
                <td><?php if($v->status=='GRADED2' || ($v->status=='ASSIGNED')) : ?><?php else :?><?=$v->nilai?><?php endif?></td>
                <td><?php if($v->status=='GRADED1' || ($v->status=='ASSIGNED')) : ?> <?php else :?><?=$v->nilai2 ?><?php endif?></td>
                <td>
                <!-- <a type="button" class="btn btn-info" href="<?= base_url('admin/pengabdian/detailProposal') ;?>/<?= $v->id_proposal; ?>">
                    Detail
                </a> -->
                <?php if($v->status=='NEED_APPROVAL'||$v->status=='ACCEPTED'||$v->status=='REJECTED') :?>
                <?php $rata = ($v->nilai+$v->nilai2)/2?><?= $rata?>
                <?php else : ?> - 
                <?php endif ?>
                </td>
                <td>
                <?php if($v->status=='NEED_APPROVAL') :?>
                <!-- <a type="button" class="btn btn-success" href="<?= base_url('admin/pengabdian/acceptProposal') ;?>/<?= $v->id_proposal; ?>" onclick="return confirm('Apakah Anda Yakin dengan Pilihan Approval?');">
                    Accept
                </a>
                <a type="button" class="btn btn-danger" href="<?= base_url('admin/pengabdian/rejectProposal') ;?>/<?= $v->id_proposal; ?>" onclick="return confirm('Apakah Anda Yakin dengan Pilihan Approval?');">
                    Reject
                </a>        -->
                <div style="display:flex;">
                    <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda Yakin dengan Pilihan Approval?');" action="<?= base_url('admin/pengabdian/acceptProposal') ;?>/<?= $v->id_proposal; ?>">
                                    <input type='hidden' name="jadwal" value=<?=$id?>>
                                    <button type="Submit" class="btn btn-success">
                                    Accept
                                    </button>
                                </form>
                                
                    <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda Yakin dengan Pilihan Approval?');" action="<?= base_url('admin/pengabdian/rejectProposal') ;?>/<?= $v->id_proposal; ?>">
                                    <input type='hidden' name="jadwal" value=<?=$id?>>
                                    <button type="Submit" class="btn btn-danger">
                                    Reject
                                    </button>
                                </form>
                </div>
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

