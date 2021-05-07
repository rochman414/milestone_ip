    <script src="<?= base_url('assets/template') ?>/lib/jquery/jquery.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/popper.js/popper.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/bootstrap/bootstrap.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/moment/moment.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/jquery-ui/jquery-ui.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/peity/jquery.peity.js"></script>

    <script src="<?= base_url('assets/template') ?>/js/bracket.js"></script>
    <script>
        base_url='<?= base_url(); ?>';
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="<?=$this->security->get_csrf_token_name();?>"]').attr('content') },
            xhrFields: {
                withCredentials: true
            },
            dataType: 'json',
            cache: false
        });
    </script>
  </body>
</html>