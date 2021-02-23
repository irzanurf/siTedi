
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Detail Skema Pengabdian
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
                     
                    
                    <!-- <table class="table">
                    <col style='width:10%'>
                    <col style='width:70%'>
                    <col style='width:20%'> -->
                    <!-- <form method='POST' action="<?= base_url('reviewer/pengabdian/submitNilai');?>" > -->
                    <!-- <input name="id" value="<?=$prop->id?>" hidden> -->
                        <!-- <tr>
                            <th class="text-center">No</th>
                            <th class="text-center" width="500px">Komponen Penilaian</th>
                            <th class="text-center">Bobot (B)</th>
                           
                        </tr>
                        <?php 
                        $no = 1;
                        foreach($komponen as $k) {?>
                        <tr>
                        <td><?= $no++?></td>
                        <td><?= $k->komponen_penilaian?></td>
                        <td class='text-center'><?= $k->bobot ?></td>
                        
                        </tr>
                        
                        <?php }?>
                    </table> -->
                    <form method="POST" action="<?= base_url('admin/pengabdian/updateSkemaPengabdian') ?>">
                    <?php 
                    foreach($skema as $s=>$sk){?>
                    <div class='form-group'>
                                    <label for="bobot">Jenis</label>
                                    <input class='form-control' type="text" id="jenis" name="jenis" <?php echo "value=\"" . $sk->jenis_pengabdian . "\""; ?>>
                                </div>
                    <?php }?>
                    <div class="input-group-btn"> 
                                            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah komponen</button>
                                </div> 
                    <?php 
                    foreach($komponen as $k=>$val){?>
                    <!-- <th><?=$id_skema?></th> -->
                            <div class="input-group control-group ">
                                <div class="form-group">
                                    <label for="komponen">Komponen penilaian</label>
                                    <textarea class='form-control'  id='komponen' name='komponen[]' ><?=$val->komponen_penilaian?></textarea>
                                </div>
                                <div class='form-group'>
                                    <label for="bobot">Bobot</label>
                                    <input class='form-control' type="text" id="bobot" name="bobot[]" value=<?=$val->bobot?>>
                                </div>
                                <div class='form-group'>
                                    <!-- <label for="bobot">id</label> -->
                                    <input class='form-control hidden' type="text" id="bobot" name="id_komp[]" value=<?=$val->id?> hidden>
                                </div>
                                
                                <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus komponen</button>
                                </div>   
                                <hr style="border-top:1px solid grey">
                            </div>

                    <?php }?>
                    <div class="after-add-more"></div>
                    <div class='form-group'>
                        <input class='form-control hidden' type="text" id="id_skema" name="id_skema" value=<?=$id_skema?> hidden>
                    </div>
                    <button type="submit">Update</button>

                    <div class="copy hide">
                        <div class="input-group control-group" style="margin-top:10px">
                            <label for="komponen">Komponen Penilaian</label>
                            <textarea class='form-control' id='komponen' name='komponen_baru[]'></textarea>
                            <br>
                            <label for="bobot">Bobot</label>
                            <input type="text" class='form-control' id="bobot" name="bobot_baru[]" >
                            <div class="input-group-btn"> 
                                <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus komponen</button>
                            </div>
                        </div>

                    </form>

                    

                   
       
                    
                    
                    
                    <!-- <p>Keterangan: Skor : 1, 2, 4, 5 (1 = sangat kurang, 2 = kurang, 4 = baik, 5 = sangat baik); Nilai = Bobot x Skor</p> -->

                   
                    <!-- <button type="submit"><=Ba</button> -->
                    </section>

                    <!-- <input type="text" name="input1" id="input1" value="5">
<input type="text" name="input2" id="input2" value=""> <a href="javascript: void(0)" onClick="calc()">Calculate</a>

<input type="text" name="output" id="output" value=""> -->
                    

                    
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
