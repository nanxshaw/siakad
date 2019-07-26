
        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    
                                    <li>
                                        <a href="#"><?php echo $page['page1']; ?></a>
                                    </li>
                                    <li class="active">
                                        <?php echo $page['page2']; ?>
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?php echo $page['title']; ?></h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-sm-6">
                        <div class="card-box">
                            <!-- <h4 class="m-t-0 header-title"><b>Input Types</b></h4> -->
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">NIP</label>
                                            <div class="col-md-9">
                                                <div class="tx"><?php echo $row->nip; ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama</label>
                                            <div class="col-md-9">
                                                <div class="tx"><?php echo $row->nama; ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tgl Lahir</label>
                                            <div class="col-md-9">
                                                <div class="tx"><?php echo $row->tgl_lahir; ?></div>    
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kewarganegaraan</label>
                                            <div class="col-md-9">
                                                <div class="tx"><?php echo $row->kewarganegaraan; ?></div>    
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Kelamin</label>
                                            <div class="col-md-9">
                                                <div class="tx"><?php echo $row->jenis_kelamin; ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Mapel</label>
                                            <div class="col-md-9">
                                                <div class="tx"><?php echo $row->nama_mapel; ?></div> 
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <a href="<?php echo base_url(); ?>index.php/guru" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Kembali</a>
                                         </div>


                                    </form>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>

<style>
.tx{
    padding-top:8px;
}
</style>