<!-- input-forms -->
<div class="grids">
					<div class="progressbar-heading grids-heading">
                        <h2>Penilaian</h2>
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
                            <iframe src="<?= base_url('assets/prop_penelitian');?>/<?=$proposal->file?>" width="93%" height="400px" >
                            </iframe>
                        </div>
                        <div class="col-lg-1"></div>
                    
                    </div>
                    <table class="table">
                    <form method='POST' action="<?= base_url('reviewer/penelitian/editNilai');?>" >
                    <input type="hidden" class="form-control" name="id" value=<?= $proposal->id?>  >
                        <tr>
                            <th>No.</th>
                            <th>Komponen Penilaian</th>
                            <th>Bobot</th>
                            <th>Skor</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                        <?php 
                        $no = 1;
                        foreach($nilai as $k) {?>
                            <tr>
                            <td><?= $no?></td>
                        <td><?= $k->komponen?></td>
                        <td><input type="text" id="bobot<?=$no?>" name="bobot" value="<?= $k->bobot ?>" disabled></td>
                        <td><input class="form-control" name="<?=$k->id?>" id="skor<?=$no?>" value="<?=$k->skor?>" readonly></td>
                        <td><input type="text" id="nilai<?=$no++?>" name="nilai<?=$k->id?>" value="<?=$k->nilai?>" readonly></td> 
                      
                        <?php }?>
                            </tr>
                            
                            
                            <tr>
                            <td colspan='4'>Total</td>
                            <td><input type="text" name="total_nilai" id="totalnilai" value="<?= $total->nilai ?>" readonly></td>
                            </tr>
                            <input type="text" id="total" value=<?=$no?> hidden>
                        </table>
                    <p>Keterangan: Skor : 1, 2, 4, 5 (1 = sangat kurang, 2 = kurang, 4 = baik, 5 = sangat baik); Nilai = Bobot x Skor</p>
                    
                    <div class="form-group">
                        <label><br>Komentar Penilai</label>
                        <div >
                            <textarea class="form-control" name="komentar"  rows="3"><?= $total->komentar ?></textarea>
                        </div>
                        </div>
                    
                        <button type="submit" class="btn btn-default w3ls-button">Submit</button>
                    </form>
</div>
                        </div>
                        </div>
                        </div>



        </script>
    
        
    
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
