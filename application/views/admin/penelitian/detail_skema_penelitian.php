
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Detail Skema Penelitian
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
                    <div class="col-lg-12">
                    
                    <section class="content">
                    
                    <table class="table">
                    <col style='width:10%'>
                    <col style='width:70%'>
                    <col style='width:20%'>
                    
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center" width="500px">Komponen Penilaian</th>
                            <th class="text-center">Bobot (B)</th>
                           
                        </tr>
                        <?php 
                        $no = 1;
                        foreach($komponen as $k) {?>
                        <tr>
                        <td><?= $no++?></td>
                        <td><?= $k->komponen?></td>
                        <td class='text-center'><?= $k->bobot ?></td>
                        
                        </tr>
                        
                        <?php }?>
                    </table>

                    <a type="button" class="btn-sm btn-info" href="<?= base_url('admin/penelitian/skemaPenelitian') ;?>">
                    Back
                    </a>
                    
                    
                    
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

    
    

    <!-- jQuery Version 1.11.0 -->
    <script src="<?= base_url('assets/template/js/jquery-1.11.0.js');?>">
        


    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets/template/js/bootstrap.min.js');?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    


</body>

</html>
