<!-- input-forms -->
<div class="grids">
					<div class="progressbar-heading grids-heading">
                        <h2>Review Monev</h2>
                    </div>
                    <div class="panel panel-widget forms-panel">
						<div class="forms">
							<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
								</div>
								<div class="form-body">
                    <div class="row" >
                        <div class="col-lg-1"></div>
                        <div class="col-lg-11">
                        <div class='form-group row'>
                        <?php {?>
                        <label class="col-lg-4 col-form-label">Judul Penelitian</label>
                        <div class="col-lg-8">
                            <p><?=$proposal->judul;?></p>
                        </div>
                    </div>
                    <label>Ketua Penelitian</label>
                    <div class='form-group row'>
                        <p class="col-lg-4">Nama Lengkap</p>
                        <div class="col-lg-8">
                            <p><?=$dosen->nama;?></p>
                        </div><br>
                        <p class="col-lg-4">NIP/NIDN</p>
                        <div class="col-lg-8">
                            <p><?=$dosen->nip;?></p>
                        </div><br>
                        <p class="col-lg-4 ">Program Studi</p>
                        <div class="col-lg-8">
                            <p><?=$dosen->program_studi;?></p>
                        </div>
                    </div>
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Lama Penelitian</label>
                        <div class="col-lg-8">
                            <p><?=$proposal->lama_pelaksanaan;?></p>
                        </div>
                    </div> 
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Biaya Penelitian</label>
                        <div class="col-lg-8">
                            <p>Rp <?=  number_format($proposal->biaya,2,',','.');?></p>
                        </div>
                    </div>
                    <?php }?>
                    <div class="form-group"> 
											<label><br>Logbook</label> 

                            </div> 
                            <iframe src="<?= base_url('assets/monev_penelitian');?>/<?=$monev->file3?>" width="93%" height="400px" >
                            </iframe>
                            <div class="form-group"> 
											<label><br>Laporan Kemajuan</label> 
											
                            </div> 
                            <iframe src="<?= base_url('assets/monev_penelitian');?>/<?=$monev->file2?>" width="93%" height="400px" >
                            </iframe>
                            <div class="form-group"> 
											<label><br>Laporan Belanja 70%</label> 
											
                            </div> 
                            <iframe src="<?= base_url('assets/monev_penelitian');?>/<?=$monev->file1?>" width="93%" height="400px" >
                            </iframe>
                        </div>
                        <div class="col-lg-1"></div>
                    
                    </div>
                    <table class="table">
                    <form method='POST' action="<?= base_url('reviewer/penelitian/submitMonev');?>" >
                    <input type="hidden" class="form-control" name="id" value=<?= $proposal->id?>  >
                        
                    <div class="form-group">
                        <label><br>Komentar Penilai</label>
                        <div>
                            <textarea class="form-control" name="komentar"   rows="3"><?= $komentar ?></textarea>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
</div>
                        </div>
                        </div>
                        </div>

<!-- jQuery Version 1.11.0 -->
<script src="<?= base_url('assets/template/js/jquery-1.11.0.js');?>">
        


        </script>
    
        <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url('assets/template/js/bootstrap.min.js');?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        
    
        <script>
    //     $("#input2,#input1").keyup(function() {
    
    // $('#output').val($('#input1').val() * $('#input2').val());
    
    // });
    
        var length = $('#total').val();
        var arr = [];
        
        for (var index = 1; index < length; index++){
            arr.push(index);
    
        }
    
        $.each(arr, function (index, value){
            var skor = '#skor' + value;
            var bobot = '#bobot' + value;
            var skorbobot = skor +','+bobot;
            var nilai = '#nilai' + value;
            // $('#nilai'+index).val(skorbobot);
            $(skorbobot).keyup(function () {
    
            $(nilai).val($(skor).val() * $(bobot).val());
            var total_nilai =0
            for(var i = 1; i<length;i++){
                    var n = $('#nilai'+i).val();
                    total_nilai += parseInt(n);
                }
            $('#totalnilai').val(total_nilai);
    
            });
            
    
        })
        // $.each(arr, function(index, value){
        //     $("#skor"+value).trigger('keyup');
        //     $("#skor"+value).on('keyup',function(){
        //         var total_nilai=0;
                
        //         // console.log(total_nilai);
                
    
        //     });
    
        // })
       
        
        
    
        
        
    
        
    
        // $('#totalnilai').val()
        
    
        // $(document).ready(function(){ 
        //     $('[id^=nilai]').on('change',function() {
        //                 var total = 0;
    
        //                 $('[id^=nilai]').each(function(index){
    
        //                     total += parseFloat($(this).val()?$(this).val():0);
        //                 });
                        
        //                 var totalAll = $('#totalnilai').val(total.toFixed(2));
                        
        //     });
        //     });
    
        // $()
        // var total_nilai;
        // for(var i = 1; i<length;i++){
        //     total_nilai += $('#nilai'+index).val();
        // }
    
        // $('#totalnilai').val(total_nilai);
        // var selector = '' + index;
        
    
    // $("#skor1,#bobot1").keyup(function () {
    
    // $('#nilai1').val($('#skor1').val() * $('#bobot1').val());
    
    // });
        
    
        
        </script>
