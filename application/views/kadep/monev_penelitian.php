

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Monitoring & Evaluasi
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('kadep/kadep/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Monitoring & Evaluasi
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
                <th>Ketua Penelitian</th>
                <th class='text-center'>Logbook</th>
                <th class='text-center'>Laporan Kemajuan</th>
                <th class='text-center'>Laporan Belanja 70%</th>
                <th class='text-center'>Catatan Pengusul</th>
                <th class='text-center'>Komentar Reviewer 1</th>
                <th class='text-center'>Komentar Reviewer 2</th>
                <th class='text-center'>Action</th>
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
                <td>
                <?php if ($v->catatan==NULL) : ?> - 
                    <?php elseif($v->file3 != NULL) : ?> <?= $v->catatan?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($v->cr_monev==NULL) : ?> -
                        <?php elseif($v->cr_monev != NULL) : ?> <?= $v->cr_monev?>
                    
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($v->cr_monev2==NULL) : ?> -
                        <?php elseif($v->cr_monev2 != NULL) : ?> <?= $v->cr_monev2?>
                    
                    <?php endif; ?>
                </td>
                
                <td>
                <form style="display:inline-block;" method="post" action="<?= base_url('kadep/kadep/detailMonevPenelitian') ;?>/<?= $v->id_proposal; ?>">
                                    <input type='hidden' name="jadwal" value=<?=$id?>>
                                    <button type="Submit" class="btn btn-info">
                                       Detail
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
