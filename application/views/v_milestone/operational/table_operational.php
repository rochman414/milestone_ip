<div class="table pd-t-10 pd-l-15 pd-r-15 pd-b-30">
    <table id="data" class="table table-striped table-bordered display compact" style="margin: 0;">
        <thead>
        <tr>
            <th class="tx-center tx-dark">No</th>
            <th class="tx-center tx-dark">Project</th>
            <th class="tx-center tx-dark">Milestone</th>
            <th class="tx-center tx-dark" style="width: 7%;">Kategori</th>
            <th class="tx-center tx-dark" style="width: 8%;">Tahun</th>
            <th class="tx-center tx-dark" style="width: 15%;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div><!-- table-wrapper -->

<script>
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
                    "data": "no"
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
                    "width":'7%',
                    "render": function (data,type,row) { 
                        if(row.kat_id == 1){
                            return `<span class=""><span class="badge badge-pill badge-primary">`+row.kat_name+`</span></span>`;
                        }else if(row.kat_id == 2){
                            return `<span class=""><span class="badge badge-pill badge-info">`+row.kat_name+`</span></span>`;
                        } else {
                            return `<span class=""><span class="badge badge-pill badge-success">`+row.kat_name+`</span></span>`;
                        }                     
                    }
                },
                {
                    "target": 4,
                    "fixedColumns":true,
                    "width":'8%',
                    "render": function (data,type,row) { 
                        return `<span class="lead"><span class="badge badge-pill badge-info">`+row.tahun_milestone+`</span></span>`;
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
                    "targets": 1,
                    "className": "dt-body-left",
                },
                {
                    "targets": 2,
                    "className": "dt-body-left",
                },
                {
                    "targets": 5,
                    "fixedColumns":true,
                    "width":'15%',
                    "render": function (data,type,row) { 
                        return `<button type="button" data-id="`+row.id+`" class="btn btn-sm btn-info btn-edit">
                                        <i class="fa fa-edit"> 
                                            Edit
                                        </i>
                                    </button> |
                                    <button type="button" data-id="`+row.id+`" class="btn btn-sm btn-danger btn-hapus">
                                        <i class="fa fa-trash"> 
                                            Hapus
                                        </i>
                                    </button>`;
                    }
                }
                ],
            });
            }
        });
    });
</script>