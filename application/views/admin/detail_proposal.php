
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Penilaian Proposal Pengabdian
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?= base_url('admin/dashboard/');?>">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Penilaian pengabdian
                </li>
            </ol>
        </div>
    </div>
<div class="row">
                    <div class="col-lg-12">
                    
                    <section class="content">
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Judul Pengabdian</label>
                        <div class="col-lg-8">
                            <p><?=$prop->judul;?></p>
                        </div>
                    </div>
                    <label>Ketua Pengabdian</label>
                    <div class='form-group row'>
                        <p class="col-lg-4">Nama Lengkap</p>
                        <div class="col-lg-8">
                            <p><?=$dosen->nama;?></p>
                        </div><br>
                        <p class="col-lg-4">NIP/NIDN</p>
                        <div class="col-lg-8">
                            <p><?=$dosen->nip;?></p>
                        </div><br>
                        <p class="col-lg-4 ">Program Studi</p>
                        <div class="col-lg-8">
                            <p><?=$dosen->program_studi;?></p>
                        </div>
                    </div>
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Lama Pengabdian</label>
                        <div class="col-lg-8">
                            <p><?=$prop->lama_pelaksanaan;?></p>
                        </div>
                    </div> 
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Biaya Pengabdian</label>
                        <div class="col-lg-8">
                            <p>Rp <?=  number_format($prop->biaya,2,',','.');?></p>
                        </div>
                    </div> 
                    <div class="row" >
                        <div class="col-lg-1"></div>
                        <div class="col-lg-11">
                            <iframe src="<?= base_url('assets/prop_pengabdian');?>/<?=$prop->file?>" width="93%" height="400px" >
                            </iframe>
                        </div>
                        <div class="col-lg-1"></div>
                    
                    </div>
                    <table class="table">
                    <form method='POST' action="<?= base_url('reviewer/pengabdian/finalsubmitNilai');?>" >
                    <input name="id" value="<?=$prop->id?>" hidden>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center" width="500px">Komponen Penilaian</th>
                            <th class="text-center">Bobot (B)</th>
                            <th class="text-center" width='100px'>Skor (S)</th>
                            <th class="text-center">Nilai</th>
                        </tr>
                        <?php 
                        $no = 1;
                        foreach($komponen as $k) {?>
                        <tr>
                        <td ><?= $no?></td>
                        <td ><?= $k->komponen_penilaian?></td>
                        <td class="text-center"><?= $k->bobot ?></td>
                        <td class="text-center"><?=$k->skor?></td>
                        <td class="text-center"><?=$k->nilai?></td>
                            
                        </tr>
                        
                        <?php }?>
                        <tr>
                        <td colspan='4'>Total</td>
                        <td><?=$nilai->nilai?></td>
                        </tr>
                        <input type="text" id="total" value=<?=$no?> hidden>
                    </table>
                    
                    
                    
                    <p>Keterangan: Skor : 1, 2, 4, 5 (1 = sangat kurang, 2 = kurang, 4 = baik, 5 = sangat baik); Nilai = Bobot x Skor</p>

                    <div class="form-group">
                        <label>Komentar Penilai</label>
                        <div >
                            <textarea class="form-control" name="komentar"  rows="3" disabled><?=$nilai->komentar?></textarea>
                        </div>
                    </div>
                    <a href="<?=base_url('admin/pengabdian/approval');?>">Back</a>
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

