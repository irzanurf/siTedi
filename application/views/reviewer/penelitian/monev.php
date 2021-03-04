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
                            <th>catatan</th>
                            
                        </tr>
                    </thead>
                    <?php 
                        $now =  date('Y-m-d', strtotime(date('Y-m-d')));
                        ?>
                        <?php 
                        foreach($view as $v) { ?>
                        <?php $akhir = date('Y-m-d', strtotime($v->tgl_akhir)); ?>
                        <?php if ($v->reviewer==$this->session->userdata('user_name')) : ?>
                        <tr>
                            <td align="center"><?= $v->tgl_upload?></td>
                            <td align="center"><?= $v->jenis?></td>
                            <td align="center"><?= $v->judul?></td>
                            <td align="center">
                            <?php if($v->cr_monev=='0' ||$v->cr_monev=='' || $v->cr_monev==NULL ) : ?>
                                <form method="post" action=<?= base_url('reviewer/penelitian/cr');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <input type='hidden' name="jenis" value="<?= $v->id_jenis ?>">
                                    <button type="submit" class="btn-sm btn-primary">
                                        Catatan
                                    </button>
                                    
                                </form>

                            <?php elseif((($v->cr_monev!='0' ||$v->cr_monev!='' || $v->cr_monev!=NULL ))&&($v->status==4 || $now >= $akhir)) : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Edit
                                    </button>

                            
                            <?php else : ?>
                                <form method="post" action=<?= base_url('reviewer/penelitian/editCr');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <input type='hidden' name="jenis" value="<?= $v->id_jenis ?>">
                                    <button type="submit" class="btn-sm btn-primary">
                                        Edit
                                    </button>
                                    
                                </form>
                            <?php endif;?>
                            
                            
                            </td>
                            
                            
                        </tr>
                        <?php endif; ?>


                        <?php if ($v->reviewer2==$this->session->userdata('user_name')) : ?>
                        <tr>
                            <td align="center"><?= $v->tgl_upload?></td>
                            <td align="center"><?= $v->jenis?></td>
                            <td align="center"><?= $v->judul?></td>
                            <td align="center">
                            <?php if($v->cr_monev2=='0' ||$v->cr_monev2=='' || $v->cr_monev2==NULL ) : ?>
                                <form method="post" action=<?= base_url('reviewer/penelitian/cr');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <input type='hidden' name="jenis" value="<?= $v->id_jenis ?>">
                                    <button type="submit" class="btn-sm btn-primary">
                                        Catatan
                                    </button>
                                    
                                </form>

                                <?php elseif((($v->cr_monev2!='0' ||$v->cr_monev2!='' || $v->cr_monev2!=NULL ))&&($v->status==4 || $now >= $akhir)) : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Edit
                                    </button>

                               
                            <?php else : ?>
                                <form method="post" action=<?= base_url('reviewer/penelitian/editCr');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <input type='hidden' name="jenis" value="<?= $v->id_jenis ?>">
                                    <button type="submit" class="btn-sm btn-primary">
                                        Edit
                                    </button>
                                    
                                </form>
                            <?php endif;?>
                            
                            
                            </td>
                            
                            
                        </tr>
                        <?php endif; ?>


                        


                        <?php } ?>
                    </table>
</div>
