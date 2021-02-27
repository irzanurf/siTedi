<!-- input-forms -->
<div class="grids">
					<div class="progressbar-heading grids-heading">
                        <h2>Daftar Pengajuan Proposal</h2>
                        <?php echo $this->session->flashdata('message');?>
					</div>
                    <table class="table" >
                    <thead>
                        <tr>
                            <th>Tanggal Upload</th>
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
                        <tr>
                            <td align="center"><?= $v->tgl_upload?></td>
                            <td align="center"><?= $v->jenis?></td>
                            <td align="center"><?= $v->judul?></td>
                            
                            <td align="center">
                            <?php if($v->file=='0' ||$v->file=='' || $v->file==NULL || $v->status=="1") : ?>
                                    <button type="button" class="btn-sm btn-default" dissabled>
                                        Edit
                                    </button>
                                    
                                </form>
                            
                                <?php elseif($v->status=="1" || $v->status=="11" || $v->status=="12" || $v->status=="2" || $v->status=="3" || $v->status=="5") : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Proposal
                                    </button>
                               
                            <?php else : ?>
                                <form method="post" action=<?= base_url('dosen/penelitian/detailProposal');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn-sm btn-primary">
                                        Edit Proposal
                                    </button>
                                    
                                </form>
                            <?php endif;?>
                            
                            
                            </td>
                            <td align="center">
                            <?php if($v->file=='0' ||$v->file=='' || $v->file==NULL || $v->status=="1" ) : ?>
                                    <button type="button" class="btn-sm btn-default" dissabled>
                                        Finish
                                    </button>
                                    
                                </form>

                                <?php elseif($v->status=="1" || $v->status=="11" || $v->status=="12" || $v->status=="13" || $v->status=="2" || $v->status=="3" || $v->status=="5") : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Finished
                                    </button>
                               
                            <?php else : ?>
                                <form style="float:left;" method="post" onclick="return confirm('Apakah Anda Yakin Ingin Melakukan Finalisasi?');" action=<?= base_url('dosen/penelitian/finishClick');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn-sm btn-primary">
                                        Finalisasi
                                    </button>
                                    
                                </form>
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

                            <?php elseif($v->status=="2") : ?>
                                <button type="button" class="btn-sm btn-success" dissabled>
                                        Accepted
                                    </button>
                                    <?php elseif($v->status=="0") : ?>
                               
                            
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

