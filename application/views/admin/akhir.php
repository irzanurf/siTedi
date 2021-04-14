

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Laporan Akhir Pengabdian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Laporan akhir
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <a href= "<?= base_url('admin/pengabdian/laporanAkhirWord') ;?>/<?= $id;?>"><button class='btn btn-info'><img src="<?= base_url('assets/word.png');?>" alt="word" width="30" height="30"/> List Laporan Akhir Lengkap</button></a>
    <a href="<?=base_url('admin/pengabdian/laporanAkhirExcel');?>/<?= $id;?>"><button class='btn btn-success'><img src="<?= base_url('assets/excel.png');?>" alt="excel" width="30" height="30"/> List Laporan Akhir Lengkap</button></a>

    <div class="row">
        <div class="col-lg-12">
        
        
        <section class="content">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Judul Proposal</th>
                <th class='text-center'>Laporan Akhir</th>
                <th class='text-center'>Logbook</th>
                <th class='text-center'>Catatan Belanja</th>
                <th class='text-center'>Luaran</th>
                <th class='text-center'>Action</th>
            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <?php if ($v->status == 'ACCEPTED') : ?>
            
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->judul?></td>
                <td class='text-center'>
                    <?php if ($v->laporan_akhir==NULL) : ?> -
                        <?php elseif($v->laporan_akhir != NULL) : ?>  <br>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadLaporanAkhir<?= $v->id?>">
                    <span class="glyphicon glyphicon-ok"></span>
                    </button>
                    <?php endif; ?>
                </td>
                <td class='text-center'>
                    <?php if ($v->logbook==NULL) : ?> -
                        <?php elseif($v->logbook != NULL) : ?> 
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadLogbook<?= $v->id?>">
                        <span class="glyphicon glyphicon-ok"></span>
                    </button>
                    <?php endif; ?>
                </td>
                <td class='text-center'>
                    <?php if ($v->belanja==NULL) : ?> -
                        <?php elseif($v->belanja != NULL) : ?>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadBelanja<?= $v->id?>">
                        <span class="glyphicon glyphicon-ok"></span>
                    </button>
                    <?php endif; ?>
                </td>
                
                <td class='text-center'>
                    <?php if ($v->luaran==NULL) : ?> - 
                        <?php elseif($v->luaran != NULL) : ?> 
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadLuaran<?= $v->id?>">
                        <span class="glyphicon glyphicon-ok"></span>
                    </button>
                    <?php endif; ?>
                </td>
                <td>
                <form style="display:inline-block;" method="post" action="<?= base_url('admin/pengabdian/editAkhir') ;?>/<?= $v->id; ?>">
                                    <input type='hidden' name="jadwal" value=<?=$id?>>
                                    <button type="Submit" class="btn btn-info">
                                       Detail & Edit
                                    </button>
                                </form>
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