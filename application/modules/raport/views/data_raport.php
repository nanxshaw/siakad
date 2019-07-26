

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
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($rows as $key ) {
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $key->nama; ?></td>
                                        <?php 
                                        error_reporting(0);
                                        for ($i=1; $i <= 6; $i++) { 
                                            $list = $this->db->query("SELECT id_nilai_mapel, id_siswa, AVG(nilai) AS total FROM nilai_mapel WHERE semester = ".$i." AND id_siswa = ".$key->id_siswa." GROUP BY id_siswa")->row();
                                            $nilai;
                                            if($list->total > 0 && $list->total <= 55){
                                                $nilai = "(D)";
                                            }else if($list->total >= 56 && $list->total <= 60){
                                                $nilai = "(D+)";
                                            }else if($list->total >= 61 && $list->total <= 65){
                                                $nilai = "(C-)";
                                            }else if($list->total >= 66 && $list->total <= 70){
                                                $nilai = "(C)";
                                            }else if($list->total >= 71 && $list->total <= 75){
                                                $nilai = "(C+)";
                                            }else if($list->total >= 76 && $list->total <= 80){
                                                $nilai = "(B-)";
                                            }else if($list->total >= 81 && $list->total <= 85){
                                                $nilai = "(B)";
                                            }else if($list->total >= 86 && $list->total <= 90){
                                                $nilai = "(B+)";
                                            }else if($list->total >= 91 && $list->total <= 95){
                                                $nilai = "(A-)";
                                            }else if($list->total >= 96 && $list->total <= 100){
                                                $nilai = "(A)";
                                            }else{
                                                $nilai = "";
                                            }
                                        ?>
                                            <td><?php echo round($list->total, 2)." ".$nilai; ?></td>
                                        <?php } ?>
                                        <td><a href="<?php echo base_url(); ?>index.php/raport/detail_form_raport/<?php echo $key->id_siswa; ?>" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    <?php 
                                    } 
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

