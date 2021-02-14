

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Laporan Akhir
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Laporan Akhir
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <a href="<?=base_url('admin/penelitian/laporanAkhirWord');?>"><button class='btn btn-info'><img src="<?= base_url('assets/word.png');?>" alt="word" width="30" height="30"/> List Laporan Akhir Lengkap</button></a>
    <a href="<?=base_url('admin/penelitian/laporanAkhirExcel');?>"><button class='btn btn-success'><img src="<?= base_url('assets/excel.png');?>" alt="excel" width="30" height="30"/> List Laporan Akhir Lengkap</button></a>


    <div class="row">
        <div class="col-lg-12">
        
        
        <section class="content">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Judul Proposal</th>
                <th>Ketua Penelitian</th>
                <th class='text-center'>Laporan Final</th>
                <th class='text-center'>Logbook</th>
                <th class='text-center'>Luaran</th>
                <th class='text-center'>Laporan Belanja 100%</th>
                <th class='text-center'>Catatan Pengusul</th>
                
            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <?php if ($v->status > 1 && $v->status < 5) : ?>
            
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->judul?></td>
                <td><?= $v->nama ?></td>
                <td class='text-center'>
                    <?php if ($v->file1==NULL) : ?> -
                        <?php elseif($v->file1 != NULL) : ?><i>UPLOADED</i>  
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadFinal<?= $v->id?>">
                    <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <?php endif; ?>
                </td>
                <td class='text-center'>
                    <?php if ($v->file2==NULL) : ?> -
                        <?php elseif($v->file1 != NULL) : ?><i>UPLOADED</i>  
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadLogbook<?= $v->id?>">
                    <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <?php endif; ?>
                </td>
                <td class='text-center'>
                    <?php if ($v->file3==NULL) : ?> -
                        <?php elseif($v->file2 != NULL) : ?> <i>UPLOADED</i>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadLuaran<?= $v->id?>">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <?php endif; ?>
                </td>
                <td class='text-center'>
                    <?php if ($v->file4==NULL) : ?> - 
                        <?php elseif($v->file3 != NULL) : ?> <i>UPLOADED</i> 
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadBelanja<?= $v->id?>">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <?php endif; ?>
                </td>
                <td>
                <?php if ($v->catatan==NULL) : ?> - 
                    <?php elseif($v->file3 != NULL) : ?> <?= $v->catatan?>
                    <?php endif; ?>
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

                     <!-- Modal Final -->
                    <div class="modal fade" id="uploadFinal<?= $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">File Laporan Final</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Laporan Akhir</label>
                                
                                <iframe src="<?= base_url('assets/lap_akhir_penelitian');?>/<?=$v->file1?>" width='100%' height="300px" >
                                </iframe>
                

                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value=<?=$id?>  >
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        

                            
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
                            <div class="form-group">
                                <label>Laporan Akhir</label>
                                
                                <iframe src="<?= base_url('assets/lap_akhir_penelitian');?>/<?=$v->file2?>" width='100%' height="300px" >
                                </iframe>
                

                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value=<?=$id?>  >
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        

                            
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
                            <div class="form-group">
                                <label>Logbook</label>
                                
                                <iframe src="<?= base_url('assets/lap_akhir_penelitian');?>/<?=$v->file3?>" width='100%' height="300px" >
                                </iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                
                            </div>

                            
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
                            <div class="form-group">
                                <label>Catatan Belanja</label>
                                <iframe src="<?= base_url('assets/lap_akhir_penelitian');?>/<?=$v->file4?>" width='100%' height="300px" >
                                </iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                            
                        </div>
                        
                        </div>
                    </div>
                    </div>



                    <?php endforeach;?>

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


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

