
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Form Jadwal Penelitian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Jadwal Penelitian
                </li>
            </ol>
        </div>
    </div>
<div class="row">
                    <div class="col-lg-6" style="float:none;margin:auto;">
                    
                    <section class="content">
                    
                    <form method='POST' action="<?= base_url('admin/penelitian/updateJadwalPenelitian');?>" >
                
                        <div class="panel-body">
                            <label>keterangan</label>
                            <input type="text" class="form-control"  name="keterangan" id="keterangan" <?php echo "value=\"" . $jadwal->keterangan . "\""; ?>><br>
                            <label>Tanggal Awal</label>
                            <input type="date" class="form-control"  name="tgl_mulai" id="tgl_awal" value = <?=$jadwal->tgl_mulai?>><br>
                            <label>Batas Pengajuan Proposal</label>
                            <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai" value = <?=$jadwal->tgl_selesai?>><br>
                            <label>Batas Pengumpulan Monev</label>
                            <input type="date" class="form-control"  name="tgl_monev" id="tgl_monev" value = <?=$jadwal->tgl_monev?>><br>
                            <label>Batas Pengumpulan Laporan Akhir</label>
                            <input type="date" class="form-control"  name="tgl_akhir" id="tgl_akhir" value = <?=$jadwal->tgl_akhir?>><br>
                            <input type="text" class="form-control hidden" name="id" value = <?=$jadwal->id?> hidden><br>
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




