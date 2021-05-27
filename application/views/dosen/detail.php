<!-- input-forms -->
<div class="grids">
					<div class="progressbar-heading grids-heading">
                        <h2>Detail Nilai</h2>
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
                        <label class="col-lg-4 col-form-label">Judul Pengabdian</label>
                        <div class="col-lg-8">
                            <p><?=$proposal->judul;?></p>
                        </div>
                    </div>
                   
                        <?php }?>
                            <iframe src="<?= base_url('assets/prop_pengabdian');?>/<?=$proposal->file?>" width="93%" height="400px" >
                            </iframe>
                        </div>
                        <div class="col-lg-1"></div>
                    
                    </div>
                    <table class="table">
                    <input type="hidden" class="form-control" name="id" value=<?= $proposal->id?>  >
                        <tr>
                            <th>No.</th>
                            <th>Komponen Pengabdian</th>
                            <th>Nilai Reviewer 1</th>
                            <th>Nilai Reviewer 2</th>
                        </tr>
                        <?php 
                        $no = 1;
                        for($i=0, $count = count($jenis);$i<$count;$i++) {?>
                            <tr>
                            <td><?= $no+$i?></td>
                            <td> <?= $jenis[$i]->komponen_penilaian?></td>
                        <td><?=$komponen[$i]->nilai?></td>         
                        <td><?=$komponen2[$i]->nilai?></td> 
                        <?php }?>
                        
                            </tr>
                            
                            
                            <tr>
                            <td colspan='2'>Total</td>
                            <td><?= $nilai ?></td>
                            <td><?= $nilai2 ?></td>
                            </tr>
                            <input type="text" id="total" value=<?=$no?> hidden>
                        </table>
                    <div class="form-group">
                        <h4><br>Komentar Reviewer 1</h4>
                        <div >
                            <?= $komentar ?>
                        </div>
                        </div>
                        <div class="form-group">
                        <h4><br>Komentar Reviewer 2</h4>
                        <div >
                            <?= $komentar2 ?>
                        </div>
                        </div>
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
