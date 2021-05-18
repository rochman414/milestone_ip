<?php 
    if($this->session->userdata['userdata']['role_id'] == 2 ){
        header('location:'.base_url('dashboard'));
    }
?>
<div class="col-md-12 pd-t-10 pd-l-30 pd-r-30 pd-b-10">
    <div class="row">
        <div class="col-md-4 pd-r-40 pd-l-40">
            <button type="button" class="btn btn-primary btn-block ladda-button btn-progress btn-tambah" style="cursor: pointer;" data-style="zoom-in" data-toggle="modal" data-target="#modaldemo3"><i class="fa fa-plus-circle"></i> Tambah User</button>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>

<div class="col-md-12 ">
    <div class="table-wrapper pd-t-10 pd-l-30 pd-r-30 pd-b-30">
        <table id="data" class="table-striped table-bordered dt-responsive display nowrap compact" style="width: 100%;">
            <thead>
            <tr>
                <th class="wd-5p tx-center tx-dark">No</th>
                <th class="tx-center tx-dark">Nama</th>
                <th class="tx-center tx-dark">Username</th>
                <th class="tx-center tx-dark">Tipe Akun</th>
                <th class="tx-center tx-dark">Aksi</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div><!-- table-wrapper -->
</div>

<div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Tambah User</h6>
            <button type="button" class="close" data-dismiss="modal" id="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" id="form-user">
            <input type="hidden" name="id" id="id">
            <div class="modal-body pd-20">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 form-control-label">Nama: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                        </div>
                    </div><!-- row -->
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 form-control-label">Username: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" name="username" placeholder="Enter Username">
                        </div>
                    </div><!-- row -->
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 form-control-label">Tipe User: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="radio" name="role_id" value="1" id="role_id_1" /> 
                                    <label for="role_id_1">Administrator</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="radio" name="role_id" value="2" id="role_id_2"/>
                                    <label for="role_id_2">Guest</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 form-control-label">Password: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                            <div class="validate-password"></div>
                        </div>
                    </div><!-- row -->
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 form-control-label">Ulangi Password: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <input type="password" class="form-control" id="re_password" name="password1" placeholder="Ulangi Password">
                            <div class="validate"></div>
                        </div>
                    </div><!-- row -->
                </div>
                <h3 class=" lh-3 tx-white">Why We Use Electoral College, Not Popular Vote</h3>
            </div><!-- modal-body -->
            <div class="modal-footer">
                <button type="button" id="btn-simpan" class="btn btn-primary tx-size-xs ladda-button btn-progress">Simpan</button>
                <button type="button" class="btn btn-secondary tx-size-xs" id="close1" data-dismiss="modal">Tutup</button>
            </div>
        </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
