
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Form Penambahan Skema Pengabdian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Skema Pengabdian
                </li>
            </ol>
        </div>
    </div>
<div class="row">
<div class="col-lg-6" style="float:none;margin:auto;">
                    
                    <section class="content">
                    
                    <form method='POST' action="<?= base_url('admin/pengabdian/submitSkemaPengabdian');?>" >
                   
                        <div class='form-group'>
                            <label for="jenis">Nama Skema Pengabdian</label>
                            <input type="text" class='form-control' name='jenis' id='jenis'>
                        </div>
                        <div class="input-group control-group after-add-more">
                        
                        <div class="form-group">
                            <label for="komponen">Komponen penilaian</label>
                            <textarea class='form-control'  id='komponen' name='komponen[]'></textarea>
                            </div>
                            <div class='form-group'>
                            <label for="bobot">Bobot</label>
                            <input class='form-control' type="text" id="bobot" name="bobot[]" >
                            </div>
                            <div class="input-group-btn"> 
                                    <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah komponen</button>
                            </div>
                            
                        </div><br>
                        <button type="submit">Submit</button>
                        
                        <!-- <td><button class="btn btn-success add-more1" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button></td> -->
                        <!-- </tr> -->
                        <div class="copy hide">
                        <div class="input-group control-group" style="margin-top:10px">
                            <label for="komponen">Komponen Penilaian</label>
                            <textarea class='form-control' id='komponen' name='komponen[]'></textarea>
                            <br>
                            <label for="bobot">Bobot</label>
                            <input type="text" class='form-control' id="bobot" name="bobot[]" >
                            <div class="input-group-btn"> 
                                <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus komponen</button>
                            </div>
                        </div>
       
                        
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

