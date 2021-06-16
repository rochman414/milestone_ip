<div class="col-md-12 ">
    <div class="table-wrapper pd-t-10 pd-l-30 pd-r-30 pd-b-30">
        <table id="data" class="table table-striped table-bordered display nowrap compact" style="margin: 0;" >
            <thead>
            <tr>
                <th class="tx-center tx-dark">No</th>
                <th class="tx-center tx-dark">Code TL</th>
                <th class="tx-center tx-dark">Nama</th>
                <th class="tx-center tx-dark" style="width: 15%;">Divisi</th>
                <th class="tx-center tx-dark" style="width: 15%;">Status</th>
                <th class="tx-center tx-dark" style="width: 20%;">Aksi</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div><!-- table-wrapper -->
</div>
<script>
    var roleId = '<?= $this->session->userdata['userdata']['role_id']; ?>';
    $(document).ready(function () {
        let table = $("#data").DataTable({
            "scrollY": '50vh',
            "responsive": true,
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
                    return `<span class="lead"><span class="badge badge-pill badge-info">`+row.division_name+`</span></span>`;
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
                "width":'20%',
                "render": function (data,type,row) { 
                    if(roleId == 1){
                        if(row.status == 1){
                            return `<button type="button" data-id="`+row.id+`" class="btn btn-sm btn-info btn-lihat">
                                            <i class="fa fa-eye"> 
                                                Lihat
                                            </i>
                                        </button> |
                                        <button type="button" data-id="`+row.id+`" class="btn btn-sm btn-success btn-tambah">
                                            <i class="fa fa-plus"> 
                                                Tambah Project
                                            </i>
                                        </button>`;
                        } else {
                            return `<button type="button" data-id="`+row.id+`" class="btn btn-sm btn-info btn-lihat">
                                    <i class="fa fa-eye"> 
                                        Lihat
                                    </i>
                                </button>`
                        }
                    } else {
                        return `<button type="button" data-id="`+row.id+`" class="btn btn-sm btn-info btn-lihat">
                                    <i class="fa fa-eye"> 
                                        Lihat
                                    </i>
                                </button>`;
                    }
                }
            }
            ],
        });
    });
    $(document).on('click.ev','.btn-tambah',function(e){
        e.preventDefault();
        let $this = $(this);
        let id = $this.attr('data-id');
        let link = '<?= $detail ?>';
        window.location.replace(link+'?sales='+id);
    })
    $(document).on('click.ev','.btn-lihat',function(e){
        e.preventDefault();
        let $this = $(this);
        let id = $this.attr('data-id');
        let link = '<?= $show ?>';
        window.location.replace(link+'?sales='+id);
    })
</script>