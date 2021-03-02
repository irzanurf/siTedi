
        <body>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12" style="float:none;margin:auto;">
                        <h1 class="page-header">
                            Welcome <small>
                            <?php 
                            if (!empty($nama)){
                        			foreach($nama as $v) { ?>
								<?= $v->nama ?>
								<?php }}?>
                        </h1>
                        
                    </div>
                    </div><br>
                
                <!-- /.row -->
                <div class="row">
                <div class="col-lg-12" style="float:none;margin:auto;">
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
    </div>
    </div>
    
    
        <div class="row">
        <div class="col-lg-12" style="float:none;margin:auto;">
        
        </br>
        <section class="content">
        <table class="table">
        <col style='width:5%'>
        <col style='width:55%'>
        <col style='width:20%'>
        <col style='width:20%'>
        <h1><center>Daftar Permohonan</center></h1>
            <tr>
                <th>No</th>
                <th>Judul Proposal</th>
                <th>Instansi Mitra</th>
                <th>Status</th>
                
            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
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
                <!-- Modal -->
        
            <?php } ?>
            <?php 
            foreach($anggota as $v) { ?>
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
                <!-- Modal -->
        
            <?php } ?>
        </table>
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

    <!-- Morris Charts JavaScript -->
    <script src="<?= base_url('assets/template/js/plugins/morris/raphael.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/morris/morris.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/morris/morris-data.js');?>"></script>

</body>

</html>
