
            
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
                                            <label class="col-md-3 control-label">Mata Pelajaran</label>
                                            <div class="col-md-9">
                                                <select name="mapel" id="mapel" class="form-control" required="">
                                                    <option> - PILIH - </option>
                                                    <?php 
                                                        foreach ($mapel as $keys) {
                                                    ?>

                                                    <option value="<?php echo $keys->id_mapel; ?>"><?php echo $keys->nama_mapel; ?></option>

                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Guru</label>
                                            <div class="col-md-9">
                                                <select name="guru" id="guru" class="form-control" required="">
                                                    <option> - PILIH - </option>
                                                    <option id="plh_guru"></option>
                                                    <!-- <div id="plh_guru"></div> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <a href="<?php echo base_url(); ?>index.php/ambil_mapel" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Kembali</a>
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
    $('#mapel').on('change', function(){
        var id = $('select[name=mapel] option:selected').val();
        // alert(id);
        $.ajax({ 
            type      : 'GET', 
            url       : "<?php echo base_url(); ?>index.php/ambil_mapel/select_guru/"+id, 
            dataType  : 'json',
            success   : function(data) {
                            var op = ""; 
                                for (var i = 0; i < data.length; i++) {
                                    op += "<select name='ku'><option value='"+data.data[i].id_guru+"'>"+data.data[i].nama+"</option></select>";
                                }
                            $('#plh_guru').html(op);
                            // alert(op);
                        }
        });
    });

    $('form').submit(function(event) { 
        
        var postForm = { 
            'siswa'   : <?php echo $page['id']; ?>,
            'ses'     : <?php echo $page['ses']; ?>,
            'guru'    : $('select[name=ku] option:selected').val(),
            'mapel'   : $('select[name=mapel] option:selected').val()
        };
        $.ajax({ 
            type      : 'POST', 
            url       : "<?php echo base_url(); ?>index.php/ambil_mapel/add_data", 
            data      : postForm, 
            dataType  : 'json',
            success   : function(data) {
                             window.location = '<?php echo base_url(); ?>index.php/ambil_mapel';
                        }
        });
        event.preventDefault(); 
    });

});

</script>