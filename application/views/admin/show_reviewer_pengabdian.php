

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
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
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
                <th>List Proposal</th>
                <th>Action</th>
               
            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->nip?></td>
                <td><?= $v->nama ?></td>
                <td>
                <a href="<?=base_url('admin/pengabdian/excelReviewer');?>/<?=$v->nip?>">
                                    <button   class="btn btn-info"> <img src="<?= base_url('assets/excel.png');?>" alt="excel" width="30" height="30"/> List Proposal yang direview </button>
                                    </a>
                
                </td>
                <td >
                            
                                <form method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Reviewer?');" action=<?= base_url('admin/pengabdian/hapusReviewer');?>>
                                    <input type='hidden' name="nip" value="<?= $v->nip ?>">
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
                <form role="form" method="post" action="<?= base_url('admin/pengabdian/tambahReviewer');?>">
                    
                <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Tambah Reviewer</label>
                                <div class="col-lg-8">
                                <select class="form-control selectpicker" name="reviewer" data-live-search='true' required="">
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
<script type="text/javascript">
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
        });
    </script>
