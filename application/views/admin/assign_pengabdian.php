

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Assign Reviewer Proposal Pengabdian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Assign reviewer
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
            <col style='width:40%'>
            <col style='width:15%'>
            <col style='width:12.5%'>
            <col style='width:12.5%'>
            <col style='width:15%'>
            <tr>
                <th>No</th>
                <th>Judul Proposal</th>
                <th>Ketua Pengabdian</th>
                <th>Reviewer 1</th>
                <th>Reviewer 2</th>
                <th>Aksi</th>

            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <?php if($v->status != NULL):?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->judul?></td>
                <td><?= $v->nama ?></td>
                <td>
                    <?php if($v->status =="SUBMITTED") : ?>
                    -
                    <?php else :?>
                        <?= $v->nama_reviewer1?>
                    <?php endif;?>
                </td>
                <td>
                    <?php if($v->status =="SUBMITTED") : ?>
                    -
                    <?php else :?>
                        <?= $v->nama_reviewer2?>
                    <?php endif;?>
                </td>
                <td>
                <?php if($v->status =="SUBMITTED") : ?>
                <a type="button" class="btn-sm btn-info" href="<?= base_url('admin/pengabdian/assignreviewerproposal') ;?>/<?= $v->id; ?>">
                    Assign
                </a>
                <?php elseif($v->status == "ASSIGNED" ) :?>
                <a type="button" class="btn-sm btn-info" href="<?= base_url('admin/pengabdian/editreviewerproposal') ;?>/<?= $v->id; ?>">
                    Edit reviewer
                </a>
                <?php else :?>
                    
                <?php endif;?>

                </td>
                
            </tr>
            <?php endif;?>
            
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
