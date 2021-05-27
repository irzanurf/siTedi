
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Laporan Akhir
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Laporan Akhir
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
                                <form action="<?= base_url('admin/pengabdian/uploadAkhir');?>" method="post" enctype="multipart/form-data"> 
                            <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $proposal->id?>  >
                            </div>
                            <div class="form-group">
                                    <input type="hidden" class="form-control" name="nip" value=<?= $proposal->nip?>  >
                                </div>	
                            <div class="form-group"> 
											<h4>Laporan Akhir</h4> 
                                            <?php if (!empty($akhir->laporan_akhir)){ ?>
                                                <iframe src="<?= base_url('assets/laporan_akhir');?>/<?=$akhir->laporan_akhir?>" width="93%" height="400px" >
                            </iframe>
							<?php } ?>
											<input type="file" accept="application/pdf" name="laporan_akhir">
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label> 
                            </div> 
                            <div class="form-group">
                                    <input type="hidden" class="form-control" name="jadwal" value=<?= $jadwal?>  >
                                </div>

                            <div class="form-group"> 
											<h4>Logbook</h4> 
                                            <?php if (!empty($akhir->logbook)){ ?>
                                                <iframe src="<?= base_url('assets/logbook');?>/<?=$akhir->logbook?>" width="93%" height="400px" >
                            </iframe>
							<?php } ?>
											<input type="file" accept="application/pdf" name="logbook"> </br>
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label>
							</div> 

                            <div class="form-group"> 
											<h4>Laporan Belanja 100%</h4>
                                            <?php if (!empty($akhir->belanja)){ ?>
                                                <iframe src="<?= base_url('assets/belanja');?>/<?=$akhir->belanja?>" width="93%" height="400px" >
                            </iframe>
							<?php } ?>
											<input type="file" accept="application/pdf" name="belanja"> </br>
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label>
                            </div> 
							
							<h4>Luaran</h4>
					
											<?php
												for($i=0, $count = count($luaran);$i<$count;$i++) {?>
											<div class="form-group" style="background: #FFFFFF; padding: 0px 10px 0px 10px;"> 
                                           
											<div class="form-group">
                                    		<h5><br><b><?= $luaran[$i]->luaran?></b></h5>
											
											<div class="form-group">
                                    			<input type="hidden" name=<?= "id_luaran".$i."" ?> class="form-control"  value=<?= $luaran[$i]->id_luaran?>  >
                                			</div>
											<div class="form-group">
                                    			<textarea class="form-control" name=<?= "jenis".$i."" ?>  style="display:none;" rows="1" name=<?="jenis".$i."" ?>><?= $luaran[$i]->luaran?></textarea>
                                			</div>
											<div class="form-group">
                                    			<label>Judul</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    			<textarea class="form-control" style="background: #edf1f5;" rows="2" value="" name=<?="judul".$i."" ?> ><?= $luaran[$i]->judul?></textarea>
                                			</div>
											<div class="form-group">
                                    			<label>Nama Jurnal/Artikel/Modul/Draft/Blueprint/Metode</label>
                                    			<textarea class="form-control" style="background: #edf1f5;" rows="2" value="" name=<?="nama".$i."" ?> ><?= $luaran[$i]->nama?></textarea>
                                			</div>
											<div class="form-group">
                                    			<label>Author</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    			<textarea class="form-control" style="background: #edf1f5;" rows="2" value="" name=<?="author".$i."" ?> ><?= $luaran[$i]->author?></textarea>
                                			</div>
											<div class="form-group">
                                    			<label>Tahun</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    			<input class="form-control" type="number" style="background: #edf1f5;" value="<?= $luaran[$i]->tahun?>" name=<?="tahun".$i."" ?> ></input>
                                			</div>
											<div class="form-group">
                                    			<label>Link</label>
                                    			<input class="form-control" style="background: #edf1f5;" value="<?= $luaran[$i]->link?>" name=<?="link".$i."" ?> ></input>
                                			</div>
                                            <div class="form-group">
                                                <label>Jumlah Sitasi</label>
                                                <input class="form-control" type="number" style="background: #edf1f5;" value="<?= $luaran[$i]->sitasi?>" name=<?="sitasi".$i."" ?> ></input>
                                            </div>
											<div class="form-group"> 
											<?php if (!empty($luaran[$i]->file)){ ?>
											<iframe src="<?= base_url('assets/luaran');?>/<?=$luaran[$i]->file?>" width="100%" height="400px" >
                           					 </iframe>
												<?php } ?>
											</div>
											
											<input type="file" accept="application/pdf" name=<?="file_luaran".$i."" ?>>
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label>
											</div>
                                			</div>
											<?php } ?>

                            <div class="form-group"> 
											<label>Catatan</label> 
											<textarea name="catatan" rows="4" class="form-control"> </textarea>
							</div> 

                        

										<button type="submit" class="btn btn-success">Submit</button> 
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
