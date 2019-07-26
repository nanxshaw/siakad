
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
                                <!-- <button class="btn btn-success waves-effect"><span class="glyphicon glyphicon-export"></span> Export Excel</button> -->
                            </div>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <?php 
                                        for ($i=1; $i <= 6; $i++) { 
                                    ?>
                                    <th>Semester <?php echo $i; ?></th>
                                    <?php
                                        }
                                    ?>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($row as $key ) {
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $key->nama; ?></td>
                                        <?php 
                                            for ($i=1; $i <= 6; $i++) { 
                                        ?>
                                        <td><a href="nilai/form_insert_nilai/<?php echo $i; ?>/<?php echo $key->id_siswa ?>" class="btn btn-primary waves-effect"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a></td>
                                        <?php
                                            }
                                        ?>
                                    </tr>
                                    <?php 
                                    } 
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

