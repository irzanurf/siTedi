

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Skema Penelitian
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
    <!-- /.row -->
    <div class='row'>
    

    
    </div>

    <div class="row">
        <div class="col-lg-12">
        <section class="content">
        <a href="<?=base_url('admin/penelitian/formTambahSkema');?>"><button class='btn btn-info'>Tambah Skema Penelitian</button></a>
        
        <table class="table">
            <col style='width:10%'>
            <col style='width:50%'>
            <col style='width:40%'>
            <tr>
                <th>No</th>
                <th>Skema Penelitian</th>
                <th>Aksi</th>
                <th>Tahun</th>

            </tr>
            <?php 
            $no = 1;
            foreach($skema as $v) { ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->jenis?></td>
                <td>
                <a type="button" class="btn btn-success" href="<?= base_url('admin/penelitian/editSkemaPenelitian') ;?>/<?= $v->id; ?>">
                    Edit Skema
                </a>
                <a type="button" class="btn btn-info" href="<?= base_url('admin/penelitian/detailSkemaPenelitian') ;?>/<?= $v->id; ?>">
                    Detail
                </a>
                <a type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Skema?');" href="<?= base_url('admin/penelitian/hapusSkemaPenelitian') ;?>/<?= $v->id; ?>">
                    Hapus Skema
                </a>
                <!-- <a type="button" class="btn btn-info" href="<?= base_url('#') ;?>/<?= $v->id; ?>">
                    Edit reviewer
                </a> -->
                </td>
                <td><?= $v->tgl?></td>
                
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


