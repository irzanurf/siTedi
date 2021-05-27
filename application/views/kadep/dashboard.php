
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Dashboard</h4>
                            <h1 class="card-category">  Welcome <small> Ketua 
                            <?php if (!empty($nama)){
                        			echo $nama;
								}?> </small>
</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="panel panel-warning">
                                    <div class="panel-heading"><h2><center>Total data masuk semua departemen<h2><center></div>
                            </div>
                                <div class="col-md-6">
                                    <div class="panel panel-info">
                                    <div class="panel-heading"><h2><center>Jadwal Penelitian<h2><center></div>
                                <div class="panel panel-warning">
                                <div class="panel-heading"><h3><center>
                                 <?php 
                        			foreach($jadwal_penelitian as $v) { 
                                        $mulai = date('d-m-Y', strtotime($v->tgl_mulai)); 
                                        $selesai = date('d-m-Y', strtotime($v->tgl_selesai));?>
								    <?= $mulai ?> sampai <?= $selesai ?> (<?= $v->keterangan ?>)
								    <?php }?></center></h3></div>
 
                                    <div class="panel-body">
 
                                    <p style="font-size:20px">Jumlah Pengajuan masuk = <?php echo $prop_penelitian  ?> </p><br>

                                    <p style="font-size:20px">Jumlah Laporan Monev masuk = <?php echo $monev_penelitian  ?> </p><br>

                                    <p style="font-size:20px">Jumlah Laporan Akhir masuk = <?php echo $akhir_penelitian  ?> </p><br>

                                   
                                    </div>
                                    </div>
 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="panel panel-success">
 
                                <div class="panel-heading"><h2><center>Jadwal Pengabdian<h2><center></div>
                                <div class="panel panel-warning">
                                <div class="panel-heading"><h3><center>
                                 <?php 
                                foreach($jadwal_pengabdian as $v) { 
                                    $mulai = date('d-m-Y', strtotime($v->tgl_mulai)); 
                                    $selesai = date('d-m-Y', strtotime($v->tgl_selesai));?>
                                <?= $mulai ?> sampai <?= $selesai ?> (<?= $v->keterangan ?>)
                                <?php }?></center></h3></div>

                                <div class="panel-body">

                                <p style="font-size:20px">Jumlah Permohonan masuk = <?php echo $prop_pengabdian  ?></p><br>

                                <p style="font-size:20px">Jumlah Laporan Akhir masuk = <?php echo $akhir_pengabdian  ?> </p><br>

                                </div>

                                </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>