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
                                    <label>Judul Penelitian</label>
                                    <input class="form-control" name="judul" value=<?= $proposal->judul?>  >
                                </div>

                                <div class="form-group">
                                    <label>Abstrak</label>
                                    <textarea class="form-control" rows="3" name="abstrak"  ><?= $proposal->abstrak?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <textarea class="form-control" rows="3" name="abstrak"  ><?= $proposal->lokasi?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Mitra</label>
                                    <input class="form-control" name="mitra" value=<?= $proposal->mitra?> >
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
                                            <option value="<?php echo $proposal->id_sumberdana; ?>"><?php echo $sd->sumberdana; ?></option>
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
                                            <option value="<?php echo $l->id; ?>"><?php echo $l->luaran; ?></option>
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
