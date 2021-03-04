<!-- input-forms -->
<div class="grids">
					<div class="progressbar-heading grids-heading">
                        <h2>Form Pengisian</h2>
                        <?php echo $this->session->flashdata('message');?>
					</div>
                    <table class="table" >
                    <thead>
                    <tr>
                <th>No</th>
                <th>Judul Proposal</th>
                <th>Jenis Penelitian</th>
                <th>Nilai</th>
                <th>Action</th>
                

            </tr>
            <?php 
            $no = 1;
            foreach($view as $v) { ?>
            <?php if ($v->reviewer==$this->session->userdata('user_name')) : ?>
            <tr>
                <td align="center"><?= $no++?></td>
                <td align="center"><?= $v->judul?></td>
                <td align="center"><?= $v->jenis ?></td>
                <td align="center"><?= $v->nilai ?></td>
                <td align="center">

                <?php if($v->nilai==NULL ||$v->nilai=="" ||$v->nilai=="0") :?>
                    <form method="post" action=<?= base_url('reviewer/penelitian/formPenilaian');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <input type='hidden' name="jenis" value="<?= $v->id_jenis ?>">
                                    <button type="submit" class="btn-sm btn-primary">
                                        Penilaian
                                    </button>
                                    
                                </form>

                <?php elseif(($v->nilai!=NULL ||$v->nilai!="" ||$v->nilai!="0") && ($v->status==2 || $v->status==3 || $v->status==4 || $v->status==5)) : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Edit
                                    </button>

                <?php elseif($v->nilai!=NULL ||$v->nilai!="" ||$v->nilai!="0") : ?>
                    <form style="display:inline-block;" method="post" action=<?= base_url('reviewer/penelitian/editPenilaian');?>>
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
                <td align="center"><?= $no++?></td>
                <td align="center"><?= $v->judul?></td>
                <td align="center"><?= $v->jenis?></td>
                <td align="center"><?= $v->nilai2 ?></td>
                <td align="center">

                <?php if($v->nilai2==NULL ||$v->nilai2=="" ||$v->nilai2=="0") :?>
                    <form method="post" action=<?= base_url('reviewer/penelitian/formPenilaian');?>>
                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                    <input type='hidden' name="jenis" value="<?= $v->id_jenis ?>">
                                    <button type="submit" class="btn-sm btn-primary">
                                        Penilaian
                                    </button>
                                    
                                </form> 

                <?php elseif(($v->nilai2!=NULL ||$v->nilai2!="" ||$v->nilai2!="0")&&($v->status==2 || $v->status==3 || $v->status==4 || $v->status==5)) : ?>
                                <button type="button" class="btn-sm btn-default" dissabled>
                                        Edit
                                    </button>

                <?php elseif($v->nilai2!=NULL ||$v->nilai2!="" ||$v->nilai2!="0") : ?>
                    <form style="display:inline-block;" method="post" action=<?= base_url('reviewer/penelitian/editPenilaian');?>>
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
