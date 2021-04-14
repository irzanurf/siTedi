

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
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('kadep/kadep');?>">Dashboard</a>
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
                <a type="button" class="btn btn-info" href="<?= base_url('kadep/kadep/detailProposalPenelitian') ;?>/<?= $v->id; ?>" >
                    Detail
                </a>

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

