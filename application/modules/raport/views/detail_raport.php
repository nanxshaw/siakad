
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
                            <h4 class="m-t-0 header-title"><b>Profile</b></h4>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">NIS</label>
                                            <div class="col-md-9">
                                                <div class="tx"><?php echo $row->nis; ?></div>
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
                                            <label class="col-md-3 control-label">Alamat</label>
                                            <div class="col-md-9">
                                                <div class="tx"><?php echo $row->alamat; ?></div> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Kelamin</label>
                                            <div class="col-md-9">
                                                <div class="tx"><?php echo $row->jenis_kelamin; ?></div>
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <a href="<?php echo base_url(); ?>index.php/siswa" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Kembali</a>
                                         </div>


                                    </form>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Hasil Raport </b></h4>
                            <div style="margin-bottom:20px;">
                                <!-- <button class="btn btn-success waves-effect"><span class="glyphicon glyphicon-export"></span> Export Excel</button> -->
                            </div>
                            <table id="datatable" class="table table-bordered">
                                    <?php 
                                    $no = 1;
                                    foreach ($nilai as $key ) {
                                    ?>
                                    <tr style="background-color:#CCC;"><td colspan="2"><h4>Semester <?php echo $key->semester; ?></h4></td></tr>
                                        <?php
                                         
                                        $data = $this->db->query("SELECT b.id_siswa, b.semester, d.nama_mapel, c.nama, AVG(b.nilai) AS total FROM nilai AS a INNER JOIN nilai_mapel AS b ON a.id_siswa = b.id_siswa INNER JOIN siswa AS c ON a.id_siswa = c.id_siswa INNER JOIN mapel AS d ON b.id_mapel = d.id_mapel WHERE b.id_siswa = ".$key->id_siswa." AND b.semester = ".$key->semester." GROUP BY b.semester, d.id_mapel")->result();
                                        
                                        foreach ($data as $key2 ) {
                                        ?>
                                            <tr>
                                                <td ><?php echo $key2->nama_mapel; ?></td>
                                                <td><?php echo round($key2->total, 2); ?></td>
                                            </tr>
                                    <?php
                                        } 
                                    }
                                    ?>
                                    <tr>
                                        <td><b>Nilai Rata - Rata</b></td>
                                        <td><b><?php echo round($total->total)." <i>(".ucwords(''.Terbilang(round($total->total)).'').")</i>"; ?></b></td>
                                    </tr>
                                    
                                    
                            </table>
                        </div>
                    </div>
                </div>

<style>
.tx{
    padding-top:8px;
}
</style>


<?php 
function Terbilang($x) 
{ 
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"); 
  if ($x < 12) 
    return " " . $abil[$x]; 
  elseif ($x < 20) 
    return Terbilang($x - 10) . "belas"; 
  elseif ($x < 100) 
    return Terbilang($x / 10) . " puluh" . Terbilang($x % 10); 
  elseif ($x < 200) 
    return " seratus" . Terbilang($x - 100); 
  elseif ($x < 1000) 
    return Terbilang($x / 100) . " ratus" . Terbilang($x % 100); 
  elseif ($x < 2000) 
    return " seribu" . Terbilang($x - 1000); 
  elseif ($x < 1000000) 
    return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000); 
  elseif ($x < 1000000000) 
    return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000); 
} 

?> 