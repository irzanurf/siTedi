

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
    <a href="<?=base_url('admin/penelitian/laporanAkhirWord');?>/<?= $id ?>"><button class='btn btn-info'><img src="<?= base_url('assets/word.png');?>" alt="word" width="30" height="30"/> List Laporan Akhir Lengkap</button></a>
    <a href="<?=base_url('admin/penelitian/laporanAkhirExcel');?>/<?= $id ?>"><button class='btn btn-success'><img src="<?= base_url('assets/excel.png');?>" alt="excel" width="30" height="30"/> List Laporan Akhir Lengkap</button></a>

    <div class="row">
        <div class="col-lg-12">
        
        
        <section class="content">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Tgl Upload</th>
                <th>Judul Proposal</th>
                <th>Ketua Penelitian</th>
                <th class='text-center'>Laporan Final</th>
                <th class='text-center'>Logbook</th>
                <th class='text-center'>Laporan Belanja 100%</th>
                <th class='text-center'>Luaran</th>
                <th class='text-center'>Action</th>
            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { 
                if(($v->tgl)=="0000-00-00"){
                    $tgl="-";
                }
                else{
                $tgl = date('d-m-Y', strtotime($v->tgl));
                }?>
            <?php if ($v->status > 1 && $v->status < 5) : ?>
            
            <tr>
                <td><?= $no++?></td>
                <td><?= $tgl?></td>
                <td><?= $v->judul?></td>
                <td><?= $v->nama ?></td>
                <td class='text-center'>
                    <?php if ($v->file1==NULL) : ?> -
                        <?php elseif($v->file1 != NULL) : ?>
                    <button type="button" class="btn btn-success" >
                    <span class="glyphicon glyphicon-ok"></span>
                    </button>
                    <?php endif; ?>
                </td>
                <td class='text-center'>
                    <?php if ($v->file2==NULL) : ?> -
                        <?php elseif($v->file2 != NULL) : ?>
                    <button type="button" class="btn btn-success" >
                    <span class="glyphicon glyphicon-ok"></span>
                    </button>
                    <?php endif; ?>
                </td>
                <td class='text-center'>
                    <?php if ($v->file3==NULL) : ?> -
                        <?php elseif($v->file3 != NULL) : ?> 
                    <button type="button" class="btn btn-success" >
                        <span class="glyphicon glyphicon-ok"></span>
                    </button>
                    <?php endif; ?>
                </td>
                <td class='text-center'>
                    <?php if ($v->file4==NULL) : ?> - 
                        <?php elseif($v->file4 != NULL) : ?>
                    <button type="button" class="btn btn-success" >
                        <span class="glyphicon glyphicon-ok"></span>
                    </button>
                    <?php endif; ?>
                </td>
                <td>
                <form style="display:inline-block;" method="post" action="<?= base_url('admin/penelitian/editAkhir') ;?>/<?= $v->id; ?>">
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

