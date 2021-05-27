
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Monitoring & Evaluasi
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Monitoring & Evaluasi
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
                                <form action="<?= base_url('admin/penelitian/uploadMonev');?>" method="post" enctype="multipart/form-data"> 
                            <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $proposal->id?>  >
                            </div>
                            <div class="form-group"> 
											<h4><br>Logbook</h4>
                                            <?php if (!empty($monev->file1)){ ?>
											<iframe src="<?= base_url('assets/monev_penelitian');?>/<?=$monev->file1?>" width="100%" height="400px" >
                                            </iframe>
							                <?php } ?>
											<input type="file" accept="application/pdf" name="file1"></br>
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label>
                            </div> 
                            <div class="form-group">
                                    <input type="hidden" class="form-control" name="jadwal" value=<?= $jadwal?>  >
                                </div>

                            <div class="form-group"> 
											<h4><br>Laporan Kemajuan</h4>
                                            <?php if (!empty($monev->file2)){ ?>
											<iframe src="<?= base_url('assets/monev_penelitian');?>/<?=$monev->file2?>" width="100%" height="400px" >
                                            </iframe>
							                <?php } ?>
											<input type="file" accept="application/pdf" name="file2"></br> 
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label>
                            </div> 

                            <div class="form-group"> 
											<h4><br>Laporan Belanja 70%</h4>
                                            <?php if (!empty($monev->file3)){ ?>
											<iframe src="<?= base_url('assets/monev_penelitian');?>/<?=$monev->file3?>" width="100%" height="400px" >
                                            </iframe>
							                <?php } ?>
											<input type="file" accept="application/pdf" name="file3"></br>
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label>
                            </div> 

                            <div class="form-group"> 
											<label>Catatan</label> 
											<textarea name="catatan" rows="4" class="form-control"><?=$monev->catatan?></textarea>
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
