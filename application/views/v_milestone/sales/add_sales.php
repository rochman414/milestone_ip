<?php 
    if(isset($this->session->userdata['userdata'])){
        if($this->session->userdata['userdata']['role_id'] == 2 ){
            header('location:'.base_url('c_milestone/sales_marketing'));
        }
    } else {
        header('location:'.base_url('login'));
    }
?>
<div class="col-md-12 pd-t-5 pd-l-30 pd-r-30 pd-b-10">
    <div class="pd-l-15 pd-r-15">
        <button class="btn btn-info btn-block tambah" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i id="icon" class="fa "> Tambah Milestone</i>
        </button>
    </div>
</div>
<div class="col-md-12">
    <div class="pd-l-15 pd-r-15">
        <div class="collapse" id="collapseExample">
            <form action="" id="form-project">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="code_tl_id" id="code_tl_id" value="<?= $team->id ?>">
                <input type="hidden" name="tahun_edit" id="tahun_edit">
                <input type="hidden" name="tahun" id="tahun" value="<?= date('Y') ?>">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="project">Project : <span class="tx-danger">*</span></label>
                                <textarea class="form-control" id="project" rows="5" placeholder="Tambahkan Project" name="project"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="milestone">Milestone : <span class="tx-danger">*</span></label>
                                <textarea class="form-control" id="milestone" rows="5" placeholder="Tambahkan Milestone" name="milestone"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-layout-footer">
                            <button class="btn btn-info btn-simpan">Simpan</button>
                            <button class="btn btn-secondary btn-cancel">Cancel</button>
                        </div><!-- form-layout-footer -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-12">
    <ul class="nav nav-pills pd-l-10 pd-r-13 pd-b-5 pd-t-15" id="pills-tab" role="tablist">

    </ul>
</div>
<div class="col-md-12" id="load">

</div>


<script>
    $(document).ready(function () {
        $('#icon').addClass('fa-plus');    
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

    $('.tambah').on('click.ev',function(e){
        e.preventDefault();
        if($('#icon').hasClass('fa-plus')){
            $('#icon').removeClass('fa-plus');
            $('#icon').addClass('fa-minus');
        } else {
            $('#icon').removeClass('fa-minus');
            $('#icon').addClass('fa-plus');    
        }
    })
    $('.btn-simpan').on('click.ev',function(e){
        e.preventDefault();
        let id = $('input[name="id"]').val();
        let code_tl = $('input[name="code_tl_id"]').val();
        let tahun   = $('input[name="tahun"]').val();
        let tahun_edt = $('input[name="tahun_edit"]').val();
        let project = $('textarea[name="project"]').val();
        let milestone = $('textarea[name="milestone"]').val();

        if(project == "" || milestone == ""){
            iziToast.warning({
                title: "Perhatian",
                message: "Form Project dan Milestone harus di isi semua!",
                position: "center"
            });
        } else {
            $.ajax({
                type: "POST",
                url: "<?= $save ?>",
                data: {id:id, code_tl_id:code_tl, tahun_milestone:tahun, tahun_edit:tahun_edt, project:project, milestone:milestone},
                success: function (response) {
                    showNotif(response.type, response.msg);
                    $('#data').DataTable().ajax.reload();
                    $('.btn-cancel').click();
                }
            });
        }
    })

    $(document).on('click.ev','.btn-edit',function(e){
        e.preventDefault();
        let $this   = $(this);
        let id      = $this.attr('data-id');
        let form    = $('#form-project');
        resetForm(form);

        $.ajax({
            type: "POST",
            url: "<?= $edit ?>",
            data: {id:id},
            success: function (response) {
                let dt = response.data;
                $('.tambah').click();
                form.find('input[name="id"]').val(dt.id);
                form.find('input[name="tahun_edit"]').val(dt.tahun_milestone);
                form.find('textarea[name="project"]').val(dt.project);
                form.find('textarea[name="milestone"]').val(dt.milestone);
                
            }
        });
    })

    $(document).on('click.ev','.btn-hapus',function(e){
        e.preventDefault();
        let $this   = $(this);
        let id      = $this.attr('data-id');
        iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Perhatian!',
            message: 'Apakah anda yakin ingin menghapus Team Leader ini ?',
            position: 'center',
            buttons: [
                ['<button><b>YES</b></button>', function (instance, toast) {
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    delete_data(id);
        
                }, true],
                ['<button>NO</button>', function (instance, toast) {
        
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
        
                }],
            ],
            onClosing: function(instance, toast, closedBy){
                
            },
            onClosed: function(instance, toast, closedBy){
                
            }
        });
    })

    function delete_data(id){ 
        $.ajax({
            type: "GET",
            url: "<?= $delete ?>?id="+id,
            success: function (response) {
                showNotif(response.type, response.msg);
                $('#data').DataTable().ajax.reload();
            }
        });
    }

    $('.btn-cancel').on('click.ev',function(e){
        e.preventDefault();
        $('.tambah').click();
        resetForm('#form-project');
    })
    function resetForm(form){
        $(form).trigger('reset');
        $(form).find('input[name="id"]').val('');
        $(form).find('input[name="tahun_edit"]').val('');
        $(form).find('textarea[name="project"]').val('')
        $(form).find('textarea[name="milestone"]').val('')
    }
</script>