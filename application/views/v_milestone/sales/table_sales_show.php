<div class="pd-t-30 pd-l-15 pd-r-15">
    <div class="collapse  db-2 bd-primary" id="collapseExample">
        <form action="" id="form-detail-milestone">
            <input type="hidden" name="id_milestone" id="id_milestone">
            <input type="hidden" name="id_detail_sales" id="id_detail_sales">
            <input type="hidden" name="user_id" id="user_id" value="<?= $this->session->userdata['userdata']['id']; ?>">
            <input type="hidden" name="week" id="week">
            <div class="card bd-3 db-primary">
                <div class="card card-header"> 
                    <h5 class="tx-dark pala"></h5>
                </div>
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-6 pd-t-10 pd-b-10">
                            <label for="week" class="tx-dark">Update Milestone Minggu Ke : <span class="tx-black week-label"></span></label>
                        </div>
                        <div class="col-md-6 pd-t-10 pd-b-10">
                            <label for="user" class="tx-dark">Di Update Oleh : <span class="tx-black"><?= ucfirst($this->session->userdata['userdata']['name']);?></span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pd-t-10 pd-b-10">
                            <div class="card">
                                <div class="form-group pd-t-10">
                                    <label class="form-control-label tx-dark" for="status_id">Status Milestone : <span class="tx-danger">*</span></label>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="rdiobox rdiobox-info" for="status_id_1" style="cursor:pointer;">
                                                <input type="radio" name="status_id" value="1" id="status_id_1" /><span class="tx-info tx-bold">Target Milestone</span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="rdiobox rdiobox-primary" for="status_id_2" style="cursor:pointer;">
                                                <input type="radio" name="status_id" value="2" id="status_id_2"/><span class="tx-primary tx-bold">In Progress</span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="rdiobox rdiobox-success" for="status_id_3" style="cursor:pointer;">
                                                <input type="radio" name="status_id" value="3" id="status_id_3"/><span class="tx-success tx-bold">Done</span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="rdiobox rdiobox-danger" for="status_id_4" style="cursor:pointer;">
                                                <input type="radio" name="status_id" value="4" id="status_id_4"/><span class="tx-danger tx-bold">Tidak Tercapai</span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="rdiobox rdiobox-warning" for="status_id_5" style="cursor:pointer;">
                                                <input type="radio" name="status_id" value="5" id="status_id_5"/><span class="tx-warning tx-bold">Pending/Mundur</span>
                                            </label>
                                        </div>
                                        <div class="col-md-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label tx-dark" for="ket_update">Keterangan Update :</label>
                                <textarea class="form-control" id="ket_update" rows="5" placeholder="Tambahkan Keterangan Update" name="ket_update"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label tx-dark" for="kendala">Kendala Pencapaian Milestone :</label>
                                <textarea class="form-control" id="kendala" rows="5" placeholder="Tambahkan Kendala Pencapaian Milestone" name="kendala"></textarea>
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
            </div>
        </form>
    </div>
</div>

<div class="table pd-t-40 pd-l-15 pd-r-15 pd-b-30">
    <table id="data" class="table table-striped table-bordered display compact" style="margin: 0;">
        <thead>
        <tr>
            <th></th>
            <th class="tx-center tx-dark">Project</th>
            <th class="tx-center tx-dark">Milestone</th>
            <th class="tx-center tx-dark">Tahun</th>
            <th class="tx-center tx-dark" style="width: 10%;">Status Terakhir</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div><!-- table-wrapper -->

