<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'csv',
                    className: 'btn btn-success btn-sm',
                    text: '<i class="align-middle" data-feather="file-text"></i> CSV'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-success btn-sm',
                    text: '<i class="align-middle" data-feather="file"></i> Excel'
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-success btn-sm',
                    text: '<i class="align-middle" data-feather="file"></i> PDF'
                }
            ],
            pageLength: 10,
            responsive: true,
            "ordering": true,
            "info": true,
            "lengthChange": true,
            "searching": true,
            drawCallback: function() {
                feather.replace();
            }
        });
    });
</script> 