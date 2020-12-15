<!-- input-forms -->
<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Monitoring & Evaluasi</h2>
					</div>

                    <div class="panel panel-widget forms-panel">
                    <div class="forms">
                    <div class="form-body">
                        
							
                    <form action="<?= base_url('dosen/penelitian/uploadMonev');?>" method="post" enctype="multipart/form-data"> 
                            <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $proposal->id?>  >
                            </div>
                            <div class="form-group"> 
											<label><br>Logbook</label> 
											<input type="file" name="file1"> 
                            </div> 

                            <div class="form-group"> 
											<label><br>Laporan Catatan</label> 
											<input type="file" name="file2"> 
                            </div> 

                            <div class="form-group"> 
											<label><br>Laporan Belanja 70%</label> 
											<input type="file" name="file3"> 
                            </div> 

                            <div class="form-group"> 
											<label>Catatan</label> 
											<textarea name="catatan" rows="4" class="form-control"> </textarea>
							</div> 

										<button type="submit" class="btn btn-default w3ls-button">Submit</button> 
									</form> 
								</div>
							</div>
                        </div>
</div>
</div>
</div>
