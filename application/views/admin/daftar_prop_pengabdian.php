

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
        <!-- <a href="<?=base_url('admin/pengabdian/tambahProp');?>/<?= $id ?>"><button class='btn btn-info'><i class="fa fa-plus"></i> Tambah</button></a> -->
        <a href="<?=base_url('admin/pengabdian/tambahPropTanpaMitra');?>/<?= $id ?>"><button class='btn btn-info'><i class="fa fa-plus"></i> Tambah</button></a>
        <a href="<?=base_url('admin/pengabdian/proposalexcel');?>/<?= $id ?>"><button class='btn btn-success'><img src="<?= base_url('assets/excel.png');?>" alt="excel" width="30" height="30"/> List Pengajuan Proposal</button></a>
        <a href="<?=base_url('admin/pengabdian/testexcel');?>/<?= $id ?>"><button class='btn btn-success'><img src="<?= base_url('assets/excel.png');?>" alt="excel" width="30" height="30"/> List Proposal yang Disetujui</button></a>
        <a href="<?=base_url('admin/pengabdian/proposalreviewerexcel');?>/<?= $id ?>"><button class='btn btn-success'><img src="<?= base_url('assets/excel.png');?>" alt="excel" width="30" height="30"/> List Proposal dan Reviewer</button></a>

        <table class="table">
            <tr>
                <th>No</th>
                <th>Ket. Jadwal</th>
                <th>Judul Proposal</th>
                <th>Instansi Mitra</th>
                <th>Status mitra</th>
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
                <td>
                <?php 
                if($v->id_mitra==0) :?>
                -
                <?php else:?>
                    <?= $v->nama_instansi ?>
                 <?php endif;?>
                 </td>
                 <td>
                 <?php
                 if($v->id_mitra==0) :?>
                -
                                
                <?php else:?>

                <?php
                if($v->status_mitra==0) :?>
                Unapproved
            
                <?php else:?>
                Approved
                <a href="<?=base_url('admin/pengabdian/detailSuratMitra');?>/<?=$v->id?>">
                                    <button   class="btn btn-info"> Surat Mitra </button>
                                    </a>
                 <?php endif;?>            
                                    
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
                <?php
                if($v->id_mitra==0) :?>
                <a href="<?=base_url('admin/pengabdian/formTambahMitra');?>/<?=$v->id?>">
                                    <button   class="btn btn-info"> Tambah Mitra </button>
                                    </a>
            
                                
                <?php else:?>

                <?php
                if($v->status_mitra==0) :?>
                <a href="<?=base_url('admin/pengabdian/editMitra');?>/<?=$v->id?>">
                                    <button   class="btn btn-info"> Edit Mitra </button>
                                    </a>

                                    <a href="<?=base_url('admin/pengabdian/deleteMitra');?>/<?=$v->id?>" onclick="return confirm('Apakah anda yakin ingin menghapus mitra kerjasama?');">
                                    <button   class="btn btn-danger"> Delete Mitra </button>
                                    </a>
            
                <?php else:?>
                 <?php endif;?>            
                                    
                 <?php endif;?>
                 <a href="<?=base_url('admin/pengabdian/editProposalTanpaMitra');?>/<?=$v->id?>">
                                    <button   class="btn btn-success"> Edit </button>
                                    </a>
                

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

