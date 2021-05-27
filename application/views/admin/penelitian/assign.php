

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Assign Reviewer
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
                <th>Ketua Penelitian</th>
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
                    <?php if($v->nama_reviewer1==""||$v->nama_reviewer1=="0"||$v->nama_reviewer1==NULL) : ?>
                    -
                    <?php else :?>
                        <?= $v->nama_reviewer1?>
                    <?php endif;?>
                </td>
                <td>
                    <?php if($v->nama_reviewer2==""||$v->nama_reviewer2=="0"||$v->nama_reviewer2==NULL) : ?>
                    -
                    <?php else :?>
                        <?= $v->nama_reviewer2?>
                    <?php endif;?>
                </td>
                <td>
                <?php if(($v->status == 1 || $v->status == 0) && ($v->nama_reviewer1 ==""||$v->nama_reviewer1 =="0"||$v->nama_reviewer1 ==NULL)) : ?>
                
                <form style="display:inline-block;" method="post" action="<?= base_url('admin/penelitian/setReviewer') ;?>/<?= $v->id; ?>">
                                    <input type='hidden' name="jadwal" value=<?=$jadwal?>>
                                    <button type="Submit" class="btn btn-info">
                                    Assign
                                    </button>
                                </form>
                <?php elseif($v->status == 11 || $v->status == 12 || $v->status == 13 || $v->status == 2|| $v->status == 3|| $v->status == 4|| $v->status == 5|| $v->status == 0 ) :?>
                
                <?php else :?>
                    
                <form style="display:inline-block;" method="post" action="<?= base_url('admin/penelitian/EditReviewer') ;?>/<?= $v->id; ?>">
                                    <input type='hidden' name="jadwal" value=<?=$jadwal?>>
                                    <button type="Submit" class="btn btn-info">
                                    Edit reviewer
                                    </button>
                                </form>
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
