<!-- input-forms -->
<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Dinalisasi</h2>
                    </div>
                    <div class="panel panel-widget forms-panel">
						<div class="forms">
							<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
								</div>
								<div class="form-body">
                    <?= form_open_multipart('dosen/penelitian/finishClick');?>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $proposal->id?>  >
                                </div>
                                <div class="form-group">
                                    <label>Judul Penelitian</label>
                                    <input class="form-control" name="judul" readonly value=<?= $proposal->judul?>  >
                                </div>

                                <div class="form-group">
                                    <label>Abstrak</label>
                                    <textarea class="form-control" rows="3" name="abstrak" readonly  ><?= $proposal->abstrak?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <textarea class="form-control" rows="3" name="abstrak" readonly  ><?= $proposal->lokasi?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Mitra</label>
                                    <input class="form-control" name="mitra" readonly value=<?= $proposal->mitra?> >
                                </div>

    

                                <div class="form-group">
                                    <label>Biaya</label>
                                    <div class="form-group input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="text" class="form-control" name="biaya" readonly value=<?= $proposal->biaya?>>
                                    <span class="input-group-addon">,00</span>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label>Sumber Dana</label>
                                    <select class="form-control" name="sumberdana" id="sumberdana">
                                        <?php
                                        foreach ($sumberdana as $sd) {
                                            ?>
                                            <option readonly value="<?php echo $sd->id; ?>"><?php echo $sd->sumberdana; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Luaran</label>
                                    <select class="form-control" name="luaran" id="luaran">
                                        <?php
                                        foreach ($luaran as $l) {
                                            ?>
                                            <option readonly value="<?php echo $l->id; ?>"><?php echo $l->luaran; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- <div class="form-group">
                                    <label>Sumber Dana</label>
                                    <select class="form-control" name="sumberdana" id="sumberdana">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($sumberdana as $sd) {
                                            ?>
                                            <option value="<?php echo $sd->id; ?>"><?php echo $sd->sumberdana; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div> -->
                                

                                
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda Yakin Ingin Melakukan Finalisasi?');">Finish</button>
                                
                            <?= form_close(); ?>
                    
                
                
                    

                    
            
                                    </div>
                                    </div>
                    </div>
                </div>
                
                
                
                    

                    
            

                    </div>
                </div></div>
