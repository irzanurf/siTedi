
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Proposal
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Edit Proposal
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
									<form action="<?= base_url('admin/penelitian/editformProposal');?>" method="post" enctype="multipart/form-data"> 
                                    
                                    <div class="form-group">
                                <label>Ketua</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                <select class="form-control" name="nip" id="selectpicker0" data-live-search="true" required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                            <option value="<?php echo $ds->nip; ?>"<?php echo ($ds->nip==$proposal->nip) ? "selected='selected'" : "" ?>><?php echo $ds->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    </div>

                                    <div class="form-group">
                                    <label>Jenis Penelitian</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <select class="form-control" name="jenis" id="jenis" required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($skema as $sd) {
                                            ?>
                                            <option value="<?php echo $sd->id; ?>"<?php echo ($sd->id==$proposal->id_jenis) ? "selected='selected'" : "" ?>><?php echo $sd->jenis; ?> - <?php echo $sd->tgl; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                   
                                    <div class="form-group">
                                    <label>Judul Penelitian</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <textarea class="form-control" rows="1" name="judul" required="" ><?= $proposal->judul?></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $proposal->id?>  >
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="jadwal" value=<?= $jadwal?>  >
                                </div>

                                <div class="form-group">
                                    <label>Abstrak</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <textarea class="form-control" rows="3" name="abstrak" required="" ><?= $proposal->abstrak?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <textarea class="form-control" rows="1" name="lokasi"  ><?= $proposal->lokasi?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Mitra</label>
                                    <textarea class="form-control" rows="1" name="mitra"  ><?= $proposal->mitra?></textarea>
                                </div>
                                <label>Lama Penelitian</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label></br>
                               
                                <div class="form-group"> 
											
											<div class="form-group input-group">
                                            <input type="text" class="form-control" name="bulan" required=""  value=<?= $proposal->lama_pelaksanaan?>>
                                            <span class="input-group-addon">bulan</span>
                                        </div>
    

                                <div class="form-group">
                                    <label>Biaya</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <div class="form-group input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="text" class="form-control currency" name="biaya" required="" value=<?= $proposal->biaya?>>
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
                            <input class="form-control id-luaran" name="id_nilai_luaran[]" value="<?=$val->id?>" type="hidden" >
                                <input class="form-control id-luaran" name="luaran[]" value="<?=$val->id_luaran?>" type="hidden" >
                                <input class="form-control nama-luaran" value="<?=$val->luaran?>" readonly>
                            
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
                            <input class="form-control id-dosen" name="id_dsn_anggota[]" value="<?=$val->id?>" type="hidden" >
                                <input class="form-control id-dosen" name="dosen[]" value="<?=$val->nip?>" type="hidden" >
                                <input class="form-control nama-dosen" value="<?=$val->nama?>" readonly>
                            
                                <!-- <select class="form-control" name="dosen[]">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($dosen as $ds) {
                                        ?>
                                        <option value ="<?php echo $ds->nip; ?>" <?php echo ($ds->nip==$val->nip) ? "selected='selected'" : "" ?>><?php echo $ds->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                        <input class='form-control hidden' type="text" id="bobot" name="id_dsn_anggota[]" value=<?=$val->id?> hidden>
                                    
                                </select> -->
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>

                    <?php }?>
                    <div class="after-add-more"></div>
                                
                

                    <div class="form-group">
                                <label><br>Anggota Mahasiswa</label>
                                <div class="input-group-btn"> 
                                    <button class="btn btn-success add-more1" type="button"><i class="fa fa-plus"></i> Add</button>
                                </div>
                                <?php 
                                foreach($anggota_mhs as $k=>$val){?>
                                <div class="control-group1 input-group" style="margin-top:10px">
                                <input class="form-control" name="nim_mahasiswa[]" value=<?= $val->nim?> >
                                <input class="form-control" name="nama_mahasiswa[]" <?php echo "value=\"" . $val->nama . "\""; ?>  >
                                <input class='form-control hidden' type="text" id="bobot" name="id_mhs_anggota[]" value=<?=$val->id?> type="hidden">
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
                                <!-- <select class="form-control" name="dosen_new[]">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($dosen as $ds) {
                                        ?>
                                        <option value ="<?php echo $ds->nip; ?>"><?php echo $ds->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                </select> -->
                                <input class="form-control id-dosen" name="dosen_new[]"  type="hidden" >
                                <input class="form-control nama-dosen"  readonly>
                                
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                   
                                </div>
                            </div>

                            <div class="copy2 hide">
                                <div class="control-group input-group" style="margin-top:10px">
                               
    
                                <input class="form-control id-luaran" name="luaran_new[]"  type="hidden" >
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
                            <h3><br>File Proposal</h3>
                                <div>
                                    <iframe src="<?= base_url('assets/prop_penelitian');?>/<?=$proposal->file?>" width="100%" height="400px" >
                                    </iframe>
                                    <div class="form-group">
                                        <label>Upload Proposal</label>
                                        <input type="file" accept="application/pdf" class="form-control" name="file_prop"><br>
                                    <label style="color:red; font-size:12px;">.pdf maks 10mb</label>
                                    </div>
                                </div>


										<br><button type="submit" class="btn btn-success w3ls-button">Submit</button> 
									</form> 
								</div>
							</div>
						</div>
                    </div>
                                </div>
</div>
</div>

 <!-- jQuery Version 1.11.0 -->
 <script src="<?= base_url('assets/template/js/jquery-1.11.0.js');?>"></script>


<script type="text/javascript">
        $(document).ready(function() {
            $('#selectpicker0').selectpicker();
        });
    </script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#selectpicker1').selectpicker();
        $('#btnadd').prop('disabled', true);
        
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
