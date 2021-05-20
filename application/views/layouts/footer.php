    

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