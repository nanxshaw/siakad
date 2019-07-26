
            
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
                                            <label class="col-md-3 control-label">Kode Mapel</label>
                                            <div class="col-md-9">
                                                <input type="mapel" name="kode" class="form-control" required="" placeholder="Masukan Kode Mapel">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama</label>
                                            <div class="col-md-9">
                                                <input type="text" name="nama" class="form-control" required="" placeholder="Masukan Nama">
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <a href="<?php echo base_url(); ?>index.php/mapel" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Batal</a>
                                            <button class="btn btn-success" id="add" type="submit"><span class="glyphicon glyphicon-save"></span> Tambah</button>
                                        </div>


                                    </form>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->

        <script src="<?php echo base_url(); ?>assets/assets/js/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('form').submit(function(event) { 
        
        var postForm = { 
            'kode'               : $('input[name=kode]').val(),
            'nama'              : $('input[name=nama]').val()
        };
        $.ajax({ 
            type      : 'POST', 
            url       : "<?php echo base_url(); ?>index.php/mapel/add_data", 
            data      : postForm, 
            dataType  : 'json',
            success   : function(data) {
                            if (data.success) {
                                window.location = '<?php echo base_url(); ?>index.php/mapel';
                            }else{
                                alert('Gagal Tambah Data');
                            }
                        }
        });
        event.preventDefault(); 
    });


});
</script>