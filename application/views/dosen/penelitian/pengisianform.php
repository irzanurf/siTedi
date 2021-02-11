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
									<form action="<?= base_url('dosen/penelitian/addformproposal');?>" method="post" enctype="multipart/form-data"> 
                                    <div class="form-group">
                                    <label>Jenis Penelitian</label>
                                    <select class="form-control" name="jenis" id="jenis">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($jenispenelitian as $jp) {
                                            ?>
                                            <option value="<?php echo $jp->id; ?>"><?php echo $jp->jenis; ?> - <?php echo $jp->tgl; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                        <div class="form-group"> 
											<label>Judul Penelitian</label> 
											<input name="judul" class="form-control"> 
										</div> 
										<div class="form-group"> 
											<label>Abstrak</label> 
											<textarea name="abstrak" rows="4" class="form-control"> </textarea>
										</div> 
										<div class="form-group"> 
											<label">Lokasi</label> 
											<input name="lokasi" class="form-control" placeholder="Kelurahan, Kota, Provinsi"> 
										</div> 
										<div class="form-group"> 
											<label>Mitra</label> 
											<input name="mitra" class="form-control"> 
                                        </div> 
                                        <div class="form-group"> 
											<label>Lama Penelitian</label> 
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
                                    <input type="text" class="form-control currency" name="biaya">
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
                                            <option value="<?php echo $sd->id; ?>"><?php echo $sd->sumberdana; ?> - <?php echo $sd->tgl; ?></option>
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
                                            <option value="<?php echo $l->id; ?>"><?php echo $l->luaran; ?> - <?php echo $l->tgl; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                <label>Anggota Dosen</label>
                                <div class="input-group control-group after-add-more">
                               <select class="form-control" name="dosen[]">
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
                                    <button class="btn-sm btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                                </div>

                                <div class="form-group">
                                <label><br>Anggota Mahasiswa (NIM)</label>
                                <div class="input-group control-group1 after-add-more1">
                                <input class="form-control" name="nim_mahasiswa[]" placeholder="NIM Mahasiswa" >
                                <input class="form-control" name="nama_mahasiswa[]" placeholder="Nama Mahasiswa" >
                               <!-- <select class="form-control" name="mahasiswa[]">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach ($mahasiswa as $mhs) {
                                        ?>
                                        <option value ="<?php echo $mhs->nim; ?>"><?php echo $mhs->nama ?></option>
                                        <?php
                                    }
                                    ?> -->
                                <!-- </select> -->
                                 <div class="input-group-btn"> 
                                    <button class="btn-sm btn-success add-more1" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                                </div>

                                
                            </div>

                            <div class="copy hide">
                                <div class="control-group input-group" style="margin-top:10px">
                                <select class="form-control" name="dosen[]">
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
                                    <button class="btn-sm btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>

                            <div class="copy1 hide">
                                <div class="control-group1 input-group" style="margin-top:10px">
                                <input class="form-control" name="nim_mahasiswa[]" placeholder="NIM Mahasiswa" >
                                <input class="form-control" name="nama_mahasiswa[]" placeholder="Nama Mahasiswa" >
                                <!-- <select class="form-control" name="mahasiswa[]">
                                    <option value="">Please select</option>
                                    <?php
                                    foreach ($mahasiswa as $mhs) {
                                        ?>
                                        <option value ="<?php echo $mhs->nim; ?>"><?php echo $mhs->nama ?></option>
                                        <?php
                                    }
                                    ?>
                                </select> -->
                                    <div class="input-group-btn"> 
                                    <button class="btn-sm btn-danger remove1" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group"> 
											<label for="exampleInputFile"><br>File Proposal</label> 
											<input type="file" name="file_prop"> 
                                        </div> 

										<button type="submit" class="btn btn-success w3ls-button">Submit</button> 
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
        $( '.currency' ).keyup(function(event) {
            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            ;
            });
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
