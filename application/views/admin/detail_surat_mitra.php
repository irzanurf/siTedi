
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-10">
                        <h1 class="page-header">
                            Detail Mitra
                        </h1>
                        <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Detail Mitra
                </li>
            </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6" style="float:none;margin:auto;">
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Nama Instansi</label>
                        <div class="col-lg-8">
                            <p><?=$mitra->nama_instansi;?></p>
                        </div>
                    </div>
                    
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Penanggung Jawab</label>
                        <div class="col-lg-8">
                            <p><?=$mitra->penanggung_jwb;?></p>
                        </div>
                    </div> 
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Nomor Telepon</label>
                        <div class="col-lg-8">
                            <p><?=$mitra->no_telp;?></p>
                        </div>
                    </div> 
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Email</label>
                        <div class="col-lg-8">
                            <p><?=$mitra->email;?></p>
                        </div>
                    </div> 
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Alamat</label>
                        <div class="col-lg-8">
                            <p><?=$mitra->alamat;?></p>
                        </div>
                    </div> 

                                <h3>File Surat Persetujuan Mitra</h3>
                                <div>
                                    <iframe src="<?= base_url('assets/suratmitra');?>/<?=$mitra->file_persetujuan?>" width="93%" height="400px" >
                                    </iframe>
                                </div>
                                <a href="<?=base_url('admin/pengabdian/daftarpengabdian');?>/<?= $prop->id_jadwal ?>"><button class='btn btn-info'> Back</button></a>
                                
             
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
            $('#selectpicker0').selectpicker();
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
