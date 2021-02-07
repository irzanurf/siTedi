

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
                <?php if($v->status==13) :?>
                <a type="button" class="btn btn-success" href="<?= base_url('admin/penelitian/acceptProposal') ;?>/<?= $v->id_proposal; ?>">
                    Accept
                </a>
                <a type="button" class="btn btn-danger" href="<?= base_url('admin/penelitian/rejectProposal') ;?>/<?= $v->id_proposal; ?>">
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

