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
                    <li>
                        <a href="<?= base_url('dosen/pengabdian/laporanakhir');?>"><i class="fa fa-fw fa-clipboard"></i> Laporan Akhir</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <?php  }?>
        <?php  if(!empty($cek)){ ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?= base_url('reviewer/pengabdian/');?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-edit"></i> Reviewer <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?= base_url('reviewer/pengabdian/nilaiProposal/');?>"><i class="fa fa-fw fa-edit"></i> Nilai Proposal</a>
                            </li>
                        </ul>
                    
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-edit"></i> Pengajuan Proposal <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo1" class="collapse">
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
                    <li>
                        <a href="<?= base_url('dosen/pengabdian/laporanakhir');?>"><i class="fa fa-fw fa-clipboard"></i> Laporan Akhir</a>
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
                        <a href="<?= base_url('admin/pengabdian/');?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-edit"></i> Proposal<i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a href="<?= base_url('admin/pengabdian/assignproposal/');?>"><i class="fa fa-fw fa-edit"></i> Assign Proposal</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/pengabdian/approval/');?>"><i class="fa fa-fw fa-edit"></i> Approval Proposal</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/pengabdian/daftarPengabdian/');?>"><i class="fa fa-fw fa-edit"></i> Status Proposal</a>
                                </li>
                        </ul>
                        
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-edit"></i> Laporan Akhir<i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo1" class="collapse">
                                <li>
                                    <a href="<?= base_url('admin/pengabdian/laporanakhir/');?>"><i class="fa fa-fw fa-clipboard"></i> List Laporan Akhir</a>
                                </li>
                        </ul>
                        
                    </li>
                   
                    
                    <li>
                        <a href="<?= base_url('admin/pengabdian/skemapengabdian/');?>"><i class="fa fa-fw fa-edit"></i> Skema Pengabdian</a>
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