<script>
    let userId = "<?= $this->session->userdata['userdata']['role_id']; ?>";
    function cek_value(id,status,week){
        let cek;
        if(status == 1){
            cek = `<button style="cursor:pointer;" data-toggle="popover" id="`+id+'week'+week+`" class="wd-20 ht-20 btn btn-sm btn-info pd-t-3 pd-l-3 pd-b-3 pd-r-3 tambah">`+week+`</button>`;
        }
        if(status == 2){
            cek = `<button style="cursor:pointer;" data-toggle="popover" id="`+id+'week'+week+`" class="wd-20 ht-20 btn btn-sm btn-primary pd-t-3 pd-l-3 pd-b-3 pd-r-3 tambah">`+week+`</button>`;
        }
        if(status == 3){
            cek = `<button style="cursor:pointer;" data-toggle="popover" id="`+id+'week'+week+`" class="wd-20 ht-20 btn btn-sm btn-success pd-t-3 pd-l-3 pd-b-3 pd-r-3 tambah">`+week+`</button>`;
        }
        if(status == 4){
            cek = `<button style="cursor:pointer;" data-toggle="popover" id="`+id+'week'+week+`" class="wd-20 ht-20 btn btn-sm btn-danger pd-t-3 pd-l-3 pd-b-3 pd-r-3 tambah">`+week+`</button>`;
        }
        if(status == 5){
            cek = `<button style="cursor:pointer;" data-toggle="popover" id="`+id+'week'+week+`" class="wd-20 ht-20 btn btn-sm btn-warning pd-t-3 pd-l-3 pd-b-3 pd-r-3 tambah">`+week+`</button>`;
        }
        return cek;
    }
    function cek_milestone(id,week,detail) {  
        reset_form('#form-detail-milestone');
        let form = $('#form-detail-milestone');
        console.log(detail)
        $.ajax({
            type: "POST",
            url: "<?= base_url('c_milestone/sales_marketing/cek_milestone_id') ?>",
            data: {id:id,id_detail:detail},
            success: function (response) {
                let dtd = response.data_detail;
                let dt = response.data;
                if(dtd != null){
                    let status = dtd.status_id;
                    form.find('input[name="id_detail_sales"]').val(dtd.id);
                    form.find('textarea#ket_update').val(dtd.keterangan_update);
                    form.find('textarea#kendala').val(dtd.kendala_pencapaian_milestone);
                    switch(parseInt(status)){
                        case 1:
                            $("#status_id_1").prop("checked", true);
                            break;
                        case 2:
                            $("#status_id_2").prop("checked", true);
                            break;
                        case 3:
                            $("#status_id_3").prop("checked", true);
                            break;
                        case 4:
                            $("#status_id_4").prop("checked", true);
                            break;
                        case 5:
                            $("#status_id_5").prop("checked", true);
                            break;
                    }
                }
                form.find('input[name="id_milestone"]').val(dt.id);
                form.find('input[name="week"]').val(week);
                $('.week-label').append(week);
                $('.pala').append(dt.project);
            }
        });
    }
    function reset_form(form) {  
        $(form).trigger('reset');
        $(form).find('input[name="id_milestone"]').val('');
        $(form).find('input[name="id_detail_sales"]').val('');
        $(form).find('input[name="week"]').val('');
        $(form).find('input[name="ket_update"]').val('');
        $(form).find('input[name="kendala"]').val('');
        $(form).find("input[type=radio][name=status_id]").prop('checked', false);
        $('.week-label').html('');
        $('.pala').html('');
    }
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "<?= $data ?>",
            success: function (response) {
                let table = $("#data").DataTable({
                "scrollY": '50vh',
                "autoWidth": true,
                "scrollX": true,
                "responsive": true,
                "scrollCollapse":true,
                "searching":false,
                "ordering":false,
                "paging":false,
                "info": true,
                "order":[],
                
                "ajax": {
                "url": "<?= $data ?>",
                "type": "POST",
                "data": function(data) {

                }
                },
                "fnInitComplete": function() {

                },
                "autoWidth": true,
                "columns": [
                {
                    "target": 0,
                    "data"  : null,
                    "width" : 15,
                    "render" : function (data,type,row){
                        return `<button class="btn btn-sm btn-info tambah-milestone" style="cursor:pointer;" data-id="`+row.id+`"><i class="iton fa fa-plus"></i></button>`;
                    }
                },
                {
                    "data": "project"
                }, 
                {
                    "data": "milestone"
                }, 
                {
                    "target": 3,
                    "fixedColumns":true,
                    "render": function (data,type,row) { 
                        return `<span class="lead"><span class="badge badge-pill badge-info">`+row.tahun_milestone+`</span></span>`;
                    }
                },
                ],
                
                "columnDefs": [
                {
                    "targets": [0, 4],
                    "searchable": false, 
                    "fixedColumns": true,
                },
                {
                    "targets": 1,
                    "className": "dt-body-left",
                },
                {
                    "targets": 2,
                    "className": "dt-body-left",
                },
                {
                    "targets": 4,
                    "fixedColumns":true,
                    "width":'10%',
                    "render": function (data,type,row) { 
                        return `<button type="button" id="`+row.id+`" class="btn btn-sm btn-success detail" data-id="`+row.id+`" data-toggle="popover" >CEK</button>`;
                    }
                }
                ],
            });
            }
        });
    });
    $(document).on('click.ev', '.detail',function(e){
        e.preventDefault();
        let $this  = $(this);
        let id_do     = $this.attr('data-id');
        
        $.ajax({
            type: "POST",
            url: "<?= base_url('c_milestone/sales_marketing/check_detail') ?>",
            data: {id:id_do},
            success: function (response) {
                if(response.data != null){
                    let dt = response.data;  
                    let tubuh = [];  
                    if(dt.kendala == ''){
                        tubuh = `<div class="tx-black">Minggu Ke : `+dt.week+`</div>
                                    <div class="tx-black">Keterangan Update : `+dt.ket_update+`</div>
                                    <div class="tx-black">Status : `+dt.status_name+`</div>
                                    <div class="tx-black">Di Update Oleh : `+dt.name_user+`</div>`;   
                    } else {
                        tubuh = `<div class="tx-black">Minggu Ke : `+dt.week+`</div>
                                    <div class="tx-black">Keterangan Update : `+dt.ket_update+`</div>
                                    <div class="tx-black">Keterangan Kendala : `+dt.kendala+`</div>
                                    <div class="tx-black">Status : `+dt.status_name+`</div>
                                    <div class="tx-black">Di Update Oleh : `+dt.name_user+`</div>`;   
                    }
                    $($this).popover({
                                container: 'body',
                                html: true,
                                title: 'Status Terakhir Milestone',
                                content: tubuh
                            });
                    $($this).popover('show');  
                } else {
                    $($this).popover({
                                container: 'body',
                                html: true,
                                content: 'Milestone belum ada perkembangan!'
                            });
                    $($this).popover('show');  
                }
            }
        });
    })
    $('#data tbody').on('click.ev','.tambah-milestone',function(e){
        e.preventDefault();
        let table = $('#data').DataTable();
        let $this = $(this);
        let id = $this.attr('data-id');
        let tr = $this.closest('tr');
        let row = table.row(tr);
        
        reset_form('#form-detail-milestone');
        $('#collapseExample').collapse('hide');
        $('.tambah').each(function () {
            //the 'is' for buttons that trigger popups
            //the 'has' for icons within a button that triggers a popup
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            $.ajax({
                type: "POST",
                url: "<?= base_url('c_milestone/sales_marketing/all_detail_sales') ?>",
                data: {id:id},
                success: function (response) {
                    console.log(response);
                    let dt = response.data;
                    let minggu =[];
                    let tubuh = [];
                    if(dt.length > 0 ){
                        $.each(dt, function(key,value){
                            for(i = 1; i <= 53; i++){
                                if(value['week'] == i){
                                    tubuh[i] = cek_value(id,value['status_id'],i);
                                } else {
                                    tubuh[i] = `<button style="cursor:pointer;" data-toggle="popover" id="`+id+'week'+i+`" class="wd-20 ht-20 btn btn-sm bg-black-4 pd-t-3 pd-l-3 pd-b-3 pd-r-3 tambah">`+i+`</button>`;
                                }
                            }
                        })
                    } else {
                        for(i=1; i <= 53; i++){
                            tubuh[i] = `<button style="cursor:pointer;" data-toggle="popover" id="`+id+'week'+i+`" class="wd-20 ht-20 btn btn-sm bg-black-4 pd-t-3 pd-l-3 pd-b-3 pd-r-3 tambah">`+i+`</button>`;
                        }
                    }
                    let haha = `<div class="tx-dark mg-b-5">Update Milestone per minggu</div>
                                <div class="mg-b-5">`+tubuh+`</div>`;
                    row.child(haha).show();
                    tr.addClass('shown');
                }
            });
        }
    })
    $('#data tbody').on('click.ev','.tambah',function (e) {  
        e.preventDefault();
        let $this = $(this);
        let id = $this.attr('id');
        let potong = id.split('week');
        let week = potong[1];
        let id_milestone = potong[0];
        $($this).popover('hide');

        $.ajax({
            type: "POST",
            url: "<?= base_url('c_milestone/sales_marketing/check_detail_week') ?>",
            data: {id:id_milestone,week:week},
            success: function (response) {
                let dt = response.data;
                let tubuh = [];
                if(dt != null){
                    if(userId == 1){
                        if(dt.kendala == ''){
                            tubuh = `<div class="tx-black">Minggu Ke : `+dt.week+`</div>
                                        <div class="tx-black">Keterangan Update : `+dt.ket_update+`</div>
                                        <div class="tx-black">Status : `+dt.status_name+`</div>
                                        <div class="tx-black">Di Update Oleh : `+dt.name_user+`</div>
                                        <div><button style="cursor:pointer;" class="btn btn-sm btn-primary btn-ubah" data-id="`+id_milestone+'|'+week+'|'+dt.id+`">Ubah Milestone</button></div>`;   
                        } else {
                            tubuh = `<div class="tx-black">Minggu Ke : `+dt.week+`</div>
                                        <div class="tx-black">Keterangan Update : `+dt.ket_update+`</div>
                                        <div class="tx-black">Keterangan Kendala : `+dt.kendala+`</div>
                                        <div class="tx-black">Status : `+dt.status_name+`</div>
                                        <div class="tx-black">Di Update Oleh : `+dt.name_user+`</div>
                                        <div><button style="cursor:pointer;" class="btn btn-sm btn-primary btn-ubah" data-id="`+id_milestone+'|'+week+'|'+dt.id+`">Ubah Milestone</button></div>`;   
                        }
                    } else {
                        if(dt.kendala == ''){
                            tubuh = `<div class="tx-black">Minggu Ke : `+dt.week+`</div>
                                        <div class="tx-black">Keterangan Update : `+dt.ket_update+`</div>
                                        <div class="tx-black">Status : `+dt.status_name+`</div>
                                        <div class="tx-black">Di Update Oleh : `+dt.name_user+`</div>`;   
                        } else {
                            tubuh = `<div class="tx-black">Minggu Ke : `+dt.week+`</div>
                                        <div class="tx-black">Keterangan Update : `+dt.ket_update+`</div>
                                        <div class="tx-black">Keterangan Kendala : `+dt.kendala+`</div>
                                        <div class="tx-black">Status : `+dt.status_name+`</div>
                                        <div class="tx-black">Di Update Oleh : `+dt.name_user+`</div>`;   
                        }
                    }
                    $($this).popover({
                                container: 'body',
                                html: true,
                                title: 'Status Milestone',
                                content: tubuh
                            });
                    $($this).popover('show');  
                } else {
                    if(userId == 1){
                        cek_milestone(id_milestone,week);
                        $('#collapseExample').collapse('show');
                    } else {
                        $($this).popover({
                                container: 'body',
                                html: true,
                                content: 'Milestone belum ada perkembangan!'
                        });
                        $($this).popover('show'); 
                    }
                }
            }
        });
    })
    $('.btn-simpan').on('click.ev',function (e) {  
        e.preventDefault();
        let id_milestone = $('input[name="id_milestone"]').val();
        let id_detail   = $('input[name="id_detail_sales"]').val();
        let user_id     = $('input[name="user_id"]').val();
        let week        = $('input[name="week"]').val();
        let status_id   = $('input[name="status_id"]:checked').val();
        let ket_update  = $('textarea#ket_update').val();
        let kendala     = $('textarea#kendala').val();
        console.log(id_detail);

        if(status_id == null){
            iziToast.warning({
                tittle: "Peringatan!",
                message: "Status harus di pilih terlebih dahulu!",
                position: "center"
            })
        } else {
            if( ket_update == '' && kendala == "") {
                iziToast.warning({
                    tittle: "Peringatan!",
                    message: "Isi salah satu antara Keterangan update atau Kendala Pencapaian milestone!",
                    position: "center"
                })
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('c_milestone/sales_marketing/save_detail') ?>",
                    data: {milestone:id_milestone, detail:id_detail, user:user_id, week:week, status:status_id, update:ket_update, kendala:kendala},
                    success: function (response) {
                        showNotif(response.type,response.msg);       
                        $('#collapseExample').collapse('hide');
                        reset_form('#form-detail-milestone');
                        $('#data').DataTable().ajax.reload();
                    }
                });
            }
        }
    })
    $(document).on('click.ev','.btn-ubah', function(e){
        e.preventDefault();
        let $this   = $(this);
        let dataId  = $this.attr('data-id');
        let all     = dataId.split('|');
        let id_milestone    = all[0];
        let week    = all[1];
        let id_detail       = all[2];

        cek_milestone(id_milestone,week,id_detail);
        $('.tambah').each(function () {
            //the 'is' for buttons that trigger popups
            //the 'has' for icons within a button that triggers a popup
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
        $('#collapseExample').collapse('show');
    })
    $('.btn-cancel').on('click.ev',function (e) {  
        e.preventDefault();
        $('#collapseExample').collapse('hide');
        reset_form('#form-detail-milestone');
    })
</script>