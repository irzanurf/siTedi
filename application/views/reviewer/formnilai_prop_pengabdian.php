
 <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Form Penilaian Proposal Pengabdian
            </h1>
            <ol class="breadcrumb">
                
                <li class="active">
                    <i class="fa fa-edit"></i> Penilaian Pengabdian
                </li>
            </ol>
        </div>
    </div>
<div class="row">
                    <div class="col-lg-12">
                    
                    <section class="content">
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Judul Pengabdian</label>
                        <div class="col-lg-8">
                            <p><?=$prop->judul;?></p>
                        </div>
                    </div>
                    <label>Ketua Pengabdian</label>
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
                        <label class="col-lg-4 col-form-label">Lama Pengabdian</label>
                        <div class="col-lg-8">
                            <p><?=$prop->lama_pelaksanaan;?></p>
                        </div>
                    </div> 
                    <div class='form-group row'>
                        <label class="col-lg-4 col-form-label">Biaya Pengabdian</label>
                        <div class="col-lg-8">
                            <p>Rp <?=  number_format($prop->biaya,2,',','.');?></p>
                        </div>
                    </div> 
                    <div class="row" >
                        <div class="col-lg-1"></div>
                        <div class="col-lg-11">
                            <iframe src="<?= base_url('assets/prop_pengabdian');?>/<?=$prop->file?>" width="93%" height="400px" >
                            </iframe>
                        </div>
                        <div class="col-lg-1"></div>
                    
                    </div>
                    <table class="table">
                    <form method='POST' action="<?= base_url('reviewer/pengabdian/submitNilai');?>" >
                    <input name="id" value="<?=$prop->id?>" hidden>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center" width="500px">Komponen Penilaian</th>
                            <th class="text-center">Bobot (B)</th>
                            <th class="text-center" width='100px'>Skor (S)</th>
                            <th class="text-center">Nilai</th>
                        </tr>
                        <?php 
                        $no = 1;
                        foreach($komponen as $k) {?>
                        <tr>
                        <td><?= $no?></td>
                        <td><?= $k->komponen_penilaian?></td>
                        <td><input type="text" id="bobot<?=$no?>" name="bobot" value="<?= $k->bobot ?>" disabled></td>
                        <td><input class="form-control" name="<?=$k->id?>" id="skor<?=$no?>" value="" require=""></td>
                        <td><input type="text" id="nilai<?=$no++?>" name="nilai<?=$k->id?>" value="0" readonly></td>
                            
                        </tr>
                        
                        <?php }?>
                        <tr>
                        <td colspan='4'>Total</td>
                        <td><input type="text" name="total_nilai" id="totalnilai" value="0" readonly></td>
                        </tr>
                        <input type="text" id="total" value=<?=$no?> hidden>
                    </table>
                    
                    
                    
                    <p>Keterangan: Skor : 1, 2, 4, 5 (1 = sangat kurang, 2 = kurang, 4 = baik, 5 = sangat baik); Nilai = Bobot x Skor</p>

                    <div class="form-group">
                        <label>Komentar Penilai</label>
                        <div >
                            <textarea class="form-control" name="komentar"  rows="3"></textarea>
                        </div>
                    </div>
                    <button type="submit">Submit</button>
                    </form>
                    </section>

                    <!-- <input type="text" name="input1" id="input1" value="5">
<input type="text" name="input2" id="input2" value=""> <a href="javascript: void(0)" onClick="calc()">Calculate</a>

<input type="text" name="output" id="output" value=""> -->
                    

                    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    
    

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


</body>

</html>
