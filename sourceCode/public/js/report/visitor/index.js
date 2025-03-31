
"use strict";

function printDiv(divID) {
    $('.dt-length, .dt-search, .dt-info, .dt-paging').hide();

    var printContents = document.getElementById(divID).innerHTML;
    var originalContents = document.body.innerHTML;

    var printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.open();
    printWindow.document.write('<html><head><title>Print</title>');
    printWindow.document.write('<link rel="stylesheet" href="' + window.location.origin + '/backend/css/style.css">');
    printWindow.document.write('</head><body>');
    printWindow.document.write(printContents);
    printWindow.document.write('</body></html>');
    printWindow.document.close();

    printWindow.onload = function () {
        printWindow.focus();
        printWindow.print();
        printWindow.close();
        $('.dt-length, .dt-search, .dt-info, .dt-paging').show();
    };
}

load_data();
$('#date-search').on('click', function () {
    let from_date = $('#from_date').val();
    let to_date = $('#to_date').val();
    let reg_no = $('#reg_no').val();
    $('#maintable').DataTable().destroy();
    load_data(from_date, to_date, reg_no);
});

$('#clear').on('click', function () {
    $('#from_date').val('');
    $('#to_date').val('');
    $('#reg_no').val('');
    $('#maintable').DataTable().destroy();
    load_data();
});

function load_data(from_date = '', to_date = '', reg_no = '') {
    var table = $('#maintable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: $('#maintable').attr('data-url'),
            data: { from_date: from_date, to_date: to_date, reg_no: reg_no }
        },
        columns: [
            { data: 'visitorID', name: 'visitorID' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'employee', name: 'employee' },
            { data: 'checkin', name: 'checkin' },
            { data: 'check_out', name: 'check_out' },
        ],
        "ordering": false,
    });
}
