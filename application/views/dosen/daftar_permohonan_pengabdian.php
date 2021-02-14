
        <div id="page-wrapper">

<div class="container-fluid1">

    <!-- Page Heading -->
    <div class="row">
            <h1 class="page-header">
                Daftar Permohonan Proposal
            </h1>
            <ol class="breadcrumb">
               
                <li class="active">
                    <i class="fa fa-edit"></i> Daftar permohonan
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
        <col style='width:20%'>
        <col style='width:20%'>
            <tr>
                <th>No</th>
                <th>Judul Proposal</th>
                <th>Instansi Mitra</th>
                <th>Status</th>
                
            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <?php if ($v->nip==$this->session->userdata('user_name')) : ?>
            <?php if($v->status != NULL) : ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->judul?></td>
                <td><?= $v->nama_instansi ?></td>
                <td>
                <?php if($v->status=='ACCEPTED') :?>
                <span class></span><span type='button' class="btn-sm btn-success">Approved</span>
                <?php elseif($v->status=='REJECTED'):?>
                <span type='button' class="btn-sm btn-danger">Rejected</span>
                <?php else:?>
                <span type='button' class="btn-sm btn-warning">Processing</span>
                <?php endif;?>
                </td>
               
            </tr>
            <?php endif; ?>
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
