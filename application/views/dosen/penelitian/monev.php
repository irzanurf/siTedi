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
                            <th>Periode</th>
                            <th>Jenis Skema Penelitian</th>
                            <th>Judul Proposal</th>
                            <th>Upload Laporan Monev</th>
                        </tr>
                    </thead>
                    <?php 
                        $now =  date('Y-m-d', strtotime(date('Y-m-d')));
                        ?>
                        <?php 
                        $no = 1;
                        foreach($view as $v) { ?>
                        <?php $monev = date('Y-m-d', strtotime($v->tgl_monev)); 
                        $tgl = date('d-m-Y', strtotime($v->tgl_upload));?>
                        <tr>
                            <td align="center"><?= $tgl?></td>
                            <td align="center"><?= $v->keterangan?></td>
                            <td align="center"><?= $v->jenis?></td>
                            <td align="center"><?= $v->judul?></td>
                            <td align="center">

                            <?php if($now > $monev) : ?>
                                Periode telah berakhir

                            <?php elseif($v->status==4 || $v->status==5) : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Edit File
                                    </button>
                               
                            <?php elseif($v->status_monev==0 || $v->status_monev==NULL || $v->status_monev=='') : ?>
                                <form method="post" action=<?= base_url('dosen/penelitian/upmonev');?>>
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

                            
                            
                        </tr>
                        <?php } ?>
                    </table>
                    



</div>

