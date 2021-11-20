$(document).ready(function () {

    // Untuk sunting
    $('#modalhapusrole').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#idrole').attr("value", div.data('id'));
        $('.rolename').html('Nama Role: <strong>' + div.data('name') + '</strong>');
    });

    // $('#modalubahrole').on('show.bs.modal', function (event) {
    //     var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
    //     var modal = $(this)
    //     // Isi nilai pada field
    //       modal.find('#idrole').attr("value", div.data('id'));
    //     //   $('.rolename').html('Nama Role: <strong>' + div.data('name') + '</strong>');

    //     // console.log(div.data('permission'));
    // });

    $('#modalhapususer').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#idUser').attr("value", div.data('idUser'));
        $('.username').html('Nama Pengguna: <strong>' + div.data('username') + '</strong>');
    });

    $('#modalhapussatuan').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#idsatuan').attr("value", div.data('idsatuan'));
        $('.namaSatuan').html('Nama Satuan: <strong>' + div.data('namasatuan') + '</strong>');
    });

    $('#modalhapuskontakcustomer').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#idkontakcustomer').attr("value", div.data('idkontakcustomer'));
        $('.namakontakcustomer').html('Nama Customer: <strong>' + div.data('namakontakcustomer') + '</strong>');
    });

    $('#modalhapuskontakkaryawan').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#idkontakkaryawan').attr("value", div.data('idkontakkaryawan'));
        $('.namaKontakKaryawan').html('Nama Karyawan: <strong>' + div.data('namakontakkaryawan') + '</strong>');
    });

    $('#modalhapuskontaksupplier').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#idkontaksupplier').attr("value", div.data('idkontaksupplier'));
        $('.namakontaksupplier').html('Nama Supplier: <strong>' + div.data('namakontaksupplier') + '</strong>');
    });

    $('#modalhapuskontakvendor').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#idkontakvendor').attr("value", div.data('idkontakvendor'));
        $('.namakontakvendor').html('Nama Vendor: <strong>' + div.data('namakontakvendor') + '</strong>');
    });

    $('#modalhapusbarang').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#idbarang').attr("value", div.data('idbarang'));
        $('.namaBarang').html('Nama Barang: <strong>' + div.data('namabarang') + '</strong>');
    });

    $('#modalhapusjasa').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#idjasa').attr("value", div.data('idjasa'));
        $('.namaJasa').html('Nama Jasa: <strong>' + div.data('namajasa') + '</strong>');
    });
});
