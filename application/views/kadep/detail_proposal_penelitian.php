
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Proposal Penelitian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('kadep/kadep');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Proposal Penelitian
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
                    <label>Anggota Penelitian</label>
                    <div class='form-group row'>
                    <?php 
                    $no = 1;
                    foreach($anggota_dsn as $dsn){?>
                        <p class="col-lg-4">Anggota Dosen <?=$no++?></p>
                        <div class="col-lg-8">
                            <p><?=$dsn->nama;?></p>
                        </div><br>
                    
                    <?php } ?>
                        
                    </div>

                    <label>Luaran</label>
                    <div class='form-group row'>
                    <?php 
                    $no = 1;
                    foreach($luaran as $l){?>
                        <p class="col-lg-4">Luaran <?=$no++?></p>
                        <div class="col-lg-8">
                            <p><?=$l->luaran;?></p>
                        </div><br>
                    
                    <?php } ?>
                        
                    </div>

                    <label>Anggota Mahasiswa</label>
                    <div class='form-group row'>
                    <?php 
                    $no = 1;
                    foreach($mahasiswa as $mhs){?>
                        <p class="col-lg-4">Anggota Mahasiswa <?=$no++?></p>
                        <div class="col-lg-8">
                            <p><?=$mhs->nama;?></p>
                        </div><br>
                    
                    <?php } ?>
                        
                    </div>

                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Lama Penelitian</label>
                        <div class="col-lg-8">
                            <p><?=$prop->lama_pelaksanaan;?></p>
                        </div>
                    </div> 
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Pendanaan</label>
                        <div class="col-lg-8">
                            <p><?=$sumberdana;?></p>
                        </div>
                    </div> 
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Biaya Penelitian</label>
                        <div class="col-lg-8">
                            <p>Rp <?=  number_format($prop->biaya,2,',','.');?></p>
                        </div>
                    </div> 

                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Mitra</label>
                        <div class="col-lg-8">
                            <p><?=$prop->mitra;?></p>
                        </div>
                    </div> 


                    <div class="row" >
                        <div class="col-lg-1"></div>
                        <div class="col-lg-11">
                            <iframe src="<?= base_url('assets/prop_penelitian');?>/<?=$prop->file?>" width="93%" height="400px" >
                            </iframe>
                        </div>
                        <div class="col-lg-1"></div>
                    
                    </div>
                    
                    
                    
                    </section>

                    <!-- <input type="text" name="input1" id="input1" value="5">
<input type="text" name="input2" id="input2" value=""> <a href="javascript: void(0)" onClick="calc()">Calculate</a>

<input type="text" name="output" id="output" value=""> -->
                    

                    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