<script>
    $('#btn-simpan').attr('disabled',true).css('cursor','not-allowed');
    var userId = '<?= $this->session->userdata['userdata']['id']; ?>';
    $(document).ready(function () {
        $("#re_password").keyup(checkPasswordMatch);
        let table = $("#data").DataTable({
            "responsive": true,
            "scrollCollapse":false,
            "paging":true,
            "info": true,
            "lengthChange": false,
            "order":[],
            
            "ajax": {
            "url": "<?= $data; ?>",
            "type": "POST",
            "data": function(data) {

            }
            },
            "fnInitComplete": function() {
            this.fnAdjustColumnSizing(true);
            },
            "autoWidth": true,
            "columns": [
            {
                "data": "no"
            },
            {
                "data": "name"
            }, 
            {
                "data": "username"
            }, 
            {
                "target": 3,
                "fixedColumns":true,
                "render": function (data,type,row) { 
                if(row.role_id == 1){
                    return `<div class="badge badge-info">ADMINISTRATOR</div>`;
                } else {
                    return `<div class="badge badge-success">Guest</div>`
                }
                }
            },
            ],
            
            "columnDefs": [
            {
                "targets": [0, 4], 
                "orderable": true, 
                "searchable": false, 
                "fixedColumns": true,
            },
            {
                "targets": 0,
                "className": "text-center",
                "fixedColumns": true,
                "width":40,
            },
            {
                "targets": 4,
                "fixedColumns":true,
                "render": function (data,type,row) { 
                    if(row.id == userId){
                        return `<button type="button" data-id="`+row.id+`" class="btn btn-sm btn-info btn-edit " disabled style="cursor:not-allowed;">
                                    Ubah
                                    </button> |
                                    <button type="button" data-id="`+row.id+`" class="btn btn-sm btn-danger btn-delete " disabled style="cursor:not-allowed;">
                                    Hapus
                                    </button>`;
                    } else {
                        return `<button type="button" data-id="`+row.id+`" class="btn btn-sm btn-info btn-edit">
                                    Ubah
                                    </button> |
                                    <button type="button" data-id="`+row.id+`" class="btn btn-sm btn-danger btn-delete">
                                    Hapus
                                    </button>`;
                    }
                }
            }
            ],
        });
    });

    $('#btn-simpan').on('click.ev',function (e) {  
        e.preventDefault();
        var id = $('input[name="id"]').val();
        var role_id = $('input[name="role_id"]:checked').val();
        var name = $('input[name="name"]').val();
        var username = $('input[name="username"]').val();
        var password = $('input[name="password"]').val();
        var password1 = $('input[name="password1"]').val();

        
        if(name == "" || username == "" || password == "" || password1 == "" || role_id == ""){
            iziToast.warning({
                tittle: "Peringatan!",
                message: "Semua filed harus di isi.",
                position: "center"
            })
        } else {
            $.ajax({
                type: "POST",
                url: "<?= $save?>",
                data: {id:id, role_id: role_id, name:name,username:username, password:password},
                success: function (response) {
                    showNotif(response.type,response.msg);
                    $('#close').click();
                    reset('#form-user');
                    $('#data').DataTable().ajax.reload();
                }
            });
        }
    })
    function reset(form) {  
        $(form).trigger('reset');
        $(form).find('input[name="id"]').val('');
        $(form).find('input[name="name"]').val('');
        $(form).find("input[type=radio][name=role_id]").prop('checked', false);
        $(form).find('input[name="username"]').val('');
        $(form).find('input[name="password"]').val('');
        $(form).find('input[name="password1"]').val('');
        $('#btn-simpan').attr('disabled',true).css('cursor','not-allowed');
    }
    $(document).on('click.ev','#close, #close1', function (e) {
        e.preventDefault();
        $('.validate').html('');
        reset('#form-user');
    });
    function checkPasswordMatch() {
        $('.validate').html('');
        var password = $('input[name="password"]').val();
        var confirmPassword = $('input[name="password1"]').val();
        if (password != confirmPassword){
            $(".validate").append('<span class="text-danger">Password not match!</span>');
            $('#btn-simpan').attr('disabled',true).css('cursor','not-allowed');
        }else{
            $(".validate").append('<span class="text-success">Password match!</span>');
            $('#btn-simpan').attr('disabled',false).css('cursor','pointer');
        }
    }

    $(document).on('click.ev','.btn-edit', function (e) {  
        e.preventDefault();
        let $this = $(this);
        let id = $this.attr('data-id');
        let form = $('#form-user');

        $.ajax({
            type: "POST",
            url: "<?= $edit ?>",
            data: {id:id},
            success: function (response) {
                let data =response.edit;
                $('.btn-tambah').click();
                form.find('input[name="id"]').val(data.id);
                form.find('input[name="name"]').val(data.name);
                form.find('input[name="username"]').val(data.username);
                if(data.role_id == 1){
                    $("#role_id_1").prop("checked", true);
                } else {
                    $("#role_id_2").prop("checked", true);
                }
                
            }
        });
    })

    $(document).on('click.ev','.btn-delete', function (e) {
        e.preventDefault();
        let $this = $(this);
        let id = $this.attr('data-id');
        iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Perhatian!',
            message: 'Apakah anda yakin ingin menghapus data ini ?',
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
    });
    function delete_data(id) {  
        $.ajax({
            type: "GET",
            url: "<?= $delete ?>?id="+id,
            success: function (response) {
                showNotif(response.type,response.msg);
                $('#data').DataTable().ajax.reload();
            }
        });
    }
</script>