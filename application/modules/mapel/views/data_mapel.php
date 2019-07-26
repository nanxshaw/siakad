
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
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <!-- <h4 class="m-t-0 header-title"><b>Default Example</b></h4> -->
                            <div style="margin-bottom:20px;">
                                <a href="mapel/form_insert_mapel" class="btn btn-primary waves-effect"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                                <!-- <button class="btn btn-success waves-effect"><span class="glyphicon glyphicon-export"></span> Export Excel</button> -->
                            </div>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach ($row as $key ) {
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $key->kode_mapel; ?></td>
                                        <td><?php echo $key->nama_mapel; ?></td>
                                        <td> 
                                            <a href="mapel/form_edit_mapel/<?php echo $key->id_mapel; ?>" class="btn btn-primary  waves-effect"><span class="glyphicon glyphicon-pencil"></span></a>
                                           <button idne="<?php echo $key->id_mapel; ?>" class="btn btn-danger waves-effect waves-light btndel" ><span class="glyphicon glyphicon-trash"></span></button>
                                        </td>
                                    </tr>
                                    <?php 
                                    } 
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="<?php echo base_url(); ?>index.php/mapel/del_data" method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                                        </div>
                                        <div class="modal-body" style="text-align:center;">
                                            <h4>Anda Yakin Ingin Menghapus Data ini ?</h4>
                                            <input type="hidden" name="id">
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> -->
                                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Tidak</button>
                                            <button type="submit" class="btn btn-danger waves-effect waves-light">Iya</button>
                                        </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->


