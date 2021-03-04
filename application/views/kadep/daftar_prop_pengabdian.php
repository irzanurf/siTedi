

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Proposal Pengabdian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('kadep/kadep');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Proposal Pengabdian
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
                <th>Ketua</th>
                <th>Judul Proposal</th>
                <th>Instansi Mitra</th>
                <th>Nilai</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->ket?></td>
                <td><?= $v->nama_dosen ?></td>
                <td><?= $v->judul?></td>
                <td>
                <?php 
                if($v->id_mitra==0) :?>
                -
                <?php else:?>
                    <?= $v->nama_instansi ?>
                 <?php endif;?>
                 </td>
                <td><?php 
                if(!empty($v->nilai || $v->nilai2)) :
                    $rata = ($v->nilai+$v->nilai2)/2?><?= $rata ?>
                
                <?php else: echo "-"?>
                 <?php endif;?>
                </td>
                <td><?=$v->status?></td>
                <td>
                <a type="button" class="btn btn-info" href="<?= base_url('kadep/kadep/detailProposalPengabdian') ;?>/<?= $v->id; ?>" >
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

