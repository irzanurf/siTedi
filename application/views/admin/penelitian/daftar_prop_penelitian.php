

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
        <a href="<?=base_url('admin/penelitian/proposalword');?>"><button class='btn btn-info'>Download List Pengajuan Proposal</button></a>
        <a href="<?=base_url('admin/penelitian/testword');?>"><button class='btn btn-info'>Download List Proposal yang Disetujui</button></a>
        <a href="<?=base_url('admin/penelitian/proposalexcel');?>"><button class='btn btn-success'>Download List Pengajuan Proposal</button></a>
        <a href="<?=base_url('admin/penelitian/testexcel');?>"><button class='btn btn-success'>Download List Proposal yang Disetujui</button></a>

        <table class="table">
            <col style='width:5%'>
            <col style='width:45%'>
            <col style='width:20%'>
            <col style='width:15%'>
            <col style='width:15%'>
            <tr>
                <th>No</th>
                <th>Judul Proposal</th>
                <th>Jenis Penelitian</th>
                <th>Nilai</th>
                <!-- <th>Detail</th> -->
                <th>Status</th>

            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <?php if ($v->nilai!==NULL) : ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->judul?></td>
                <td><?= $v->jenis ?></td>
                <td><?php $rata = ($v->nilai+$v->nilai2)/2?><?= $rata ?></td>
                <!-- <td>
                <a type="button" class="btn-sm btn-info" href="<?= base_url('admin/penelitian/detailProposal') ;?>/<?= $v->id_proposal; ?>">
                    Detail
                </a>
                
                </td> -->
                <td>
                <?php if($v->status>=2 && $v->status<=4) : ?>
                ACCEPTED

                <?php elseif($v->status==1) : ?>
                SUBMITED

                <?php elseif($v->status==5) : ?>
                REJECTED

                <?php else: ?>

                    <?php endif;?>
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
