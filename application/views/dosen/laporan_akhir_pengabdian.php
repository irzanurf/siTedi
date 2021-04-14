

        <div id="page-wrapper">

<div class="container-fluid1">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Laporan Akhir Pengabdian
            </h1>
            <ol class="breadcrumb">
               
                <li class="active">
                    <i class="fa fa-edit"></i> Laporan akhir
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
        <col style='width:55%'>
        <col style='width:10%'>
        <col style='width:10%'>
        <col style='width:10%'>
        <col style='width:10%'>
            <tr>
                <th>No</th>
                <th>Judul Proposal</th>
                <th>Laporan Akhir</th>
                <th>Logbook</th>
                <th>Luaran</th>
                <th>Catatan Belanja</th>
                
            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <?php if ($v->nip==$this->session->userdata('user_name') && $v->status == 'ACCEPTED') : ?>
            
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->judul?></td>
                <td>
                    <button type="button" class="btn-sm btn-info" data-toggle="modal" data-target="#uploadLaporanAkhir<?= $v->id?>">
                    <span class="glyphicon glyphicon-upload"></span><?php if ($v->laporan_akhir==NULL) : ?> Upload
                        <?php elseif($v->laporan_akhir != NULL) : ?> Edit <?php endif; ?>
                    </button>
                </td>
                <td>
                    <button type="button" class="btn-sm btn-info" data-toggle="modal" data-target="#uploadLogbook<?= $v->id?>">
                        <span class="glyphicon glyphicon-upload"></span><?php if ($v->logbook==NULL) : ?> Upload
                            <?php elseif($v->logbook != NULL) : ?> Edit <?php endif; ?>
                    </button>
                </td>
                <td>
                <form method="post" action=<?= base_url('dosen/pengabdian/luaran');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn-sm btn-info">
                                    <?php if ($v->luaran==NULL) : ?> Upload
                                    <?php elseif($v->luaran != NULL) : ?> Edit <?php endif; ?>
                                    </button>
                                    
                                </form>
                </td>
                <td>
                    <button type="button" class="btn-sm btn-info" data-toggle="modal" data-target="#uploadBelanja<?= $v->id?>">
                        <span class="glyphicon glyphicon-upload"></span><?php if ($v->belanja==NULL) : ?> Upload
                            <?php elseif($v->belanja != NULL) : ?> Edit <?php endif; ?>
                    </button>
                </td>
               
            </tr>
            <?php endif; ?>
            
                <!-- Modal -->
        
            <?php } ?>
        </table>
        </section>
        

        <!-- Modal isi form -->
        

        

            

        
        


        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

                <?php 
                    foreach ($view as $v) :
                        $id=$v->id;
                        
                     ?>

                    <!-- Modal Laporan Akhir -->
                    <div class="modal fade" id="uploadLaporanAkhir<?= $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">File Laporan Akhir</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <?php echo form_open_multipart('dosen/pengabdian/uploadlaporanakhir') ?>
                            <div class="form-group">
                                <label>Laporan Akhir</label>
                                <?php if($v->laporan_akhir == NULL) :?>
                                <input type="file" accept="application/pdf" class="form-control" name="laporan_akhir"   >
                                <?php else:?>
                                <iframe src="<?= base_url('assets/laporan_akhir');?>/<?=$v->laporan_akhir?>" width='100%' height="300px" >
                                </iframe>
                                <input type="file" accept="application/pdf" class="form-control" name="laporan_akhir"  >
                                <?php endif;?>
                

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


                    <!-- Modal Logbook -->
                    <div class="modal fade" id="uploadLogbook<?= $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">File Logbook</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <?php echo form_open_multipart('dosen/pengabdian/uploadlogbook') ?>
                            <div class="form-group">
                                <label>Logbook</label>
                                <?php if($v->logbook == NULL) :?>
                                <input type="file" accept="application/pdf" class="form-control" name="logbook"   >
                                <?php else:?>
                                <iframe src="<?= base_url('assets/logbook');?>/<?=$v->logbook?>" width='100%' height="300px" >
                                </iframe>
                                <input type="file" accept="application/pdf" class="form-control" name="logbook"  >
                                <?php endif;?>
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


                    <!-- Modal Luaran -->
                    <div class="modal fade" id="uploadLuaran<?= $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">File Luaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <?php echo form_open_multipart('dosen/pengabdian/uploadluaran') ?>
                            <div class="form-group">
                                <label>Luaran</label>
                                <?php if($v->luaran == NULL) :?>
                                <input type="file" accept="application/pdf" class="form-control" name="luaran"   >
                                <?php else:?>
                                <iframe src="<?= base_url('assets/luaran');?>/<?=$v->luaran?>" width='100%' height="300px" >
                                </iframe>
                                <input type="file" accept="application/pdf" class="form-control" name="luaran"  >
                                <?php endif;?>
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



                    <!-- Modal Belanja -->
                    <div class="modal fade" id="uploadBelanja<?= $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">File Catatan Belanja</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <?php echo form_open_multipart('dosen/pengabdian/uploadbelanja') ?>
                            <div class="form-group">
                                <label>Catatan Belanja</label>
                                <?php if($v->belanja == NULL) :?>
                                <input type="file" accept="application/pdf" class="form-control" name="belanja"   >
                                <?php else:?>
                                <iframe src="<?= base_url('assets/belanja');?>/<?=$v->belanja?>" width='100%' height="300px" >
                                </iframe>
                                <input type="file" accept="application/pdf" class="form-control" name="belanja"  >
                                <?php endif;?>
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
