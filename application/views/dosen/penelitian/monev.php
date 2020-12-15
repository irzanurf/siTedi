<!-- input-forms -->
<div class="grids">
					<div class="progressbar-heading grids-heading">
                        <h2>Monitoring & Evaluasi</h2>
                        <?php echo $this->session->flashdata('message');?>
					</div>
                    <table class="table" >
                    <thead>
                        <tr>
                            <th>Tanggal Upload</th>
                            <th>Jenis Skema Penelitian</th>
                            <th>Judul Proposal</th>
                            <th>Upload Laporan Monev</th>
                            <th>Action</th>
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
                            <?php if($v->status_monev=="1") : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        proposal
                                    </button>

                            <?php elseif($v->file1=='0' || $v->file1=='' || $v->file1==NULL) : ?>
                                <form method="post" action=<?= base_url('dosen/penelitian/editMonev');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn-sm btn-primary">
                                        Upload File
                                    </button>
                                    
                                </form>
                               
                            <?php else : ?>
                                <form method="post" action=<?= base_url('dosen/penelitian/editMonev');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn-sm btn-primary">
                                        Edit File
                                    </button>
                                    
                                </form>
                            <?php endif;?>
                            
                            
                            </td>

                            
                            <td align="center">
                            <?php if($v->file1=='0' || $v->file1=='' || $v->file1==NULL) : ?>
                                    <button type="button" class="btn-sm btn-default" dissabled>
                                        Finish
                                    </button>

                            <?php elseif($v->status_monev=="1") : ?>
                            <button dissabled class="btn-sm btn-default">Finished</button>
                               
                            <?php else : ?>
                                <form method="post" onclick="return confirm('Apakah Anda Yakin Ingin Melakukan Finalisasi?');" action=<?= base_url('dosen/penelitian/finishClickMonev');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn-sm btn-primary">
                                        Finalisasi
                                    </button>
                                    
                                </form>
                            <?php endif;?>
                            
                            
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                    



</div>

