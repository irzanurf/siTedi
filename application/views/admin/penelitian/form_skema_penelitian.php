
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Form Penambahan Skema Penelitian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Skema Penelitian
                </li>
            </ol>
        </div>
    </div>
<div class="row">
<div class="col-lg-6" style="float:none;margin:auto;">
                    
                    <section class="content">
                    
                    <form method='POST' action="<?= base_url('admin/penelitian/submitSkemaPenelitian');?>" >
                   
                        <div class='form-group'>
                            <label for="jenis">Nama Skema Penelitian</label>
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
                        
                        <!-- <tr>
                        <div class="copy hide">
                                <div class="control-group input-group" style="margin-top:10px">
                                <td><?= $no?></td>
                        <td><input type="text" id='komponen' name='komponen[]'></td>
                        <td><input type="text" id="bobot<?=$no?>" name="bobot[]" ></td>
                                 <select class="form-control" name="dosen[]">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($dosen as $ds) {
                                        ?>
                                        <option value ="<?php echo $ds->nip; ?>"><?php echo $ds->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                </select> -->
                                <!-- <td>
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                    </td> -->
                                </div>
                            </div>
                        
                        <!-- <td><button class="btn btn-success add-more1" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button></td> -->
                        </tr>
                        <!-- <tr>
                        <td colspan='4'>Total</td>
                        <td><input type="text" name="total_nilai" id="totalnilai" value="0" readonly></td>
                        </tr>
                        <input type="text" id="total" value=<?=$no?> hidden> -->
                    </table>
                    
                    
                    
                    <!-- <p>Keterangan: Skor : 1, 2, 4, 5 (1 = sangat kurang, 2 = kurang, 4 = baik, 5 = sangat baik); Nilai = Bobot x Skor</p>

                    <div class="form-group">
                        <label>Komentar Penilai</label>
                        <div >
                            <textarea class="form-control" name="komentar"  rows="3"></textarea>
                        </div>
                    </div> -->
                    
                    </form>
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



