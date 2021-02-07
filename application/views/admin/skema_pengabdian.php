

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Daftar Skema Proposal Pengabdian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Skema pengabdian
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
        <a href="<?=base_url('admin/pengabdian/formTambahSkema');?>"><button class='btn btn-info'>Tambah Skema Pengabdian</button></a>
        
        <table class="table">
            <col style='width:10%'>
            <col style='width:50%'>
            <col style='width:40%'>
            <tr>
                <th>No</th>
                <th>Skema Pengabdian</th>
                <th>Aksi</th>
                <th>Tahun</th>

            </tr>
            <?php 
            $no = 1;
            foreach($skema as $v) { ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->jenis_pengabdian?></td>
                <td>
                <a type="button" class="btn btn-info" href="<?= base_url('admin/pengabdian/detailSkemaPengabdian') ;?>/<?= $v->id; ?>">
                    Detail
                </a>
                <a type="button" class="btn btn-success" href="<?= base_url('admin/pengabdian/editSkemaPengabdian') ;?>/<?= $v->id; ?>">
                    Edit Skema
                </a>
                <a type="button" class="btn btn-danger" href="<?= base_url('admin/pengabdian/hapusSkemaPengabdian') ;?>/<?= $v->id; ?>">
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
