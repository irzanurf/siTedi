

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
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
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
            <?php if ($v->nilai!==NULL) : ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->judul?></td>
                <td><?= $v->nama_instansi ?></td>
                <td><?php if($v->status=='GRADED2' || ($v->status=='ASSIGNED')) : ?><?php else :?><?=$v->nilai?><?php endif?></td>
                <td><?php if($v->status=='GRADED1' || ($v->status=='ASSIGNED')) : ?> <?php else :?><?=$v->nilai2 ?><?php endif?></td>
                <td>
                <!-- <a type="button" class="btn-sm btn-info" href="<?= base_url('admin/pengabdian/detailProposal') ;?>/<?= $v->id_proposal; ?>">
                    Detail
                </a> -->
                <?php if($v->status=='NEED_APPROVAL') :?>
                <?php $rata = ($v->nilai+$v->nilai2)/2?><?= $rata?>
                <?php else : ?> - 
                <?php endif ?>
                </td>
                <td>
                <?php if($v->status=='NEED_APPROVAL') :?>
                <a type="button" class="btn-sm btn-success" href="<?= base_url('admin/pengabdian/acceptProposal') ;?>/<?= $v->id_proposal; ?>">
                    Accept
                </a>
                <a type="button" class="btn-sm btn-danger" href="<?= base_url('admin/pengabdian/rejectProposal') ;?>/<?= $v->id_proposal; ?>">
                    Reject
                </a>       
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

<!-- jQuery Version 1.11.0 -->
<script src="<?= base_url('assets/template/js/jquery-1.11.0.js');?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('assets/template/js/bootstrap.min.js');?>"></script>

</body>

</html>
