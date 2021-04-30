

        <div id="page-wrapper">

<div class="container-fluid1">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Submit Proposal Pengabdian
            </h1>
            <ol class="breadcrumb">
                
                <li class="active">
                    <i class="fa fa-edit"></i> Submit proposal
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
            <col style='width:45%'>
            <col style='width:15%'>
            <col style='width:15%'>
            <col style='width:20%'> 
            <thead>
            <tr>
                <th>No</th>
                <th>Judul Proposal</th>
                <th>Instansi Mitra</th>
                <th>Mitra Approval</th>
                <!-- <th>Upload Surat Persetujuan</th> -->
                <th>Aksi</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            
            
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->judul?></td>
                <td>
                <?php if($v->id_mitra==0 || $v->id_mitra==NULL) : ?>
                -
                <?php else: ?>
                    <?= $v->nama_instansi ?>
                <?php endif;?>

                </td>
                <td>
                <?php if($v->id_mitra==0 || $v->id_mitra==NULL) : ?>
                -
                <?php else: ?>
                    <?= ($v->status_mitra==1) ? "Approved" :  "Unapproved" ?>
                <?php endif;?>
                </td>
                <!-- <td><?php if ($v->file_persetujuan==NULL && $v->status_mitra!=1) : ?>
                    <button type="button" class="btn-sm btn-default" data-toggle="modal" disabled>
                        <span class="glyphicon glyphicon-upload"></span><?php if ($v->file_persetujuan==NULL) : ?> Upload <?php endif; ?>
                            <?php if($v->file_persetujuan != NULL) : ?> Edit <?php endif; ?>
                    </button>
                    <?php elseif($v->file_persetujuan==NULL && $v->status_mitra==1) : ?>
                    <button type="button" class="btn-sm btn-info" data-toggle="modal" data-target="#updateSurat<?= $v->mitra_id?>">
                        <span class="glyphicon glyphicon-upload"></span><?php if ($v->file_persetujuan==NULL) : ?> Upload <?php endif; ?>
                            <?php if($v->file_persetujuan != NULL) : ?> Edit <?php endif; ?>
                    </button>
                <?php endif; ?>
                <?php if($v->file_persetujuan != NULL) : ?>
                    <i>UPLOADED</i>
                <?php endif; ?>
                </td> -->
                <td>
                <?php if($v->id_mitra==0 || $v->id_mitra==NULL) : ?>
                        <a href="<?=base_url('dosen/pengabdian/formtambahmitra');?>/<?=$v->id?>"><button   class="btn-sm btn-success"> Tambah Mitra </button></a>
                
                <?php else: ?>
                    <?php if(($v->status_mitra==0 || $v->file_persetujuan==NULL)) : ?>
                        <a href="<?=base_url('dosen/pengabdian/editmitra');?>/<?=$v->id?>"><button   class="btn-sm btn-success"> Edit </button></a>
                        <a href="<?=base_url('dosen/pengabdian/deletemitra');?>/<?=$v->id?>" onclick="return confirm('Apakah anda yakin ingin menghapus mitra kerjasama?');"><button class="btn-sm btn-danger">Hapus</button>  </a>
                <?php elseif($v->status_mitra == 1 && $v->file_persetujuan!=NULL) : ?>
                        <a href="#" ><button  class="btn-sm btn-success"> Edit</button> </a>
                        <a href="#" onclick="return confirm('Apakah anda yakin ingin menghapus mitra kerjasama?');" ><button class="btn-sm btn-danger">Hapus</button> </a>
                        
                <?php else: ?>
                    <a href="<?=base_url('dosen/pengabdian/editmitra');?>/<?=$v->id?>"><button   class="btn-sm btn-success"> Edit </button></a>
                        <a href="<?=base_url('dosen/pengabdian/deletemitra');?>/<?=$v->id?>" onclick="return confirm('Apakah anda yakin ingin menghapus mitra kerjasama?');"><button class="btn-sm btn-danger">Hapus</button>  </a>
                <?php endif;?>
                <?php endif;?>
                
                </td>

                <td>
                <?php if($v->status=='ACCEPTED') :?>
                <span type='button' class="badge badge-pill badge-success">Approved</span>
                <form style="display:inline-block;" method="post" action=<?= base_url('dosen/pengabdian/detail');?>>
                        <input type='hidden' name="id" value="<?= $v->id ?>">
                        <!-- <input type='hidden' name="id_skema" value="<?= $v->jenis ?>"> -->
                        <button type="Submit" class="badge badge-pill badge-info">
                            Detail Nilai
                        </button>
                        
                    </form>
                <?php elseif($v->status=='REJECTED'):?>
                <span type='button' class="badge badge-pill badge-danger">Rejected</span>
                <form style="display:inline-block;" method="post" action=<?= base_url('dosen/pengabdian/detail');?>>
                        <input type='hidden' name="id" value="<?= $v->id ?>">
                        <!-- <input type='hidden' name="id_skema" value="<?= $v->jenis ?>"> -->
                        <button type="Submit" class="badge badge-pill badge-info">
                            Detail Nilai
                        </button>
                        
                    </form>
                <?php else:?>
                <span class="badge badge-pill badge-warning">Processing</span>
                <?php endif;?>
                
                </td>
            </tr>
                
            <?php } ?>
            <?php 

            foreach($anggota as $v) { ?>
            
            
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->judul?></td>
                <td>
                <?php if($v->id_mitra==0 || $v->id_mitra==NULL) : ?>
                -
                <?php else: ?>
                    <?= $v->nama_instansi ?>
                <?php endif;?>

                </td>
                <td>
                <?php if($v->id_mitra==0 || $v->id_mitra==NULL) : ?>
                -
                <?php else: ?>
                    <?= ($v->status_mitra==1) ? "Approved" :  "Unapproved" ?>
                <?php endif;?>
                </td>
                <!-- <td><?php if ($v->file_persetujuan==NULL && $v->status_mitra!=1) : ?>
                    <button type="button" class="btn-sm btn-default" data-toggle="modal" disabled>
                        <span class="glyphicon glyphicon-upload"></span><?php if ($v->file_persetujuan==NULL) : ?> Upload <?php endif; ?>
                            <?php if($v->file_persetujuan != NULL) : ?> Edit <?php endif; ?>
                    </button>
                    <?php elseif($v->file_persetujuan==NULL && $v->status_mitra==1) : ?>
                    <button type="button" class="btn-sm btn-info" data-toggle="modal" data-target="#updateSurat<?= $v->mitra_id?>">
                        <span class="glyphicon glyphicon-upload"></span><?php if ($v->file_persetujuan==NULL) : ?> Upload <?php endif; ?>
                            <?php if($v->file_persetujuan != NULL) : ?> Edit <?php endif; ?>
                    </button>
                <?php endif; ?>
                <?php if($v->file_persetujuan != NULL) : ?>
                    <i>UPLOADED</i>
                <?php endif; ?>
                </td> -->
                <td>
                -
                </td>

                <td>
                <?php if($v->status=='ACCEPTED') :?>
                <span type='button' class="badge badge-pill badge-success">Approved</span>
                <?php elseif($v->status=='REJECTED'):?>
                <span type='button' class="badge badge-pill badge-danger">Rejected</span>
                <?php elseif($v->status==''):?>
                <span  class="badge badge-pill badge-primary">Need to submit</span>
                <?php else:?>
                <span class="badge badge-pill badge-warning">Processing</span>
                <?php endif;?>
                
                </td>
            </tr>
                
            <?php } ?>
            </tbody>
        </table>
        </section>
        

        <!-- Modal isi form -->
        
        <?php 
        foreach ($view as $v) :
            $id=$v->mitra_id;
         ?>

        <!-- Modal -->
        <div class="modal fade" id="updateSurat<?= $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo form_open_multipart('dosen/pengabdian/updateSurat') ?>
                <div class="form-group">
                    <label>Upload Surat Mitra</label>
                    <input type="file" accept="application/pdf" class="form-control" name="file_persetujuan"   >
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value=<?=$id?>  >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            <?= form_close() ?>

                
            </div>
            
            </div>
        </div>
        </div>

        <?php endforeach;?>
        

            

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
<script src="<?= base_url(); ?>assets/js/plugins/sweetalert/sweetalert2.all.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
$(".add-more").click(function(){ 
var html = $(".copy").html();
$(".after-add-more").after(html);
});
$("body").on("click",".remove",function(){ 
$(this).parents(".control-group").remove();
});
});
</script>

<script type="text/javascript">
$(document).ready(function() {
$(".add-more1").click(function(){ 
var html = $(".copy1").html();
$(".after-add-more1").after(html);
});
$("body").on("click",".remove1",function(){ 
$(this).parents(".control-group1").remove();
});
});
</script>

</body>

</html>
