<script src="{{ asset('js/app.js') }}"></script>

{{-- <script src="{{ mix('js/app.js') }}"></script> --}}


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="{{ asset('js/modal.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('.select2').select2({
            theme: "bootstrap4",
            placeholder: "Silahkan Pilih",
            width: 'resolve'
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        dt = $('#users-table').DataTable({
            "processing": true,
            // "initComplete" : function (settings, json) {
            //     $('#users-table').show();
            // },
            "serverSide": true,
            // "select" : true,
            // "dataSrc" : "tableData",
            // "bDestroy": true,
            "columns": [{
                    "data": "id",
                    "name": "id",
                    "title": "User ID"
                },
                {
                    "data": "email",
                    "name": "email",
                    "title": "Email"
                },
                {
                    "data": "name",
                    "name": "name",
                    "title": "Nama User"
                },
                {
                    "data": "action",
                    "name": "action",
                    "orderable": false,
                    "searchable": false
                },
            ],
            "ajax": "{{ url('master/data-user-get') }}",
        });
    });
</script>

{{-- <script>
    $('.modalubahrole').click(function() {
        var id = $(this).attr('data-id');
        $.ajax({
            url: "localhost/master/testing?id=" + id,
            cache: false,
            success: function(result) {
                $(".modal-content").html(result);
            }
        });
    });
</script> --}}
