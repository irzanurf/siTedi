
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?= base_url('dosen/pengabdian/');?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="dosen/pengabdian/pengisianform"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Form Pengajuan Mitra
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Pengajuan Mitra
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                    <?= form_open_multipart('dosen/pengabdian/updateProposal');?>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $proposal->id?>  >
                                </div>
                                <div class="form-group">
                                    <label>Jenis Pengabdian</label>
                                    <select class="form-control" name="skema_pengabdian" id="skema_pengabdian">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($skema as $sd) {
                                            ?>
                                            <option value="<?php echo $sd->id; ?>"<?php echo ($sd->id==$proposal->id_skema) ? "selected='selected'" : "" ?>><?php echo $sd->jenis_pengabdian; ?> - <?php echo $sd->tgl; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Judul Pengabdian</label>
                                    <input class="form-control" name="judul" <?php echo "value=\"" . $proposal->judul . "\""; ?> >
                                </div>

                                <div class="form-group">
                                    <label>Abstrak</label>
                                    <textarea class="form-control" rows="3" name="abstrak"  ><?= $proposal->abstrak?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input class="form-control" name="lokasi" <?php echo "value=\"" . $proposal->lokasi . "\""; ?> placeholder="Kelurahan, Kota, Provinsi" >
                                </div>

                                <div class="form-group">
                                    <label>Lama Pelaksanaan</label>
                                    <div class="form-group input-group">
                                    <input type="text" class="form-control" name="bulan" value=<?= $proposal->lama_pelaksanaan?>>
                                    <span class="input-group-addon">bulan</span>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label>Biaya</label>
                                    <div class="form-group input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="text" class="form-control" name="biaya" value=<?= number_format($proposal->biaya,0,',','.')?>  >
                                    <span class="input-group-addon">,00</span>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label>Sumber Dana</label>
                                    <select class="form-control" name="sumberdana" id="sumberdana">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($sumberdana as $sd) {
                                            ?>
                                            <option value="<?php echo $sd->id; ?>" <?php echo ($sd->id==$proposal->id_sumberdana) ? "selected='selected'" : "" ?>><?php echo $sd->sumberdana; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <h3>Keterangan Mitra</h3>
                                <div class="form-group">
                                    <label>Nama Instansi</label>
                                    <input class="form-control" name="instansi" <?php echo "value=\"" . $mitra->nama_instansi . "\""; ?> >
                                </div>
                                <div class="form-group">
                                    <label>Penanggung Jawab</label>
                                    <input class="form-control" name="pj"<?php echo "value=\"" . $mitra->penanggung_jwb . "\""; ?> >
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input class="form-control" name="no_telp" value=<?= $mitra->no_telp?> >
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" value=<?= $mitra->email?> >
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input class="form-control" name="alamat" <?php echo "value=\"" . $mitra->alamat . "\""; ?> >
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" id="username" name="username" value=<?=$mitra->username?> placeholder="Masukkan username untuk mitra">
                                    <span id="username_result" style='color:red'></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan password untuk mitra" >
                                </div>

                                <h3>File Proposal</h3>
                                <div>
                                    <iframe src="<?= base_url('assets/prop_pengabdian');?>/<?=$proposal->file?>" width="93%" height="400px" >
                                    </iframe>
                                    <div class="form-group">
                                        <label>Upload Proposal</label>
                                        <input type="file" class="form-control" name="file_prop"  >
                                    </div>
                                </div>
                                <button type="submit" id='submit' class="btn btn-primary">Edit</button>
                                
                            <?= form_close(); ?>
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

    <script type="text/javascript"> 
        $(document).ready(function(){
            $('#username').change(function(){
            var username = $('#username').val();
            if(username != ''){
                $.ajax({
                    url:"<?php echo base_url('dosen/Pengabdian/checkUsername');?>",
                    method:"post",
                    data:{username:username},
                    dataType: 'json',
                    success:function(data){
                        if(data=="Username tersedia"){
                            $('#submit').prop('disabled',false);
                            $('#username_result').remove();
                        }else{
                            $('#username_result').html(data);
                            $('#submit').prop('disabled',true);
                        }
                        //console.log(data);
                    }
                });
            }
            });
            });
    </script>

</body>

</html>
