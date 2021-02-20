<head>
    <link rel="stylesheet" href="<?= base_url('assets/profile/assets/css/Profile-Edit-Form-1.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/profile/assets/css/Profile-Edit-Form.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/profile/assets/css/styles.css');?>">
    
</head>
</head>
    <body>
    <div class="row">
                    <div class="col-lg-11" style="float:none;margin:auto;">
                        <h1 class="page-header">
                            &nbsp; Welcome <small>
                            <?php 
                        			foreach($nama as $v) { ?>
								<?= $v->nama ?>
								<?php }?>
								</small>
                        </h1>
                        
                    </div>

    </div><br>
    
                    <div class="row">
        <div class="col-lg-11" style="float:none;margin:auto;">
            
        <?php
    $pengumuman=$berita[0]-> berita;
    $new = str_replace(" ","",$pengumuman);
    if($new==""){

    }
    else{
    ?>
    <table class="table" >
                       <thead>
                           <tr>
                               <th><center><h1>Pengumuman</h1></center></th>
                           </tr>
                       </thead>
                       <tr>
                               <td><?php echo $berita[0]-> berita;}?></td>
                           </tr>
    </table>
        
		<br/>
    
            </div>
        </div>
         
        <div class="col-lg-11" style="float:none;margin:auto;">
        <div class="row">
        
        </div></br>
        <div class="panel panel-success">
			<div class="panel-heading">
            <h1><center>Daftar Pengajuan Proposal</center></h1>
			</div>
			
        <div class="panel-body">
        <form>
                       <table class="table" >
                       <thead>
                           <tr>
                               <th>Tanggal Upload</th>
                               <th>Jenis Skema Penelitian</th>
                               <th>Judul Proposal</th>
                               <th>Status</th>
                           </tr>
                       </thead>
                           <?php 
                           $no = 1;
                           foreach($view as $v) { ?>
                           <tr>
                               <td align="center"><?= $v->tgl_upload?></td>
                               <td align="center"><?= $v->jenis?></td>
                               <td align="center"><?= $v->judul?></td>
                               
   
                               
                               
   
                               <td align="center">
                               <?php if($v->status=="5" ) : ?>
                                   <button type="button" class="btn-sm btn-danger" dissabled>
                                           Rejected
                                       </button>
   
                               <?php elseif($v->status=="2") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                           Accepted
                                       </button>
                                       <?php elseif($v->status=="11" || $v->status=="12") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                           Reviewing
                                       </button>
   
                                       <?php elseif($v->status=="2") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                           Monitoring & Evaluasi
                                       </button>
   
                                       <?php elseif($v->status=="3") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                           Laporan Akhir
                                       </button>
                                  
                               <?php else : ?>
                                   <button type="button" class="btn-sm btn-default" dissabled>
                                           Waiting
                                       </button>
                               <?php endif;?>
                               
                               
                               </td>
   
   
                           </tr>
                           <?php } ?>
                       </table>
   </div>
   </div>
            <!-- <div class="form-row profile-row">
                <div class="col-md-4 relative">
                    <div class="avatar">
                        <div class="text-center center"><img src="<?= base_url('assets/profile/assets/profile.png');?>" alt="profile" width="200" height="200" /></div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h1>Profile</h1>
                    
                    <hr>
                    <?php 
                        foreach($nama as $v) { ?>
                    <div class="form-group"><label>Nama</label><input class="form-control" type="text" name="nama" value="<?= $v->nama ?>" readonly></div>
                    <div class="form-group"><label>Golongan</label><input class="form-control" type="text" name="nama" value="<?= $v->golongan ?>" readonly></div>
                    <div class="form-group"><label>Jabatan</label><input class="form-control" type="text" name="program_studi" value="<?= $v->jabatan ?>" readonly></div>
                    <div class="form-group"><label>Pendidikan</label><input class="form-control" type="text" name="telp" value="<?= $v->pendidikan ?>"  readonly></div>
                    <div class="form-group"><label>Tahun Lulus</label><input class="form-control" type="text" name="email" value="<?= $v->th_lulus ?>" readonly></div>
                    <div class="form-group"><label>Kepakaran</label><input class="form-control" type="text" name="nama" value="<?= $v->kepakaran ?>" readonly></div>
                    <div class="form-group"><label>Status Bekerja</label><input class="form-control" type="text" name="nama" value="<?= $v->status_bekerja ?>" readonly></div>
                    <div class="form-group"><label>Jenis Pegawai</label><input class="form-control" type="text" name="program_studi" value="<?= $v->jenis ?>" readonly></div>
                    <div class="form-group"><label>Status Kepegawaian</label><input class="form-control" type="text" name="email" value="<?= $v->status_kepegawaian ?>" readonly></div>
                    <div class="form-group"><label>Unit ES II</label><input class="form-control" type="text" name="program_studi" value="<?= $v->fakultas ?>" readonly></div>
                    <div class="form-group"><label>Unit ES III</label><input class="form-control" type="text" name="telp" value="<?= $v->departemen ?>"  readonly></div>
                    <div class="form-group"><label>Unit ES IV</label><input class="form-control" type="text" name="program_studi" value="<?= $v->program_studi ?>" readonly></div>
                    <div class="form-group"><label>Telephone</label><input class="form-control" type="text" name="telp" value="<?= $v->no_telp ?>"  readonly></div>
                    <div class="form-group"><label>Email</label><input class="form-control" type="text" name="email" value="<?= $v->email ?>" readonly></div>
                    <hr>
                    
                    <?php }?>
					
					
                </div>
            </div> -->
        </form>
    </div>
    <script src="<?= base_url('assets/profile/assets/js/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/profile/assets/bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?= base_url('assets/profile/assets/js/Profile-Edit-Form.js');?>"></script>
</body>