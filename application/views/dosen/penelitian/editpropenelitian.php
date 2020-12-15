<!-- input-forms -->
<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Upload Proposal</h2>
					</div>
					<div class="row" >
                        <div class="col-lg-1"></div>
                        <div class="col-lg-11">
                            <iframe src="<?= base_url('assets/prop_penelitian');?>/<?=$proposal->file?>" width="93%" height="400px" >
                            </iframe>
                        </div>
                        <div class="col-lg-1"></div>
                    
                    </div>

                    <div class="panel panel-widget forms-panel">
						<div class="forms">
							<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
								</div>
								<div class="form-body">
                    <?php echo form_open_multipart('dosen/penelitian/uploadFileProp');?>
                    <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $proposal->id?>  >
                                </div>
                    <?php 

                    echo "<input type='file' name='file_prop' size='20' class='form-control' />"; ?>
                    <br>
                    <?php echo "<input type='submit' name='submit' value='upload' class='btn btn-info'/> ";?>
                    <?php echo "</form>"?>
                                
                            <?= form_close(); ?>
                    
                
                
                    

                    
            
                            </div>
                </div>
                    </div>
                </div>
</div>
</div>
