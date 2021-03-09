
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
									<form action="<?= base_url('admin/penelitian/addformProposal');?>" method="post" enctype="multipart/form-data"> 
                                    
                                    <div class="form-group">
                                <label>Ketua</label>
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
                                    <label>Jenis Penelitian</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <select class="form-control" name="jenis" id="jenis" required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($skema as $jp) {
                                            ?>
                                           <option value="<?php echo $jp->id; ?>"><?php echo $jp->jenis; ?> - <?php echo $jp->tgl; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                   
                                <div class="form-group"> 
											<label>Judul Penelitian</label> <label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
											<input name="judul" class="form-control" id="judul" required=""> 
                                            <span id="judul_result" style='color:red'></span>
										</div> 
                                        <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_jadwal" value=<?= $jadwal?>  >
                                </div>
										<div class="form-group"> 
											<label>Abstrak</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label> 
											<textarea name="abstrak" rows="4" class="form-control" required=""> </textarea>
										</div> 
										<div class="form-group"> 
											<label">Lokasi</label> 
											<input name="lokasi" class="form-control" placeholder="Kelurahan, Kota, Provinsi"> 
										</div> 
										<div class="form-group"> 
											<label>Mitra</label> 
											<input name="mitra" class="form-control"> 
                                        </div> 
                                        <div class="form-group"> 
											<label>Lama Penelitian</label> <label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
											<div class="form-group input-group">
                                            <input type="text" class="form-control" name="bulan" required="">
                                            <span class="input-group-addon">bulan</span>
                                        </div> 
										
                                        <div class="form-group">
                                    <label>Biaya</label> <label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
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
                                    <select class="form-control" id="selectpicker2" name="luaran[]" data-live-search="true">
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
                                    <button class="btn btn-success add-more1" type="button"><i class="fa fa-plus"></i> Add</button>
                                </div>
                                <div class="input-group control-group1 after-add-more1" style="margin-top:10px">
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
                                <input class="form-control id-dosen" name="dosen[]" hidden >
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
                                <!-- <select class="form-control" name="mahasiswa[]">
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


                            <div class="form-group"> 
											<label for="exampleInputFile">File Proposal</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label><br> 
											<input type="file" name="file_prop" accept="application/pdf"> <br>
                                            <label style="color:red; font-size:12px;">.pdf maks 10mb</label>
                                        </div> 

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

