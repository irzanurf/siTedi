

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Pilih Jadwal
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Pilih Jadwal
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class='row'>
    

    
    </div>

    <div class="row">
        <div class="col-lg-8" style="float:none;margin:auto;">
        <section class="content">
        <table class="table">
            <tr>
                <th>Keterangan</th>
                <th>Periode</th>
                <th></th>
                <!-- <th>Tahun</th> -->

            </tr>
            <?php 
            $no = 1;
            foreach($jadwal as $v) { ?>
            <?php $mulai = date('d-m-Y', strtotime($v->tgl_mulai)); 
                    $selesai = date('d-m-Y', strtotime($v->tgl_selesai));?>
            <tr>
                <td><?= $v->keterangan?></td>
                <td><?= $mulai?> sampai <?= $selesai?></td>
                <td>
                <a type="button" class="btn btn-info" href="<?= base_url($jenis) ;?>/<?= $v->id;?>">
                    Pilih
                
                </td>
                
                
            </tr>
            
            <?php } ?>
        </table>
        </section>
        

       
        

            

        </div>
        


        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

