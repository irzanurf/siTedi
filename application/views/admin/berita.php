<!-- <!DOCTYPE html>
<html>
<head>
    <title>Post Berita</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
    
     
    
</body>
</html> -->




<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-4">
           
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Berita
                </li>
            </ol>
            <div class="container">
        <div class="col-md-12 col-md-offset-0">
            <h2>Pengumuman</h2><hr/>
            <form action="<?= base_url('admin/pengabdian/saveBerita');?>" method="post" enctype="multipart/form-data">
            <div class="error">
<?= validation_errors() ?>
<?= $this->session->flashdata('error') ?>
</div>

                <textarea id="ckeditor" name="berita" class="form-control" value=<?= $berita?> ></textarea><br/>
                
                <button class="btn btn-primary btn-lg" type="submit">Post Berita</button>
            </form>
        </div>
         
    </div>
        </div>
    </div>
    <!-- /.row -->

    
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<script src="<?= base_url('assets/jquery/jquery-2.2.3.min.js');?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js');?>"></script>
    <script src="<?= base_url('assets/ckeditor/ckeditor.js');?>"></script>
    <script type="text/javascript">
      $(function () {
        CKEDITOR.replace('ckeditor');
      });
    </script>

<!-- Morris Charts JavaScript -->
<script src="<?= base_url('assets/template/js/plugins/morris/raphael.min.js');?>"></script>
<script src="<?= base_url('assets/template/js/plugins/morris/morris.min.js');?>"></script>
<script src="<?= base_url('assets/template/js/plugins/morris/morris-data.js');?>"></script>

</body>

</html>
