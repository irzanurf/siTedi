<!-- input-forms -->
<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Laporan Akhir</h2>
					</div>

                    <div class="panel panel-widget forms-panel">
                    <div class="col-lg-10" style="float:none;margin:auto;">
                    <div class="form-body">
                        
							
                    <form action="<?= base_url('dosen/penelitian/updateAkhir');?>" method="post" enctype="multipart/form-data"> 
                            <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $proposal->id?>  >
                            </div>
                            <div class="form-group"> 
											<h3>Laporan Final</h3>
											<?php if (!empty($akhir->file1)){ ?>
											<iframe src="<?= base_url('assets/lap_akhir_penelitian');?>/<?=$akhir->file1?>" width="93%" height="400px" >
                            </iframe>
							<?php } ?>
							</div>
							<div class="form-group"> 
											<input type="file" accept="application/pdf" name="file1"></br>
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label>
                            </div> 

                            <div class="form-group"> 
											<h3>Logbook</h3>
											<?php if (!empty($akhir->file2)){ ?>
											<iframe src="<?= base_url('assets/lap_akhir_penelitian');?>/<?=$akhir->file2?>" width="93%" height="400px" >
                            </iframe>
							<?php } ?>
							</div>
							<div class="form-group"> 
											<input type="file" accept="application/pdf" name="file2"></br> 
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label>
                            </div> 

                            <div class="form-group"> 
							
											<h3>Laporan Belanja 100%</h3>
											<?php if (!empty($akhir->file3)){ ?>
											<iframe src="<?= base_url('assets/lap_akhir_penelitian');?>/<?=$akhir->file3?>" width="93%" height="400px" >
                            </iframe>
							<?php } ?>
							</div>
							<div class="form-group">
											<input type="file" accept="application/pdf" name="file3"></br>
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label>
                            </div> 

							

							<h3>Luaran</h3>
					
											<?php
												for($i=0, $count = count($luaran);$i<$count;$i++) {?>
											<div class="form-group" style="background: #FFFFFF; padding: 0px 10px 0px 10px;"> 

											<a href="#" data-toggle="collapse" style="color: black; font-size: 17px;" data-target=<?="#penelitian".$i.""?>><i class="fa fa-fw fa-edit"></i> <?= $luaran[$i]->luaran?><i class="fa fa-fw fa-caret-down"></i></a>
                        					<ul id=<?="penelitian".$i.""?> class="collapse">
                            				<div class="form-group">
                                    		<h5><br><b><?= $luaran[$i]->luaran?></b></h5>
											
											<div class="form-group">
                                    			<input type="hidden" name=<?= "id_luaran".$i."" ?> class="form-control"  value=<?= $luaran[$i]->id_luaran?>  >
                                			</div>
											<div class="form-group">
                                    			<textarea class="form-control" name=<?= "jenis".$i."" ?>  style="display:none;" rows="1" name=<?="jenis".$i."" ?>><?= $luaran[$i]->luaran?></textarea>
                                			</div>
											<div class="form-group">
                                    			<label>Judul</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    			<textarea class="form-control" style="background: #edf1f5;" rows="2" value="" name=<?="judul".$i."" ?> ><?= $luaran[$i]->judul?></textarea>
                                			</div>
											<div class="form-group">
                                    			<label>Nama Jurnal/Artikel/Modul/Draft/Blueprint/Metode</label>
                                    			<textarea class="form-control" style="background: #edf1f5;" rows="2" value="" name=<?="nama".$i."" ?> ><?= $luaran[$i]->nama?></textarea>
                                			</div>
											<div class="form-group">
                                    			<label>Author</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    			<textarea class="form-control" style="background: #edf1f5;" rows="2" value="" name=<?="author".$i."" ?> ><?= $luaran[$i]->author?></textarea>
                                			</div>
											<div class="form-group">
                                    			<label>Tahun</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    			<input class="form-control" type="number" style="background: #edf1f5;" value="<?= $luaran[$i]->tahun?>" name=<?="tahun".$i."" ?> ></input>
                                			</div>
											<div class="form-group">
                                    			<label>Link</label>
                                    			<input class="form-control" style="background: #edf1f5;" value="<?= $luaran[$i]->link?>" name=<?="link".$i."" ?> ></input>
                                			</div>
											<div class="form-group">
                                                <label>Jumlah Sitasi</label>
                                                <input class="form-control" type="number" style="background: #edf1f5;" value="<?= $luaran[$i]->sitasi?>" name=<?="sitasi".$i."" ?> ></input>
                                            </div>
											<div class="form-group"> 
											<?php if (!empty($luaran[$i]->file)){ ?>
											<iframe src="<?= base_url('assets/lap_akhir_penelitian');?>/<?=$luaran[$i]->file?>" width="93%" height="400px" >
                           					 </iframe>
												<?php } ?>
											</div>

											<input type="file" accept="application/pdf" name=<?="file_luaran".$i."" ?>> </br>
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label>
											</div>
                                			</div>
                            
                        					</ul>

											
											<?php } ?>

							<div class="form-group"> 
											<label>Catatan</label> 
											<textarea name="catatan" rows="4" class="form-control"><?= $akhir->catatan?></textarea>
							</div>

										<button type="submit" class="btn btn-success">Submit</button> 
									</form> 
								</div>
							</div>
                        </div>
</div>
</div>
</div>
