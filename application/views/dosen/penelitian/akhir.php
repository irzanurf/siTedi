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
                            <th>Periode</th>
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
                        <?php $akhir = date('Y-m-d', strtotime($v->tgl_akhir)); 
                        $tgl = date('d-m-Y', strtotime($v->tgl_upload));?>
                        <tr>
                            <td align="center"><?= $tgl?></td>
                            <td align="center"><?= $v->keterangan?></td>
                            <td align="center"><?= $v->jenis?></td>
                            <td align="center"><?= $v->judul?></td>
                            <td align="center">

                            <?php if($now > $akhir) : ?>
                                Periode telah berakhir

                            <?php elseif($v->status==5) : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Edit File
                                    </button>
                            
                            <?php elseif($v->status_akhir==0 || $v->status_akhir=='' || $v->status_akhir==NULL) : ?>
                                <form method="post" action=<?= base_url('dosen/penelitian/upAkhir');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <button type="submit" class="btn-sm btn-primary">
                                        Upload File
                                    </button>
                                    
                                </form>
                               
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

