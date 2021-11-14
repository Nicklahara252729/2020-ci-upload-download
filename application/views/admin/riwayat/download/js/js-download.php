<script type="text/javascript">
$(document).ready(function() {
    var table = $('#konten').DataTable({
        "bDestroy": true,
        "language": {
            "searchPlaceholder": 'Pencarian',
            "sSearch": '',
            "lengthMenu": '_MENU_ items/page',
        },
        "ajax": "<?php echo base_url('riwayat/download/view-riwayat-download'); ?>",
        "order": [
            [2, 'desc']
        ],
        "columns": [{
                "data": null,
                "width": "50px",
                "sClass": "text-center",
                "orderable": false,
            },
            { "data": "nama_file"},
            { "data": "nama"},
            { "data": "time"},
        ]
    });

    table.on('order.dt search.dt', function() {
        table.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
});
</script>