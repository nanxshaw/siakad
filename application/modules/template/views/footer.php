

                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div>
        </div>


        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/detect.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/jquery.mask.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/fastclick.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/switchery/switchery.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/dataTables.colVis.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <!-- Counter js  -->
        <script src="<?php echo base_url(); ?>assets/assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- Flot chart js -->
        <script src="<?php echo base_url(); ?>assets/assets/plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/flot-chart/jquery.flot.selection.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>


        <script src="<?php echo base_url(); ?>assets/assets/plugins/moment/moment.js"></script>
     	<script src="<?php echo base_url(); ?>assets/assets/plugins/timepicker/bootstrap-timepicker.js"></script>
     	<script src="<?php echo base_url(); ?>assets/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
     	<script src="<?php echo base_url(); ?>assets/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     	<script src="<?php echo base_url(); ?>assets/assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
     	<script src="<?php echo base_url(); ?>assets/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- Dashboard init -->
        <script src="<?php echo base_url(); ?>assets/assets/pages/jquery.dashboard_2.js"></script>
        <!-- init -->
        <script src="<?php echo base_url(); ?>assets/assets/pages/jquery.form-pickers.init.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/pages/jquery.datatables.init.js"></script>

        <!-- Modal-Effect -->
        <script src="<?php echo base_url(); ?>assets/assets/plugins/custombox/js/custombox.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/plugins/custombox/js/legacy.min.js"></script>
        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/jquery.app.js"></script>

        <style>
            input[type='number'] {
                -moz-appearance:textfield;
            }

            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
            }
        </style>

    <script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>
        
        <script>
                
        $(function(){

            $('.btndel').click(function(){11
                var idne = $(this).attr('idne');
                $("input[name=id]").val(idne);
                $('#myModal').modal('show');
            });
        
        });
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "<?php echo base_url(); ?>assets/assets/plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();

        </script>
        <script>
            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2016',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-success',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });
        </script>


    </body>
</html>