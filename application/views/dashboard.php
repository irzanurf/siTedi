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
                            if (!empty($nama)){
                        			foreach($nama as $v) { ?>
								<?= $v->nama ?>
								<?php }}?>
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
                                
                                <?php elseif($v->status=="0") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                           Submited
                                       </button>
                                
                                <?php elseif($v->status=="1") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                           Submited
                                       </button>

                               <?php elseif($v->status=="2") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                           Accepted
                                       </button>
                                       <?php elseif($v->status=="11" || $v->status=="12") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                           Reviewing
                                       </button>

                                       <?php elseif($v->status=="13") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                   Reviewing
                                       </button>
   
                                       <?php elseif($v->status=="3") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                   Monev
                                       </button>

                                       <?php elseif($v->status=="4") : ?>
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
                           <?php 
                           foreach($anggota as $v) { ?>
                           <tr>
                               <td align="center"><?= $v->tgl_upload?></td>
                               <td align="center"><?= $v->jenis?></td>
                               <td align="center"><?= $v->judul?></td>
                               
                               <td align="center">
                               <?php if($v->status=="5" ) : ?>
                                   <button type="button" class="btn-sm btn-danger" dissabled>
                                           Rejected
                                       </button>
                                
                                <?php elseif($v->status=="0") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                           Submited 
                                       </button>
                                
                                <?php elseif($v->status=="1") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                           Submited 
                                       </button>

                               <?php elseif($v->status=="2") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                           Accepted
                                       </button>
                                       <?php elseif($v->status=="11" || $v->status=="12") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                           Reviewing
                                       </button>

                                       <?php elseif($v->status=="13") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                   Reviewing 
                                       </button>
   
                                       <?php elseif($v->status=="3") : ?>
                                   <button type="button" class="btn-sm btn-success" dissabled>
                                   Monev 
                                       </button>

                                       <?php elseif($v->status=="4") : ?>
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
            
        </form>
    </div>
    <script src="<?= base_url('assets/profile/assets/js/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/profile/assets/bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?= base_url('assets/profile/assets/js/Profile-Edit-Form.js');?>"></script>
</body>