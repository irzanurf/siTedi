
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Form Pengisian Pengabdian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('kadep/kadep');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Pengisian Pengabdian
                </li>
            </ol>
        </div>
    </div>
<div class="row">
                    <div class="col-lg-12">
                    
                    <section class="content">
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Judul Pengabdian</label>
                        <div class="col-lg-8">
                            <p><?=$prop->judul;?></p>
                        </div>
                    </div>
                    <label>Ketua Pengabdian</label>
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
                        <label class="col-lg-4 col-form-label">Lama Pengabdian</label>
                        <div class="col-lg-8">
                            <p><?=$prop->lama_pelaksanaan;?></p>
                        </div>
                    </div> 
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Biaya Pengabdian</label>
                        <div class="col-lg-8">
                            <p>Rp <?=  number_format($prop->biaya,2,',','.');?></p>
                        </div>
                    </div>
                    <form action="<?=base_url('kadep/kadep/submitassignreviewerPengabdian')?>" method="post">
                    <div class="form-group">
                                    <input type="hidden" class="form-control" name="jadwal" value=<?= $jadwal?>  >
                                </div>
                    <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Assign reviewer 1</label>
                                <div class="col-lg-8">
                                <select class="form-control" id="selectpicker1" name="reviewer" data-live-search="true">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($reviewer as $ds) {
                                        ?>
                                        <option value ="<?php echo $ds->nip; ?>"><?php echo $ds->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                                
                    </div>
                    
                    <div class='form-group '>
                    <label class="col-lg-4 col-form-label">Assign reviewer 2</label>
                                <div class="col-lg-8">
                                <select class="form-control" id="selectpicker2" name="reviewer2" data-live-search="true">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($reviewer as $ds) {
                                        ?>
                                        <option value ="<?php echo $ds->nip; ?>"><?php echo $ds->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                    </div>
                    
                    <input type="hidden" name="id" value="<?= $prop->id;?>">
                
                    <label>File proposal pengabdian</label>
                        <div class="form-group row" >
                        
                        <div class="col-lg-12">
                            <iframe src="<?= base_url('assets/prop_pengabdian');?>/<?=$prop->file?>" width="93%" height="400px" >
                            </iframe>
                        </div>
                    
                    </div>
                    <?php 
                    if($mitra!=null) : ?>
                    <?php if($mitra->file_persetujuan!="") : ?>
                    <label >File surat persetujuan mitra </label>
                        <div class="form-group row" >
                        
                        <div class="col-lg-12">
                            <iframe src="<?= base_url('assets/suratmitra');?>/<?=$mitra->file_persetujuan?>" width="93%" height="400px" >
                            </iframe>
                        </div>
                        <!-- <div class="col-lg-1"></div> -->
                    
                    <!-- </div> -->
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>

                    
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

    <script type="text/javascript">
    $(document).ready(function() {
     $("#selectpicker1").selectpicker();
     $("#selectpicker2").selectpicker();
    });
    </script>

    
