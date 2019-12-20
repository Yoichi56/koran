
    <!-- Essential javascripts for application to work-->
    <script src="<?= base_url();?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url();?>assets/js/popper.min.js"></script>
    <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/js/main.js"></script>
    <script src="<?= base_url();?>assets/js/onclick.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url();?>assets/js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/jquery-ui.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/bootstrap-datepicker.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Select 2 plugin -->
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/select2.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/chart.js"></script>
    
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/bootstrapvalidator.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/bootstrap-show-password.min.js"></script>
    <!-- Custom -->
    <script type="text/javascript" src="<?= base_url();?>assets/js/custom/field.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/custom/rupiah-currency.js"></script>

    <script type="text/javascript">
        var date = new Date();
        date.setDate(date.getDate());

        $('#mulai').datepicker({ 
            format: "yyyy/mm/dd",
            startDate: date
        });

        $('select').select2();

        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>
  </body>
</html>