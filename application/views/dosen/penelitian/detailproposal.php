<!-- input-forms -->
<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Form Pengisian</h2>
					</div>
					<div class="panel panel-widget forms-panel">
						<div class="forms">
							<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
								</div>
								<div class="form-body">
									<form action="<?= base_url('dosen/penelitian/editformProposal');?>" method="post" enctype="multipart/form-data"> 
                                    <div class="form-group">
                                    <label>Jenis Penelitian</label>
                                    <select class="form-control" name="jenis" id="jenis">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($skema as $sd) {
                                            ?>
                                            <option value="<?php echo $sd->id; ?>"<?php echo ($sd->id==$proposal->id_jenis) ? "selected='selected'" : "" ?>><?php echo $sd->jenis; ?> - <?php echo $sd->tgl; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                   
                                    <div class="form-group">
                                    <label>Judul Penelitian</label>
                                    <input class="form-control" name="judul" value=<?= $proposal->judul?>  >
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $proposal->id?>  >
                                </div>

                                <div class="form-group">
                                    <label>Abstrak</label>
                                    <textarea class="form-control" rows="3" name="abstrak"  ><?= $proposal->abstrak?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <textarea class="form-control" rows="3" name="lokasi"  ><?= $proposal->lokasi?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Mitra</label>
                                    <input class="form-control" name="mitra" value=<?= $proposal->mitra?> >
                                </div>
                                <label>Lama Penelitian</label></br>
                                <font color="green"><?= $proposal->lama_pelaksanaan?></font>
                                
                                <textarea style="display:none;" class="form-control" rows="3" name="cek"  ><?= $proposal->lama_pelaksanaan?></textarea>
                                
                                <div class="form-group"> 
											
											<div class="form-group input-group">
                                            <input type="text" class="form-control" name="bulan">
                                            <span class="input-group-addon">bulan</span>
                                            <input type="text" class="form-control" name="tahun">
                                            <span class="input-group-addon">tahun</span>
                                        </div>
    

                                <div class="form-group">
                                    <label>Biaya</label>
                                    <div class="form-group input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="text" class="form-control" name="biaya" value=<?= $proposal->biaya?>>
                                    <span class="input-group-addon">,00</span>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label>Sumber Dana</label>
                                    <select class="form-control" name="sumberdana" id="sumberdana">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($sumberdana as $sd) {
                                            ?>
                                            <option value="<?php echo $sd->id; ?>" <?php echo ($sd->id==$proposal->id_sumberdana) ? "selected='selected'" : "" ?>><?php echo $sd->sumberdana; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Luaran</label>
                                    <select class="form-control" name="luaran" id="luaran">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($luaran as $l) {
                                            ?>
                                            <option value="<?php echo $l->id; ?>" <?php echo ($l->id==$proposal->id_luaran) ? "selected='selected'" : "" ?>><?php echo $l->luaran; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                <label>Anggota Dosen</label>
                                <div class="input-group-btn"> 
                                    <button class="btn-sm btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                                <?php 
                        foreach($anggota_dosen as $k=>$val){?>
                            <div class="control-group input-group" style="margin-top:10px">
                                <select class="form-control" name="dosen[]">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($dosen as $ds) {
                                        ?>
                                        <option value ="<?php echo $ds->nip; ?>" <?php echo ($ds->nip==$val->nip) ? "selected='selected'" : "" ?>><?php echo $ds->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                        <input class='form-control hidden' type="text" id="bobot" name="id_dsn_anggota[]" value=<?=$val->id?> hidden>
                                    
                                </select>
                                    <div class="input-group-btn"> 
                                    <button class="btn-sm btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>

                    <?php }?>
                    <div class="after-add-more"></div>
                                
                

                                <div class="form-group">
                                <label><br>Anggota Mahasiswa</label>
                                <div class="input-group-btn"> 
                                    <button class="btn-sm btn-success add-more1" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                                <?php 
                                foreach($anggota_mhs as $k=>$val){?>
                                <div class="control-group1 input-group" style="margin-top:10px">
                                    <select class="form-control" name="mahasiswa[]">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($mahasiswa as $mhs) {
                                            ?>
                                            <option value ="<?php echo $mhs->nim; ?>" <?php echo ($mhs->nim==$val->nim) ? "selected='selected'" : "" ?>><?php echo $mhs->nama ?></option>
                                            <?php
                                        }
                                        ?>
                                            <input class='form-control hidden' type="text" id="bobot" name="id_mhs_anggota[]" value=<?=$val->id?> hidden>
                                       
                                    </select>
                                        <div class="input-group-btn"> 
                                        <button class="btn-sm btn-danger remove1" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                        </div>
                                    </div>

                        <?php }?>
                        <div class="after-add-more1"></div>
                            

                            <div class="copy hide">
                                <div class="control-group input-group" style="margin-top:10px">
                                <select class="form-control" name="dosen_new[]">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($dosen as $ds) {
                                        ?>
                                        <option value ="<?php echo $ds->nip; ?>"><?php echo $ds->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>

                            <div class="copy1 hide">
                                <div class="control-group1 input-group" style="margin-top:10px">
                                <select class="form-control" name="mahasiswa_new[]">
                                    <option value="">Please select</option>
                                    <?php
                                    foreach ($mahasiswa as $mhs) {
                                        ?>
                                        <option value ="<?php echo $mhs->nim; ?>"><?php echo $mhs->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove1" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>


										<button type="submit" class="btn btn-default w3ls-button">Submit</button> 
									</form> 
								</div>
							</div>
						</div>
                    </div>
</div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
      $(".add-more1").click(function(){ 
          var html = $(".copy1").html();
          $(".after-add-more1").after(html);
      });
      $("body").on("click",".remove1",function(){ 
          $(this).parents(".control-group1").remove();
      });
    });
    </script>
