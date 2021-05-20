<?php 
    if($this->session->userdata['userdata']['role_id'] == 2 ){
        header('location:'.base_url('dashboard'));
    }
?>
<div class="col-md-12 pd-t-10 pd-l-30 pd-r-30 pd-b-10">
    <div class="row">
        <div class="col-md-4 pd-r-40 pd-l-40">
            <button type="button" class="btn btn-primary btn-block ladda-button btn-progress btn-tambah" style="cursor: pointer;" data-style="zoom-in" data-toggle="modal" data-target="#modaldemo3"><i class="fa fa-plus-circle"></i> Tambah TL</button>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
<div class="col-md-12 ">
    <div class="table-wrapper pd-t-10 pd-l-30 pd-r-30 pd-b-30">
        <table id="data" class="table table-striped table-bordered dt-responsive display nowrap compact" style="margin: 0;" >
            <thead>
            <tr>
                <th class="tx-center tx-dark">No</th>
                <th class="tx-center tx-dark" style="width: 10%;">Code TL</th>
                <th class="tx-center tx-dark">Nama</th>
                <th class="tx-center tx-dark" style="width: 15%;">Divisi</th>
                <th class="tx-center tx-dark" style="width: 15%;">Status</th>
                <th class="tx-center tx-dark" style="width: 15%;">Aksi</th>
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
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Tambah Tim Leader</h6>
            <button type="button" class="close" data-dismiss="modal" id="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" id="form-user">
            <input type="hidden" name="id" id="id">
            <div class="modal-body pd-20">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 form-control-label">Code : <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" name="code" placeholder="Enter Code" maxlength="3">
                        </div>
                    </div><!-- row -->
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 form-control-label">Name TL : <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name TL">
                        </div>
                    </div><!-- row -->
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="division_id" class="col-sm-3 form-control-label">Division : <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <select name="division_id" id="division_id" class="form-control" style="width: 100%" data-placeholder="Pilih Divisi" required>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 form-control-label">Status TL : <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="btn btn-info btn-oblong" for="status_1">
                                        <input type="radio" name="status" value="1" id="status_1" /> 
                                        Aktif
                                    </label>
                                </div>
                                <div class="col-sm-4">
                                    <label for="status_2" class="btn btn-warning btn-oblong">
                                        <input type="radio" name="status" value="2" id="status_2"/>
                                        Non Aktif
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class=" lh-3 tx-white">Why We Use Electoral College, Not Popular Vote</h4>
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
    $(document).ready(function () {
        $("input[name=code]").keyup(function () {  
            $(this).val($(this).val().toUpperCase());  
        });
        let table = $("#data").DataTable({
            "scrollY": '50vh',
            "scrollCollapse":true,
            "paging":false,
            "info": true,
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
                "target": 0,
                "width":"10%",
                "data": "no"
            },
            {
                "data": "code_tl"
            }, 
            {
                "data": "name"
            }, 
            {
                "target": 3,
                "fixedColumns":true,
                "width":"15%",
                "render": function (data,type,row) { 
                    if(row.division_id == 1){
                        return `<span class="lead"><span class="badge badge-pill badge-info">`+row.division_name+`</span></span>`;
                    }
                    if(row.division_id == 2){
                        return `<span class="lead"><span class="badge badge-pill badge-success">`+row.division_name+`</span></span>`;
                    }
                    if(row.division_id == 3){
                        return `<span class="lead"><span class="badge badge-pill badge-primary">`+row.division_name+`</span></span>`;
                    }
                }
            },
            {
                "target": 4,
                "fixedColumns":true,
                "width": "15%",
                "render": function (data,type,row) { 
                    if(row.status == 1){
                        return `<span class="lead"><span class="badge badge-pill badge-warning">Aktif</span></span>`;
                    }
                    if(row.status == 2){
                        return `<span class="lead"><span class="badge badge-pill badge-secondary">Non Aktif</span></span>`;
                    }
                }
            },
            ],
            
            "columnDefs": [
            {
                "targets": [0, 5], 
                "orderable": true, 
                "searchable": false, 
                "fixedColumns": true,
            },
            {
                "targets": 0,
                "className": "text-center",
                "fixedColumns": true,
                "width":20,
            },
            {
                "targets": 5,
                "fixedColumns":true,
                "width":'15%',
                "render": function (data,type,row) { 
                    return `<button type="button" data-id="`+row.id+`" class="btn btn-sm btn-info btn-edit">
                                Ubah
                                </button> |
                                <button type="button" data-id="`+row.id+`" class="btn btn-sm btn-danger btn-delete">
                                Hapus
                                </button>`;
                }
            }
            ],
        });
        $("#division_id").select2({
            dropdownParent: $('#modaldemo3'),
            ajax: {
                url: "<?php echo $select ?>",
                delay: 100,
                dataType: 'json',
                processResults: function(data) {
                    let items = [];
                    if (data.length > 0) {
                        for (let i = 0; i < data.length; i++) {
                        let tempData = {
                            id: data[i].id,
                            text: data[i].name,
                            data: data[i]
                        }
                        items.push(tempData)
                        }
                    }
                        return {
                            results: items
                        };
                    }
            }
            }).on("select2:select", function(e) {
                let data = e.params.data;
            }).on("select2:unselect", function(e){
        });
    });
    $('#btn-simpan').on('click.ev',function(e){
        e.preventDefault();
        var id = $('input[name="id"]').val();
        var code = $('input[name="code"]').val();
        var name = $('input[name="name"]').val();
        var division_id = $('select[name="division_id"]').val();
        var status = $('input[name="status"]:checked').val();

        if(code == "" || name == "" || division_id == "" || status == ""){
            iziToast.warning({
                tittle: "Gagal",
                message: "Semua field harus di isi!",
                position: "center"
            })
        } else {
            $.ajax({
                type: "POST",
                url: "<?= $save ?>",
                data: {id: id, code: code, name:name, division_id : division_id, status: status},
                success: function (response) {
                    showNotif(response.type, response.msg);
                    $('#data').DataTable().ajax.reload();
                    $('#close').click();
                }
            });
        }
    });
    function reset(form) {  
        $(form).trigger('reset');
        $(form).find('input[name="id"]').val('');
        $(form).find('input[name="code"]').val('');
        $(form).find("input[type=radio][name=status]").prop('checked', false);
        $(form).find('input[name="name"]').val('');
        $(form).find('select').empty().trigger('change');
    }
    $(document).on('click.ev','#close, #close1', function (e) {
        e.preventDefault();
        $('.validate').html('');
        reset('#form-user');
    });
    $(document).on('click.ev','.btn-edit',function(e){
        e.preventDefault();
        let $this = $(this);
        let id = $this.attr('data-id');
        let form = $('#form-user');

        $.ajax({
            type: "POST",
            url: "<?= $edit ?>",
            data: {id:id},
            success: function (response) {
                let dt = response.data;
                console.log(dt);
                $('.btn-tambah').click();
                form.find('input[name="id"]').val(dt.id);
                form.find('input[name="code"]').val(dt.code_tl);
                form.find('input[name="name"]').val(dt.name);
                let opt_division = new Option(dt.division_name,dt.division_id,true,true);
                form.find('select').append(opt_division).trigger('change');
                if(dt.status == 1){
                    $("#status_1").prop("checked", true);
                } else {
                    $("#status_2").prop("checked", true);
                }
            }
        });
    })
    $(document).on('click.ev','.btn-delete', function(e){
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
</script>