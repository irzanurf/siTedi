

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Daftar Ketua Departemen
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Daftar Ketua Departemen
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class='row'>
    

    
    </div>

    <div class="row">
        <div class="col-lg-12">
        <section class="content">
        
        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addForm"> <i class="fa fa-plus"></i> Tambah</button>
        
        <table class="table">
            <tr>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Departemen / Prodi</th>
                <th>Hapus</th>

            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <tr>
                <td><?= $v->nip?></td>
                <td><?= $v->namakadep?></td>
                <td><?= $v->dep?></td>
                
            <td>
                <form method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?');" action=<?= base_url('admin/dashboard/hapusKadep');?>>
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
                <form role="form" method="post" action="<?= base_url('admin/dashboard/addKadepToDb');?>">
                    
                <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Tambah Kadep</label>
                                <div class="col-lg-8">
                                <div class="form-group"><label>Nama</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                <select class="form-control selectpicker" name="nip" data-live-search='true'>
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($dosen as $ds) {
                                        ?>
                                        <option value ="<?php echo $ds->nip; ?>"><?php echo $ds->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                </select></div><br>
                                <div class="form-group"><label>Departemen / Prodi</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                <select class="form-control" name="dep" id="dep" required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($departemen as $dep) {
                                            ?>
                                            <option value="<?php echo $dep->id; ?>"><?php echo $dep->departemen; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    </div>
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

