<!-- input-forms -->
<div class="grids">
					<div class="progressbar-heading grids-heading">
                        <h2>Daftar Pengajuan Proposal</h2>
                        <?php echo $this->session->flashdata('message');?>
					</div>
                    <?php 
                        $now =  date('Y-m-d', strtotime(date('Y-m-d')));
                        ?>
                    <table class="table" >
                    <thead>
                        <tr>
                            <th>Tanggal Upload</th>
                            <th>Periode</th>
                            <th>Jenis Skema Penelitian</th>
                            <th>Judul Proposal</th>
                            <th>Edit Isian Proposal</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                        <?php 
                        $no = 1;
                        foreach($view as $v) { ?>
                        <?php $akhir = date('Y-m-d', strtotime($v->tgl_selesai)); 
                        $tgl = date('d-m-Y', strtotime($v->tgl_upload));?>
                        <tr>
                            <td align="center"><?= $tgl?></td>
                            <td align="center"><?= $v->keterangan?></td>
                            <td align="center"><?= $v->jenis?></td>
                            <td align="center"><?= $v->judul?></td>
                            
                            <td align="center">

                            
                            <?php if($now > $akhir || $v->status==11 || $v->status==12 || $v->status==13 || $v->status==2 || $v->status==3 || $v->status==4 || $v->status==5) : ?> 
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Edit
                                    </button>

                            <?php else : ?>
                                    <form method="post" action=<?= base_url('dosen/penelitian/detailProposal');?>>
                                        <input type='hidden' name="id" value="<?= $v->id ?>">
                                        <button type="submit" class="btn-sm btn-primary">
                                            Edit
                                        </button>
                                    </form>
                            <?php endif;?>
                            
                            
                            </td>
                            
                            <td align="center">
                            
                            <?php if($now >= $akhir || $v->status==11 || $v->status==12 || $v->status==13 || $v->status==2 || $v->status==3 || $v->status==4 || $v->status==5) : ?> 
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Hapus
                                    </button>

                            <?php else : ?>
                                <form method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Proposal?');" action=<?= base_url('dosen/penelitian/deleteForm');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="Submit" class="btn-sm btn-danger">
                                        Hapus
                                    </button>
                                    
                                </form>
                            <?php endif;?>
                            
                            
                            </td>

                            <td align="center">
                            <?php if($v->status=="5" ) : ?>
                                <button type="button" class="btn-sm btn-danger" dissabled>
                                        Rejected
                                    </button>
                                    <form style="display:inline-block;" method="post" action=<?= base_url('dosen/penelitian/detail');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <!-- <input type='hidden' name="id_skema" value="<?= $v->jenis ?>"> -->
                                    <button type="Submit" class="btn-sm btn-danger">
                                    Detail Nilai
                                    </button>
                                    
                                </form>

                            <?php elseif($v->status=="2") : ?>
                                <button type="button" class="btn-sm btn-success" dissabled>
                                        Accepted
                                    </button>
                                    <form style="display:inline-block;" method="post" action=<?= base_url('dosen/penelitian/detail');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <!-- <input type='hidden' name="id_skema" value="<?= $v->jenis ?>"> -->
                                    <button type="Submit" class="btn-sm btn-info">
                                        Detail Nilai
                                    </button>
                                    
                                </form>
                            
                            <?php elseif($v->status=="11"||$v->status=="12"||$v->status=="13") : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Reviewing
                                    </button>
                            
                            <?php elseif($v->status=="0"||$v->status=="1") : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Submitted
                                    </button>
                            
                            <?php elseif($v->status=="3") : ?>
                                <button type="button" class="btn-sm btn-info" dissabled>
                                        Monev
                                    </button>
                                    <form style="display:inline-block;" method="post" action=<?= base_url('dosen/penelitian/detail');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <!-- <input type='hidden' name="id_skema" value="<?= $v->jenis ?>"> -->
                                    <button type="Submit" class="btn-sm btn-info">
                                        Detail Nilai
                                    </button>
                                    
                                </form>
                            
                            <?php elseif($v->status=="4") : ?>
                                <button type="button" class="btn-sm btn-info" dissabled>
                                        Laporan Akhir
                                    </button>
                                    <form style="display:inline-block;" method="post" action=<?= base_url('dosen/penelitian/detail');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <!-- <input type='hidden' name="id_skema" value="<?= $v->jenis ?>"> -->
                                    <button type="Submit" class="btn-sm btn-info">
                                        Detail Nilai
                                    </button>
                                    
                                </form>
                               
                            <?php else : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Waiting
                                    </button>
                            <?php endif;?>
                            
                            
                            </td>


                        </tr>
                        <?php } ?>

                        <?php 
                        foreach($anggota as $v) { 
                            $tgl = date('d-m-Y', strtotime($v->tgl_upload));?>
                        <tr>
                            <td align="center"><?= $tgl?></td>
                            <td align="center"><?= $v->keterangan?></td>
                            <td align="center"><?= $v->jenis?></td>
                            <td align="center"><?= $v->judul?></td>
                            
                            <td align="center">
                            -
                            
                            
                            </td>
                            <td align="center">
                           -
                            
                            </td>

                            <td align="center">
                            <?php if($v->status=="5" ) : ?>
                                <button type="button" class="btn-sm btn-danger" dissabled>
                                        Rejected
                                    </button>

                            <?php elseif($v->status=="2") : ?>
                                <button type="button" class="btn-sm btn-success" dissabled>
                                        Accepted
                                    </button>
                                    
                                    <?php elseif($v->status=="0"||$v->status=="1") : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Submitted
                                    </button>
                               
                            
                            <?php elseif($v->status=="11"||$v->status=="12"||$v->status=="13") : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Reviewing
                                    </button>
                            
                            <?php elseif($v->status=="3") : ?>
                                <button type="button" class="btn-sm btn-info" dissabled>
                                        Monev
                                    </button>
                            
                            <?php elseif($v->status=="4") : ?>
                                <button type="button" class="btn-sm btn-info" dissabled>
                                        Laporan Akhir
                                    </button>
                            
                            <?php elseif($v->status=="4") : ?>
                                <button type="button" class="btn-sm btn-info" dissabled>
                                        Finished
                                    </button>
                               
                            <?php else : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Waiting
                                    </button>
                            <?php endif;?>
                            
                            
                            </td>


                        </tr>
                        <?php } ?>
                    </table>
</div>

