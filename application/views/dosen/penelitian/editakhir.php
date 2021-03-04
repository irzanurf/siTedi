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
											<iframe src="<?= base_url('assets/lap_akhir_penelitian');?>/<?=$akhir->file1?>" width="93%" height="400px" >
                            </iframe>
							</div>
							<div class="form-group"> 
											<input type="file" accept="application/pdf" name="file1"></br>
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label>
                            </div> 

                            <div class="form-group"> 
											<h3>Logbook</h3>
											<iframe src="<?= base_url('assets/lap_akhir_penelitian');?>/<?=$akhir->file2?>" width="93%" height="400px" >
                            </iframe>
							</div>
							<div class="form-group"> 
											<input type="file" accept="application/pdf" name="file2"></br> 
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label>
                            </div> 

							<div class="form-group"> 
											<h3>Luaran</h3>
											<iframe src="<?= base_url('assets/lap_akhir_penelitian');?>/<?=$akhir->file3?>" width="93%" height="400px" >
                            </iframe>
							</div>
							<div class="form-group"> 
											<input type="file" accept="application/pdf" name="file3"></br> 
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label>
                            </div> 

                            <div class="form-group"> 
											<h3>Laporan Belanja 100%</h3>
											<iframe src="<?= base_url('assets/lap_akhir_penelitian');?>/<?=$akhir->file4?>" width="93%" height="400px" >
                            </iframe>
							</div>
							<div class="form-group">
											<input type="file" accept="application/pdf" name="file4"></br>
											<label style="color:red; font-size:12px;">.pdf maks 10mb</label>
                            </div> 

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
