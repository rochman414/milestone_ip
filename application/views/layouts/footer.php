    

    <script src="<?= base_url('assets/template') ?>/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/moment/moment.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/jquery-ui/jquery-ui.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/peity/jquery.peity.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/lada_button/lada.js"></script>
    <script src="<?= base_url('assets/template') ?>/lib/iziToast-master/dist/js/iziToast.min.js"></script>
 

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
        function showNotif(type,msg,position1) {  
            if(type == 'error'){
                iziToast.warning({
                    title: 'Error!',
                    message: msg
                })
            }
            if(type == 'success'){
                iziToast.success({
                    title: 'Berhasil!',
                    message: msg
                })
            }
        }
    </script>
  </body>
</html>