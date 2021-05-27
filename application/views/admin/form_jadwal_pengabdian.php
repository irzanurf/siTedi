
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Form Jadwal Pengabdian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Jadwal Pengabdian
                </li>
            </ol>
        </div>
    </div>
<div class="row">
                    <div class="center col-lg-6" style="float:none;margin:auto;">
                    
                    <section class="content">
                    
                    <form method='POST' action="<?= base_url('admin/pengabdian/submitJadwalPengabdian');?>" >
                
                    <div class="panel-body">
                            <label>keterangan</label>
                            <input type="text" class="form-control"  name="keterangan" id="keterangan" required=""><br>
                            <label>Tanggal Awal</label>
                            <input type="date" class="form-control"  name="tgl_mulai" id="tgl_awal" required=""><br>
                            <label>Batas Pengajuan Permohonan</label>
                            <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai" required=""><br>
                            <label>Batas Pengumpulan Laporan Akhir</label>
                            <input type="date" class="form-control"  name="tgl_akhir" id="tgl_akhir" required=""><br>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        
                    
                            </div>
                        
                      
                    </table>
                    
                    
                    
                    </form>
                    </section>
                    

                    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    
    

    <script src="<?= base_url("datepicker/dist/js/jquery.js");?>"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0/js/bootstrap-datepicker.js"></script>
    <script src="<?= base_url("datepicker/dist/js/bootstrap-datepicker.js");?>"></script>

    <script type="text/javascript">
    // Data Picker Initialization
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
    </script>

    <script type="text/javascript">
        $(function()
        {
            $('#tgl_awal').datepicker({autoclose: true,todayHighlight: true,format: 'yyyy-mm-dd'}),
            $('#tgl_akhir').datepicker({autoclose: true,todayHighlight: true,format: 'yyyy-mm-dd'}),
            $('#tgl_selesai').datepicker({autoclose: true,todayHighlight: true,format: 'yyyy-mm-dd'})
        });
    </script>

