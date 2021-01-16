


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome <small>
								<?= $nama->nama ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="form-row profile-row">
                <div class="col-md-4 relative">
                    <div class="avatar">
                        <div class="text-center center"><img src="<?= base_url('assets/profile/assets/profile.png');?>" alt="profile" width="200" height="200" /></div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h1>Profile</h1>
                    
                    <hr>
                
                    <div class="form-group"><label>Nama</label><input class="form-control" type="text" name="nama" value="<?= $nama->nama ?>" readonly></div>
                    <div class="form-group"><label>Golongan</label><input class="form-control" type="text" name="nama" value="<?= $nama->golongan ?>" readonly></div>
                    <div class="form-group"><label>Jabatan</label><input class="form-control" type="text" name="program_studi" value="<?= $nama->jabatan ?>" readonly></div>
                    <div class="form-group"><label>Pendidikan</label><input class="form-control" type="text" name="telp" value="<?= $nama->pendidikan ?>"  readonly></div>
                    <div class="form-group"><label>Tahun Lulus</label><input class="form-control" type="text" name="email" value="<?= $nama->th_lulus ?>" readonly></div>
                    <div class="form-group"><label>Kepakaran</label><input class="form-control" type="text" name="nama" value="<?= $nama->kepakaran ?>" readonly></div>
                    <div class="form-group"><label>Status Bekerja</label><input class="form-control" type="text" name="nama" value="<?= $nama->status_bekerja ?>" readonly></div>
                    <div class="form-group"><label>Jenis Pegawai</label><input class="form-control" type="text" name="program_studi" value="<?= $nama->jenis ?>" readonly></div>
                    <div class="form-group"><label>Status Kepegawaian</label><input class="form-control" type="text" name="email" value="<?= $nama->status_kepegawaian ?>" readonly></div>
                    <div class="form-group"><label>Unit ES II</label><input class="form-control" type="text" name="program_studi" value="<?= $nama->fakultas ?>" readonly></div>
                    <div class="form-group"><label>Unit ES III</label><input class="form-control" type="text" name="telp" value="<?= $nama->departemen ?>"  readonly></div>
                    <div class="form-group"><label>Unit ES IV</label><input class="form-control" type="text" name="program_studi" value="<?= $nama->program_studi ?>" readonly></div>
                    <div class="form-group"><label>Telephone</label><input class="form-control" type="text" name="telp" value="<?= $nama->no_telp ?>"  readonly></div>
                    <div class="form-group"><label>Email</label><input class="form-control" type="text" name="email" value="<?= $nama->email ?>" readonly></div>
                    <hr>
                    
					
					
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
