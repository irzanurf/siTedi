<!-- input-forms -->
<div class="grids">
					<div class="progressbar-heading grids-heading">
                        <h2>Laporan Akhir</h2>
                        <?php echo $this->session->flashdata('message');?>
					</div>
                    <table class="table" >
                    <thead>
                        <tr>
                            <th>Tanggal Upload</th>
                            <th>Jenis Skema Penelitian</th>
                            <th>Judul Proposal</th>
                            <th>Upload Laporan Akhir</th>
                        </tr>
                    </thead>
                    <?php 
                        $now =  date('Y-m-d', strtotime(date('Y-m-d')));
                        ?>
                        <?php 
                        $no = 1;
                        foreach($view as $v) { ?>
                        <?php $akhir = date('Y-m-d', strtotime($v->tgl_akhir)); ?>
                        <tr>
                            <td align="center"><?= $v->tgl_upload?></td>
                            <td align="center"><?= $v->jenis?></td>
                            <td align="center"><?= $v->judul?></td>
                            <td align="center">
                            
                            <?php if($v->file1=='0' || $v->file1=='' || $v->file1==NULL) : ?>
                                <form method="post" action=<?= base_url('dosen/penelitian/upAkhir');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn-sm btn-primary">
                                        Upload File
                                    </button>
                                    
                                </form>
                            
                            <?php elseif($v->status==5 || $now >= $akhir) : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Edit File
                                    </button>
                               
                            <?php else : ?>
                                <form method="post" action=<?= base_url('dosen/penelitian/editAkhir');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn-sm btn-primary">
                                        Edit File
                                    </button>
                                    
                                </form>
                            <?php endif;?>
                            
                            
                            </td>

                        </tr>
                        <?php } ?>
                    </table>
                    



</div>

