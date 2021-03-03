

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Daftar Penilaian Proposal Pengabdian
            </h1>
            <ol class="breadcrumb">
                
                <li class="active">
                    <i class="fa fa-edit"></i> Daftar penilaian proposal
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
        
        
        <section class="content">
        <table class="table">
            <col style='width:5%'>
            <col style='width:40%'>
            <col style='width:15%'>
            <col style='width:12.5%'>
            <col style='width:12.5%'>
            <col style='width:15%'>
            <tr>
                <th>No</th>
                <th>Judul Proposal</th>
                <th>Instansi Mitra</th>
                <th>Nilai</th>
                <th>Detail</th>
                <th>Status</th>

            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <?php if ($v->reviewer==$this->session->userdata('user_name')) : ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->judul?></td>
                <td>
                <?php if($v->id_mitra==0) : ?>
                    -
                <?php else : ?>
                    <?= $v->nama_instansi ?>

                <?php endif;?>
                </td>
                <td><?= $v->nilai ?></td>
                <td>
                <?php if($v->status == 'ACCEPTED' ||$v->status == 'REJECTED' ) : ?>
                <?php elseif($v->nilai!=NULL) : ?>
                <a type="button" class="btn-sm btn-success" href="<?= base_url('reviewer/pengabdian/editProposal') ;?>/<?= $v->id_proposal; ?>">
                    Edit
                </a>
                <?php elseif($v->status=='ASSIGNED'||$v->status='GRADED2') :?>
                <a type="button" class="btn-sm btn-primary" href="<?= base_url('reviewer/pengabdian/penilaianproposal') ;?>/<?= $v->id; ?>">
                    Grade
                </a>

                <?php endif;?>
                
                </td>
                <td>
                <?php if($v->status=='ACCEPTED') : ?>
                <span type='button' class="btn-sm btn-success">Approved</span>
                <?php elseif($v->status=='REJECTED') : ?>
                <span type='button' class="btn-sm btn-danger">Rejected</span>
                <?php elseif($v->status=='GRADED1' || $v->status == 'NEED_APPROVAL') : ?>
                <span type='button' class="btn-sm btn-warning">Processing</span>
                <?php elseif($v->status=='ASSIGNED') : ?>
                <span type='button' class="btn-sm btn-default">Need grading</span>
                <?php else : ?>
                <span type='button' class="btn-sm btn-warning">Processing</span>
                </td>
                <?php endif;?>
                
            </tr>
            <?php endif; ?>
            <?php if ($v->reviewer2==$this->session->userdata('user_name')) : ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $v->judul?></td>
                <td>
                <?php if($v->id_mitra==0) : ?>
                    -
                <?php else : ?>
                    <?= $v->nama_instansi ?>

                <?php endif;?>
                </td>
                <td><?= $v->nilai2 ?></td>
                <td>
                <?php if($v->status == 'ACCEPTED' ||$v->status == 'REJECTED' ) : ?>
                <?php elseif($v->nilai2!=NULL) : ?>
                <a type="button" class="btn-sm btn-success" href="<?= base_url('reviewer/pengabdian/editProposal') ;?>/<?= $v->id_proposal; ?>">
                    Edit
                </a>
                <?php elseif($v->status=='ASSIGNED' || $v->status=='GRADED1') :?>
                <a type="button" class="btn-sm btn-primary" href="<?= base_url('reviewer/pengabdian/penilaianproposal') ;?>/<?= $v->id; ?>">
                    Grade
                </a>

                <?php endif;?>
                
                </td>
                <td>
                <?php if($v->status=='ACCEPTED') : ?>
                <span type='button' class="btn-sm btn-success">Approved</span>
                <?php elseif($v->status=='REJECTED') : ?>
                <span type='button' class="btn-sm btn-danger">Rejected</span>
                <?php elseif($v->status=='GRADED2' || $v->status == 'NEED_APPROVAL') : ?>
                <span type='button' class="btn-sm btn-warning">Processing</span>
                <?php elseif($v->status=='ASSIGNED') : ?>
                <span type='button' class="btn-sm btn-default">Need grading</span>
                <?php else : ?>
                <span type='button' class="btn-sm btn-warning">Processing</span>
                </td>
                <?php endif;?>
                
            </tr>
            <?php endif; ?>
            <?php } ?>
        </table>
        </section>
        

        <!-- Modal isi form -->
        <div class="modal fade" id="addFormPengajuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Pengajuan Mitra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url('dosen/pengabdian/addformproposal');?>">
                    <div class="form-group">
                        <label>Judul Pengabdian</label>
                        <input class="form-control" name="judul" >
                    </div>

                    <div class="form-group">
                        <label>Abstrak</label>
                        <textarea class="form-control" rows="3" name="abstrak"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Lokasi</label>
                        <input class="form-control" name="lokasi" placeholder="Kelurahan, Kota, Provinsi">
                    </div>

                    <div class="form-group">
                        <label>Lama Pelaksanaan</label>
                        <div class="form-group input-group">
                        <input type="text" class="form-control" name="bulan">
                        <span class="input-group-addon">bulan</span>
                        <input type="text" class="form-control" name="tahun">
                        <span class="input-group-addon">tahun</span>
                    </div>
                    </div>

                    <div class="form-group">
                        <label>Biaya</label>
                        <div class="form-group input-group">
                        <span class="input-group-addon">Rp.</span>
                        <input type="text" class="form-control" name="biaya">
                        <span class="input-group-addon">,00</span>
                    </div>
                    </div>

                    <div class="form-group">
                        <label>Sumber Dana</label>
                        <select class="form-control" name="sumberdana" id="sumberdana">
                            <option value="">Please Select</option>
                            <?php
                            foreach ($sumberdana as $sd) {
                                ?>
                                <option value="<?php echo $sd->id; ?>"><?php echo $sd->sumberdana; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <h3>Keterangan Mitra</h3>
                    <div class="form-group">
                        <label>Nama Instansi</label>
                        <input class="form-control" name="instansi" >
                    </div>
                    <div class="form-group">
                        <label>Penanggung Jawab</label>
                        <input class="form-control" name="pj" >
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input class="form-control" name="no_telp" >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" >
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" name="alamat" >
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="username" placeholder="Masukkan username untuk mitra">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password untuk mitra" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            
            </div>
        </div>
        </div>


        <?php 
        foreach ($view as $v) :
            $id=$v->id_mitra;
         ?>

        <!-- Modal -->
        <div class="modal fade" id="updateSurat<?= $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo form_open_multipart('dosen/pengabdian/updateSurat') ?>
                <div class="form-group">
                    <label>Upload Surat Mitra</label>
                    <input type="file" accept="application/pdf" class="form-control" name="file_persetujuan"   >
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value=<?=$id?>  >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            <?= form_close() ?>

                
            </div>
            
            </div>
        </div>
        </div>

        <?php endforeach;?>
        

            

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

<!-- jQuery Version 1.11.0 -->
<script src="<?= base_url('assets/template/js/jquery-1.11.0.js');?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('assets/template/js/bootstrap.min.js');?>"></script>

</body>

</html>
