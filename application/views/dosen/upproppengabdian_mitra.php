
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
                    <div class="col-lg-10">
                        <h1 class="page-header">
                            Edit Form Pengajuan Mitra
                        </h1>
                        <ol class="breadcrumb">
                            
                            <li class="active">
                                <i class="fa fa-edit"></i> Pengajuan Mitra
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-10">
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
                                    <label>Judul Pengabdian</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input class="form-control" name="judul" required="" <?php echo "value=\"" . $proposal->judul . "\""; ?> >
                                </div>

                                <div class="form-group">
                                    <label>Abstrak</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <textarea class="form-control" rows="3" name="abstrak" required=""  ><?= $proposal->abstrak?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input class="form-control" name="lokasi" <?php echo "value=\"" . $proposal->lokasi . "\""; ?> placeholder="Kelurahan, Kota, Provinsi" >
                                </div>

                                <div class="form-group">
                                    <label>Lama Pelaksanaan</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <div class="form-group input-group">
                                    <input type="text" class="form-control" name="bulan" required="" value=<?= $proposal->lama_pelaksanaan?>>
                                    <span class="input-group-addon">bulan</span>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label>Biaya</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <div class="form-group input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="text" class="form-control currency" name="biaya" required="" value=<?=$proposal->biaya?>  >
                                    <span class="input-group-addon">,00</span>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label>Pendanaan</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
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

                                <div class="form-group">
                                <label>Luaran</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                <div class="input-group control-group">
                               <select class="form-control" id="selectpicker2" name="luaran_new[]" data-live-search="true">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($luaran as $l) {
                                        ?>
                                        <option value ="<?php echo $l->id; ?>"><?php echo $l->luaran ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                 <div class="input-group-btn"> 
                                    <button class="btn btn-success add-more2" id="btnadd2" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div></div>
                                <?php 
                        foreach($nilai_luaran as $n=>$val){?>
                            <div class="control-group input-group" style="margin-top:10px">
                            <input class="form-control id-luaran" name="id_nilai_luaran[]" value="<?=$val->id?>" hidden >
                                <input class="form-control id-luaran" name="luaran[]" value="<?=$val->id_luaran?>" hidden >
                                <input class="form-control nama-luaran" value="<?=$val->luaran?>" readonly>
                            
                                <!-- <select class="form-control" name="dosen[]">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($luaran as $l) {
                                        ?>
                                        <option value ="<?php echo $l->id; ?>" <?php echo ($l->id==$val->id_luaran) ? "selected='selected'" : "" ?>><?php echo $l->luaran ?></option>
                                        <?php
                                    }
                                    ?>
                                        <input class='form-control hidden' type="text" id="bobot" name="id_dsn_anggota[]" value=<?=$val->id?> hidden>
                                    
                                </select> -->
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove2" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>

                    <?php }?>
                    <div class="after-add-more2"></div>

                                <br><div class="form-group">
                                <label>Anggota Dosen</label>
                                <div class="input-group control-group">
                               <select class="form-control" id="selectpicker1" name="dosen_new[]" data-live-search="true">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($dosen as $ds) {
                                        ?>
                                        <option value ="<?php echo $ds->nip; ?>"><?php echo $ds->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                 <div class="input-group-btn"> 
                                    <button class="btn btn-success add-more" id="btnadd" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div></div>
                                <?php 
                        foreach($anggota_dosen as $k=>$val){?>
                            <div class="control-group input-group" style="margin-top:10px">
                            <input class="form-control id-dosen" name="id_dsn_anggota[]" value="<?=$val->id?>" hidden >
                                <input class="form-control nip-dosen" name="dosen[]" value="<?=$val->nip?>" hidden >
                                <input class="form-control nama-dosen" value="<?=$val->nama?>" readonly>
                            
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>

                    <?php }?>
                    <div class="after-add-more"></div>
                                
                

                                <div class="form-group">
                                <label><br>Anggota Mahasiswa</label>
                                <div class="input-group-btn"> 
                                    <button class="btn btn-success add-more1" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                                <?php 
                                foreach($anggota_mhs as $k=>$val){?>
                                <div class="control-group1 input-group" style="margin-top:10px">
                                <input class="form-control" name="nim_mahasiswa[]" value=<?= $val->nim?> >
                                <input class="form-control" name="nama_mahasiswa[]" <?php echo "value=\"" . $val->nama . "\""; ?>  >
                                <input class='form-control hidden' type="text" id="bobot" name="id_mhs_anggota[]" value=<?=$val->id?> hidden>
                                    <!-- <select class="form-control" name="mahasiswa[]">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($mahasiswa as $mhs) {
                                            ?>
                                            <option value ="<?php echo $mhs->nim; ?>" <?php echo ($mhs->nim==$val->nim) ? "selected='selected'" : "" ?>><?php echo $mhs->nama ?></option>
                                            <?php
                                        }
                                        ?>
                                            
                                       
                                    </select> -->
                                        <div class="input-group-btn"> 
                                        <button class="btn btn-danger remove1" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                        </div>
                                    </div>

                        <?php }?>
                        <div class="after-add-more1"></div>
                            

                            <div class="copy hide">
                                <div class="control-group input-group" style="margin-top:10px">
                                <input class="form-control nip-dosen" name="dosen_new[]"  hidden >
                                <input class="form-control nama-dosen"  readonly>
                                
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>

                            <div class="copy2 hide">
                                <div class="control-group input-group" style="margin-top:10px">
                               
                                <input class="form-control id-luaran" name="luaran_new[]"  hidden >
                                <input class="form-control nama-luaran"  readonly>
                                
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove2" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                   
                                </div>
                            </div>

                            <div class="copy1 hide">
                                <div class="control-group1 input-group" style="margin-top:10px">
                                <input class="form-control" name="nim_mahasiswa_new[]" placeholder="NIM mahasiswa"  >
                                <input class="form-control" name="nama_mahasiswa_new[]" placeholder="Nama mahasiswa">
                                <!-- <select class="form-control" name="mahasiswa_new[]">
                                    <option value="">Please select</option>
                                    <?php
                                    foreach ($mahasiswa as $mhs) {
                                        ?>
                                        <option value ="<?php echo $mhs->nim; ?>"><?php echo $mhs->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                </select> -->
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove1" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>

                                <h3>Keterangan Mitra</h3>
                                <div class="form-group">
                                    <label>Nama Instansi</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input class="form-control" name="instansi" required="" <?php echo "value=\"" . $mitra->nama_instansi . "\""; ?> >
                                    <input class='form-control hidden' type="text" name="id_mitra" value=<?=$mitra->id?> hidden>
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
                                    <label>Username</label><label style="color:red; font-size:12px;"> (*Maks 20 Karakter)</label>
                                    <input class="form-control" id="username" name="username" required="" value=<?=$mitra->username?> placeholder="Masukkan username untuk mitra">
                                    <span id="username_result" style='color:red'></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Apabila tidak ingin mengganti password, cukup kosongi field ini" >
                                </div>

                                <h3>File Proposal</h3>
                                <div>
                                    <iframe src="<?= base_url('assets/prop_pengabdian');?>/<?=$proposal->file?>" width="93%" height="400px" >
                                    </iframe>
                                    <div class="form-group">
                                        <label>Upload Proposal</label>
                                        <input type="file" accept="application/pdf" class="form-control" name="file_prop"><br>
                                    <label style="color:red; font-size:12px;">.pdf maks 10mb</label>
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
    $(document).ready(function() {
        $('#selectpicker1').selectpicker();
        $('#btnadd').prop('disabled', true);
        // $('#selectpicker2').selectpicker();
        $( '.currency' ).keyup(function(event) {
            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            ;
            });
            });

    });
    </script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#selectpicker2').selectpicker();
        $('#btnadd2').prop('disabled', true);
        
    });
    </script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#selectpicker1').on('change', function(){
            $('#btnadd').prop('disabled', false);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
    });

    $("#btnadd").on('click',function(){ 
                var temp = $(".copy.hide").clone(true); 
                $('.nama-dosen', temp).val($('#selectpicker1 option:selected').text());
                $('.nip-dosen', temp).val($('#selectpicker1').val());
                $(temp).removeClass("hide");
          $(".after-add-more").after(temp); 
          $('#selectpicker1').val("").selectpicker('refresh');
      });
        })
      
    </script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#selectpicker2').on('change', function(){
            $('#btnadd2').prop('disabled', false);
            
     
    });

    $("body").on("click",".remove2",function(){ 
          $(this).parents(".control-group").remove();
      });
    $("#btnadd2").on('click',function(){ 
                var temp = $(".copy2.hide").clone(true); 
                $('.nama-luaran', temp).val($('#selectpicker2 option:selected').text());
                $('.id-luaran', temp).val($('#selectpicker2').val());
                $(temp).removeClass("hide");
          $(".after-add-more2").after(temp);
          $('#selectpicker2').val("").selectpicker('refresh'); 
      });
        })
      
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
      $(".add-more1").click(function(){ 
          var html = $(".copy1").html();
          $(".after-add-more1").after(html);
      });
      $("body").on("click",".remove1",function(){ 
          $(this).parents(".control-group1").remove();
      });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#username').keypress(function( e ) {
            if(e.which === 32) 
                return false;
        });
       
        
    });
    </script>
   <script type="text/javascript"> 
        $(document).ready(function(){
            //$('#submit').prop('disabled',true);
            $('#username').change(function(){
            var username = $('#username').val();
            if(username != ''){
                $.ajax({
                    url:"<?php echo base_url('dosen/Pengabdian/checkUsername');?>",
                    method:"post",
                    data:{username:username},
                    dataType: 'json',
                    success:function(data){
                        var userVal = $('#username').val();
                        if(data=="Username tersedia" && userVal.length < 21){
                            $('#submit').prop('disabled',false);
                            $('#username_result').hide();
                        }else if(data!="Username tersedia" && userVal.length < 21){
                            $('#submit').prop('disabled', true);
                            $('#username_result').show();
                            $('#username_result').html(data);
                        } else if(data=="Username tersedia" && userVal.length > 20){
                            $('#submit').prop('disabled', true);
                            $('#username_result').show();
                            $('#username_result').html("Karakter username tidak boleh lebih dari 20");
                        } else{
                            $('#submit').prop('disabled', true);
                            $('#username_result').show();
                            $('#username_result').html("Username tidak tersedia dan karakter username melebihi 20 karakter");
                        }
                        //console.log(data);
                    }
                });
            }
			else
			{
				            $('#submit').prop('disabled',true);

			}
            });
            });
    </script>

</body>

</html>
