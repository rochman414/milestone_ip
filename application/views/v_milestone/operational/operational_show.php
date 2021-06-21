<div class="col-md-12">
    <ul class="nav nav-pills pd-l-10 pd-r-13 pd-b-5 pd-t-15" id="pills-tab" role="tablist">

    </ul>
</div>
<div class="col-md-12" id="load">

</div>
<script>
    $(document).ready(function () { 
        $.ajax({
            type: "POST",
            url: "<?= $tahun ?>",
            success: function (response) {
                let buton = [];
                let tahun = "<?= date('Y') ?>";
                $.each(response.tahun, function(key, value){
                    if(value['tahun'] != tahun){
                        buton[key]  =   `<li class="nav-item pl-2">
                                            <a class="nav-link btn-tahun" id="pills-home-tab" data-id="`+value['tahun']+`"data-toggle="pill" href="#" role="tab" aria-controls="pills-home" aria-selected="true">`+value['tahun']+`</a>
                                        </li>`;
                    } else {
                        buton[key]  =   `<li class="nav-item pl-2">
                                            <a class="nav-link btn-tahun" id="sial" data-id="`+value['tahun']+`"data-toggle="pill" href="#" role="tab" aria-controls="pills-home" aria-selected="true">`+value['tahun']+`</a>
                                        </li>`;
                    }
                });
                $('#pills-tab').html(buton);
            }
        });
        setTimeout(function(){
            $('#sial').click()
        }, 100);
    });

    $(document).on('click.ev', '.btn-tahun',function(e){
        e.preventDefault();
        let id = "<?= $team->id ?>";
        let $this   = $(this);
        let tahun      = $this.attr('data-id');
        $('#load').load("<?= $table ?>"+id+'/'+tahun);

    });
</script>