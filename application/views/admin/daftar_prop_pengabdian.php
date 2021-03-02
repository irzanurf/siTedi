

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
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
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
        <?php echo $this->session->flashdata('message');?>
        <a href="<?=base_url('admin/pengabdian/proposalexcel');?>/<?= $id ?>"><button class='btn btn-success'><img src="<?= base_url('assets/excel.png');?>" alt="excel" width="30" height="30"/> Download List Pengajuan Proposal</button></a>
        <a href="<?=base_url('admin/pengabdian/testexcel');?>/<?= $id ?>"><button class='btn btn-success'><img src="<?= base_url('assets/excel.png');?>" alt="excel" width="30" height="30"/> Download List Proposal yang Disetujui</button></a>

        <table class="table">
            <tr>
                <th>No</th>
                <th>Ket. Jadwal</th>
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
                <td><?= $v->judul?></td>
                <td><?= $v->nama_instansi ?></td>
                <td><?php 
                if(!empty($v->nilai || $v->nilai2)) :
                    $rata = ($v->nilai+$v->nilai2)/2?><?= $rata ?>
                
                <?php else: echo "-"?>
                 <?php endif;?>
                </td>
                <td><?=$v->status?></td>
                <td>
                <form style="display:inline-block;" method="post" action="<?= base_url('admin/pengabdian/editProposal') ;?>/<?= $v->id; ?>">
                                    <input type='hidden' name="jadwal" value=<?=$id?>>
                                    <button type="Submit" class="btn btn-info">
                                        Edit
                                    </button>
                                </form>

                    <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Proposal?');" action=<?= base_url('admin/pengabdian/deleteProp');?>>
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

