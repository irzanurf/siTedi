<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        <?php if(empty($jadwal->tgl_mulai) || empty($jadwal->tgl_akhir)) : ?>
                            <label>Belum ada jadwal</label>
                            <?php else : ?>

                            <label>Jadwal Pengumpulan Laporan Akhir telah terlewat (Batas Akhir : <?=$jadwal->tgl_akhir?>) </label>
                            <?php endif;?>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                    
                    <section class="content">
                    
                        <div class="panel-body">
                        
                        </div>
                        
                    
                            </div>
                        
                      
                    </table>
                    
                    
                    </section>
                    

                    
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
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
