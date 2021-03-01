

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Mitra <small>Proposal Approval</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
               

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                             <?php echo $this->session->flashdata('message');?>
                                <h3 class="panel-title">Detail Proposal</h3>
                            </div>
                            <div class="panel-body">
                            <section>
                                <table class="table">
                                    <tr>
                                        <th>Judul Proposal</th>
                                        <td> <?= $proposal->judul;?> </td>
                                    </tr>
                                    <tr>
                                        <th>Abstrak</th>
                                        <td> <?= $proposal->abstrak;?> </td>
                                    </tr>
                                    <tr>
                                        <th>Pengaju Proposal</th>
                                        <td> <?= $dosen->nama;?> </td>
                                    </tr>
                                    <tr>
                                        <th>Lokasi</th>
                                        <td> <?= $proposal->lokasi;?> </td>
                                    </tr>
                                    <tr>
                                        <th>Lama Pelaksanaan</th>
                                        <td> <?= $proposal->lama_pelaksanaan;?> </td>
                                    </tr>
                                    <tr>
                                        <th>Biaya</th>
                                        <td> Rp <?= number_format($proposal->biaya,2,',','.');?> </td>
                                    </tr>
                                    
                                </table>

                                <iframe src="<?= base_url('assets/prop_pengabdian');?>/<?=$proposal->file?>" width="93%" height="400px" >
                            </iframe>
                            <?php if($mitra->status==0){?>
                        
                                <?php echo form_open_multipart('mitra/verifikasi/approval') ?>
                                        <div class="form-group">
                                            <label>Upload Surat Mitra</label>
                                            <input type="file" accept="application/pdf" class="form-control" name="file"   >
                                        </div>
                                <div class="col-3 d-inline-block">
                                
                                        <input type="hidden" name="mitra" value="<?= $mitra->id; ?>">
                                        <button type="submit" class="btn-sm btn-success tombol-cetak mr-4 ml-3" name="submit" value="submit" data-toggle="tooltip" data-placement="top" title="DISETUJUI" onclick="return confirm('Setujui kerjasama dengan pengabdian ini?');">Setujui Kerjasama Pengabdian
                                        </button>
                                </div>
                                <?= form_close() ?>
                                <?php
                                } else { ?>
                                <iframe src="<?= base_url('assets/suratmitra');?>/<?=$mitra->file_persetujuan?>" width="93%" height="400px" >
                            </iframe>
                                    <div class="col-3 d-inline-block">
                                        <span class="badge badge-info">Proposal telah disetujui</span>
                                      
                                    </div>
                                <?php }?>

                                
                            
                            </section>
                                
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
    <script src="<?= base_url('assets/template/');?>js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets/template/');?>js/bootstrap.min.js"></script>

    <!-- sweet alert plugin -->
    <script src="<?= base_url(); ?>assets/js/plugins/sweetalert/sweetalert2.all.min.js"></script>

</body>

</html>
