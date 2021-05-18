<?php 
    if($this->session->userdata['userdata']['role_id'] == 2 ){
        header('location:'.base_url('dashboard'));
    }
?>
<div class="col-md-12 ">
    <div class="table-wrapper pd-t-10 pd-l-30 pd-r-30 pd-b-30">
        <table id="data" class="table table-striped table-bordered dt-responsive display nowrap compact" style="margin: 0;" >
            <thead>
            <tr>
                <th class="wd-5p tx-center tx-dark">No</th>
                <th class="tx-center tx-dark">Code TL</th>
                <th class="tx-center tx-dark">Nama</th>
                <th class="tx-center tx-dark">Divisi</th>
                <th class="tx-center tx-dark">Status</th>
                <th class="tx-center tx-dark" style="width: 15%;">Aksi</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div><!-- table-wrapper -->
</div>

<script>
    $(document).ready(function () {
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
                "render": function (data,type,row) { 
                    if(row.division_id == 1){
                        return `<div class="badge badge-info">`+row.division_name+`</div>`;
                    }
                    if(row.division_id == 2){
                        return `<div class="badge badge-success">`+row.division_name+`</div>`;
                    }
                    if(row.division_id == 3){
                        return `<div class="badge badge-primary">`+row.division_name+`</div>`;
                    }
                }
            },
            {
                "target": 4,
                "fixedColumns":true,
                "render": function (data,type,row) { 
                    if(row.status == 1){
                        return `<button type="button" data-id="`+row.id+`" class="btn btn-sm btn-success btn-status">
                                Active
                                </button>`;
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
                "width":40,
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
    });
</script>