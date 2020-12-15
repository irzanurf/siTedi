

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Daftarkan Reviewer
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Daftarkan Reviewer
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
                <th>NIP/NIDN</th>
                <th>Nama</th>
                <th>Action</th>
               
            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->nip?></td>
                <td><?= $v->nama ?></td>
                <td >
                            
                                <form method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Reviewer?');" action=<?= base_url('admin/penelitian/hapusReviewer');?>>
                                    <input type='hidden' name="nip" value="<?= $v->nip ?>">
                                    <button type="submit" class="btn-sm btn-danger">
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
                <form role="form" method="post" action="<?= base_url('admin/penelitian/tambahReviewer');?>">
                    
                <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Tambah Reviewer</label>
                                <div class="col-lg-8">
                                <select class="form-control" name="reviewer">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($dosen as $ds) {
                                        ?>
                                        <option value ="<?php echo $ds->nip; ?>"><?php echo $ds->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
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


</body>

</html>
