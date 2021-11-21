$(document).ready(function () {

    $('#modalubahuser').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
          modal.find('#id').attr("value", div.data('id'));
          modal.find('#username').attr("value", div.data('username'));
          modal.find('#name').attr("value", div.data('name'));
          modal.find('#nip').attr("value", div.data('nip'));
    });

    $('#modalhapususer').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
        $('.name').html('Nama Pengguna: <strong>' + div.data('name') + '</strong>');
    });
});
