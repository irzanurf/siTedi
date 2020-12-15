

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Upload Surat Persetujuan Mitra
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Upload surat mitra
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
                <th>Instansi Mitra</th>
                <th>Upload Surat Persetujuan</th>
            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <?php if ($v->nip==$this->session->userdata('user_name')) : ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->judul?></td>
                <td><?= $v->nama_instansi ?></td>
                <td>
                <button type="button" class="btn-sm btn-info" data-toggle="modal" data-target="#updateSurat<?= $v->mitra_id?>">
                    <span class="glyphicon glyphicon-upload"></span><?php if ($v->file_persetujuan==NULL) : ?> Upload <?php endif; ?>
                        <?php if($v->file_persetujuan != NULL) : ?> Edit <?php endif; ?>
                </button>
                
                
                </td>
               
            </tr>
                        <?php endif; ?>
                <!-- Modal -->
        <div class="modal fade" id="updateSurat<?= $v->mitra_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="file" class="form-control" name="file_persetujuan"   >
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value=<?=$v->mitra_id?>  >
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
            <?php } ?>
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
                    <input type="file" class="form-control" name="file_persetujuan"   >
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
