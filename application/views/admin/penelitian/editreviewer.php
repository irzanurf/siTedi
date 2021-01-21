
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Form Pengisian Penelitian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Pengisian Penelitian
                </li>
            </ol>
        </div>
    </div>
<div class="row">
                    <div class="col-lg-12">
                    
                    <section class="content">
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Judul Penelitian</label>
                        <div class="col-lg-8">
                            <p><?=$prop->judul;?></p>
                        </div>
                    </div>
                    <label>Ketua Penelitian</label>
                    <div class='form-group row'>
                        <p class="col-lg-4">Nama Lengkap</p>
                        <div class="col-lg-8">
                            <p><?=$dosen->nama;?></p>
                        </div><br>
                        <p class="col-lg-4">NIP/NIDN</p>
                        <div class="col-lg-8">
                            <p><?=$dosen->nip;?></p>
                        </div><br>
                        <p class="col-lg-4 ">Program Studi</p>
                        <div class="col-lg-8">
                            <p><?=$dosen->program_studi;?></p>
                        </div>
                    </div>
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Lama Penelitian</label>
                        <div class="col-lg-8">
                            <p><?=$prop->lama_pelaksanaan;?></p>
                        </div>
                    </div> 
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Biaya Penelitian</label>
                        <div class="col-lg-8">
                            <p>Rp <?=  number_format($prop->biaya,2,',','.');?></p>
                        </div>
                    </div>
                    <form action="<?=base_url('admin/penelitian/submitAssignEdit')?>" method="post">
                    
                    <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Assign reviewer</label>
                                <div class="col-lg-8">
                                <select class="form-control" name="reviewer">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($reviewer as $ds) {
                                        ?>
                                        <option value ="<?php echo $ds->nip; ?>" <?php echo ($ds->nip==$assigned->reviewer) ? "selected='selected'" : "" ?> ><?php echo $ds->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                    </div>
                    <div class="form-group ">
                                <label class="col-lg-4 col-form-label">Assign reviewer 2</label>
                                <div class="col-lg-8">
                                <select class="form-control" name="reviewer2">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($reviewer as $ds) {
                                        ?>
                                        <option value ="<?php echo $ds->nip; ?>" <?php echo ($ds->nip==$assigned->reviewer2) ? "selected='selected'" : "" ?> ><?php echo $ds->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                    </div>

                    
                    <input type="hidden" name="id" value="<?= $prop->id;?>">
                    
                    
                    <div class='form-group'>
                        <div class="row" >
                        <div class="col-lg-1"></div>
                        <div class="col-lg-11">
                            <iframe src="<?= base_url('assets/prop_penelitian');?>/<?=$prop->file?>" width="93%" height="400px" >
                            </iframe>
                        </div>
                        <div class="col-lg-1"></div>
                    
                    </div>
                    </div>

                    
                    <div>
                        <button class='btn btn-primary' type="submit">Assign</button>
                    </div>
                    </form> 
                    
                    
                   
                    
                    </section>
                    

                    
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
