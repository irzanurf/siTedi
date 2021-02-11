

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Pendanaan
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Pendanaan
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addForm"> <i class="fa fa-plus"></i> Tambah</button>
        <section class="content">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Pendanaan</th>
                <th>Tahun</th>
                <th>Edit</th>
                <th>hapus</th>
            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->sumberdana?></td>
                <td><?= $v->tgl?></td>
                <td>
                <form method="post" ;?>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#a<?= $v->id?>">
                                        Edit
                                    </button>
                                    
                                </form>
                </td>
                <td>
                <form method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Sumber Dana?');" action=<?= base_url('admin/dashboard/deletesd');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn btn-danger">
                                        Hapus
                                    </button>
                                    
                                </form>
                </td>
                
            </tr>
            <?php } ?>
        </table>
        </section>
        

        <!-- Modal isi form -->
        <div class="modal fade" id="addForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url('admin/dashboard/addsd');?>">
                    <div class="form-group">
                        <label>Nama Sumber Dana</label>
                        <input type="text" class="form-control" name="sumberdana" >
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            
            </div>
        </div>
        </div>

<!-- Modal isi form -->
        
<?php 
                    foreach ($view as $v) :
                        $id=$v->id;
                     ?>

                    <!-- Modal -->
                    <div class="modal fade" id="a<?= $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form role="form" method="post" action="<?= base_url('admin/dashboard/editsd');?>">  
                <div class="form-group">
                        <label>Nama Luaran</label>
                        <input type="hidden" class="form-control" name="id" value=<?=$id?>  >
                        <input type="text" class="form-control" name="sumberdana" value="<?= $v->sumberdana ?>" >
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

                            
                        </div>
                        
                        </div>
                    </div>
                    </div>

                    <?php endforeach;?>
        

        
        
                    </div>

        
        </div>
        

        
        </div>
    </div>
        
        

            

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


<script type="text/javascript">
$( ".selector" ).datepicker({
  dateFormat: "dd/mm/yyyy"
}); 
</script>

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
