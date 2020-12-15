            <?php  if($this->session->userdata('role')=='3'){ ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?= base_url('dosen/pengabdian/');?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-edit"></i> Pengajuan Proposal <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a href="<?= base_url('dosen/pengabdian/pengisianform/');?>">Form Pengajuan</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('dosen/pengabdian/submitpermohonan/');?>">Submit Proposal</a>
                                </li>
                            </ul>
                        
                    </li>
                        
                    <li>
                        <a href="<?= base_url('dosen/pengabdian/daftarpermohonan');?>"><i class="fa fa-fw fa-file"></i> Permohonan</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <?php  }?>
        <?php  if($this->session->userdata('role')=='2'){ ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?= base_url('reviewer/pengabdian/');?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= base_url('reviewer/pengabdian/daftarProposal/');?>"><i class="fa fa-fw fa-edit"></i> Penilaian Proposal</a>
                    </li>
                    <li>
                        <a href="<?= base_url('reviewer/pengabdian/nilaiProposal/');?>"><i class="fa fa-fw fa-edit"></i> Nilai Proposal</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <?php  }?>
        <?php  if($this->session->userdata('role')=='1'){ ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?= base_url('admin/penelitian/');?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/penelitian/skemapenelitian/');?>"><i class="fa fa-fw fa-edit"></i> Skema Penelitian</a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/penelitian/showReviewer/');?>"><i class="fa fa-fw fa-edit"></i> Reviewer Penelitian</a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/penelitian/assignProposal/');?>"><i class="fa fa-fw fa-edit"></i> Assign Proposal</a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/penelitian/approval/');?>"><i class="fa fa-fw fa-edit"></i> Aproval Penelitian</a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/penelitian/monev/');?>"><i class="fa fa-fw fa-edit"></i> Monitoring & Evaluasi</a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/penelitian/akhir/');?>"><i class="fa fa-fw fa-edit"></i> Laporan Akhir</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <?php  }?>
        <?php  if($this->session->userdata('role')=='4'){ ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?= base_url('mitra/verifikasi/');?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <?php  }?>