
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tambah Proposal
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Tambah Proposal
                </li>
            </ol>
        </div>
    </div>
<div class="row">
<div class="col-lg-6" style="float:none;margin:auto;">
                    <div class="form">
						<div class="forms">
							<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
								</div>
								<div class="form-body">
									<form action="<?= base_url('admin/pengabdian/addformProposal');?>" method="post" enctype="multipart/form-data"> 
                                    
                                    <div class="form-group">
                                <label>Ketua</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                <select class="form-control" name="nip" id="selectpicker0" data-live-search="true" required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                            <option value="<?php echo $ds->nip; ?>"><?php echo $ds->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    </div>

                                    <div class="form-group">
                                    <label>Jenis Pengabdian</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <select class="form-control" name="skema_pengabdian" id="skema_pengabdian" required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($skema as $sd) {
                                            ?>
                                            <option value="<?php echo $sd->id; ?>"><?php echo $sd->jenis_pengabdian; ?> - <?php echo $sd->tgl; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Judul Pengabdian</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input class="form-control" name="judul" id="judul" required="">
                                    <span id="judul_result" style='color:red'></span>
                                </div>

                                <div class="form-group">
                                    <label>Abstrak</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <textarea class="form-control" rows="3" name="abstrak" required=""></textarea>
                                </div>
                                

                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input class="form-control" name="lokasi" placeholder="Kelurahan, Kota, Provinsi">
                                </div>

                                <div class="form-group">
                                    <label>Lama Pelaksanaan</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <div class="form-group input-group">
                                    <input type="text" class="form-control" name="bulan" required="">
                                    <span class="input-group-addon">bulan</span>
                                </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_jadwal" value=<?= $jadwal?>  >
                                </div>

                                <div class="form-group">
                                    <label>Biaya</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <div class="form-group input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="text" class="form-control currency" name="biaya" required="">
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
                                            <option value="<?php echo $sd->id; ?>"><?php echo $sd->sumberdana; ?> - <?php echo $sd->tgl; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Luaran</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <div class="input-group control-group after-add-more2">
                                    <select class="form-control" id="selectpicker2" name="luaran[]"  data-live-search="true">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($luaran as $l) {
                                            ?>
                                            <option value="<?php echo $l->id; ?>"><?php echo $l->luaran; ?> - <?php echo $l->tgl; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-success add-more2" id="btnadd2" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                                </div></br>
                                
                                <div class="form-group">
                                <label>Anggota Dosen</label>
                                <div class="input-group control-group after-add-more">
                               <select class="form-control" id="selectpicker1" name="dosen[]" data-live-search="true">
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
                                </div>
                                </div>

                                <div class="form-group">
                                <label><br>Anggota Mahasiswa (NIM)</label>
                                <div class="input-group-btn"> 
                                    <button class="btn btn-success add-more1" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                                <div class="input-group control-group1 after-add-more1">
                                <input class="form-control" name="nim_mahasiswa[]" placeholder="NIM Mahasiswa" >
                                <input class="form-control" name="nama_mahasiswa[]" placeholder="Nama Mahasiswa" >
                                 
                                </div>

                                
                            </div>

                            <div class="copy2 hide">
                                <div class="control-group input-group" style="margin-top:10px">
                                <input class="form-control id-luaran" name="luaran[]" hidden >
                                <input class="form-control nama-luaran"  readonly>
                                
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove2" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>

                            <div class="copy hide">
                                <div class="control-group input-group" style="margin-top:10px">
                                <input class="form-control id-dosen" name="dosen[]" type="hidden" >
                                <input class="form-control nama-dosen"  readonly>
                                
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>
                        

                            <div class="copy1 hide">
                                <div class="control-group1 input-group" style="margin-top:10px">
                                <input class="form-control" name="nim_mahasiswa[]" placeholder="NIM Mahasiswa" >
                                <input class="form-control" name="nama_mahasiswa[]" placeholder="Nama Mahasiswa" >
                            
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove1" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>

                                <h3>Keterangan Mitra</h3>
                                <div class="form-group">
                                    <label>Nama Instansi</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input class="form-control" name="instansi" required="">
                                </div>
                                <div class="form-group">
                                    <label>Penanggung Jawab</label>
                                    <input class="form-control" name="pj" >
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input class="form-control" name="no_telp" >
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" >
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input class="form-control" name="alamat" >
                                </div>
                                <div class="form-group">
                                    <label>Username</label><label style="color:red; font-size:12px;"> (*Maks 20 karakter)</label>
                                    <input class="form-control" id="username" name="username" placeholder="Masukkan username untuk mitra" required="">
                                    <span id="username_result" style='color:red'></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan password untuk mitra" required="">
                                </div>

                                <h3>File Proposal</h3>
                                <div class="form-group">
                                    <label>Upload Proposal</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input type="file" accept="application/pdf" class="form-control" name="file_prop"  ><br>
                                    <label style="color:red; font-size:12px;">.pdf maks 10mb</label>
                                </div>

                                <!-- <div class="form-group">
                                    <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
                                </div> -->

										<button type="submit"  id="submit" class="btn btn-success w3ls-button">Submit</button> 
									</form> 
								</div>
							</div>
						</div>
                    </div>
                                </div>
</div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#selectpicker1').selectpicker();
        $('#btnadd').prop('disabled', true);
        $('#selectpicker2').selectpicker();
        $('#btnadd2').prop('disabled', true);
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
                    // $('#selectpicker2').selectpicker();
    });
    </script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#selectpicker2').on('change', function(){
            $('#btnadd2').prop('disabled', false);
            
      $("body").on("click",".remove2",function(){ 
          $(this).parents(".control-group").remove();
      });
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
            $('#selectpicker0').selectpicker();
        });
    </script>

<script type="text/javascript"> 
        $(document).ready(function(){
            $('#submit').prop('disabled',true);
            $('#judul').change(function(){
            var judul = $('#judul').val();
            if(judul != ''){
                $.ajax({
                    url:"<?php echo base_url('admin/pengabdian/checkJudul');?>",
                    method:"post",
                    data:{judul:judul},
                    dataType: 'json',
                    success:function(data){
                        if(data=="Judul belum diajukan"){
                            $('#submit').prop('disabled',false);
                            $('#judul_result').hide();
                        }else{
                            $('#submit').prop('disabled', true);
                            $('#judul_result').show();
                            $('#judul_result').html(data);
                        }
                        //console.log(data);
                    }
                });
            }
            });
            });
    </script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#selectpicker1').on('change', function(){
            $('#btnadd').prop('disabled', false);
            
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });

    $("#btnadd").on('click',function(){ 
                var temp = $(".copy.hide").clone(true); 
                $('.nama-dosen', temp).val($('#selectpicker1 option:selected').text());
                $('.id-dosen', temp).val($('#selectpicker1').val());
                $(temp).removeClass("hide");
          $(".after-add-more").after(temp);
          $('#selectpicker1').val("").selectpicker('refresh');


      });


        })
      
    </script>



    <script type="text/javascript">
    $(document).ready(function() {
      $(".add-more1").click(function(){ 
          var html = $(".copy1").html();
          $(".after-add-more1").after(html);
        //   $('.selectpicker2').selectpicker();
          
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
            $('#submit').prop('disabled',true);
            $('#username').change(function(){
            var username = $('#username').val();
            if(username != ''){
                $.ajax({
                    url:"<?php echo base_url('admin/Pengabdian/checkUsername');?>",
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
            });
            });
    </script>

