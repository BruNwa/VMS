/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

load_data();

function load_data(status = '',requests='') {
  var table = $('#maintable').DataTable({
    processing : true,
    serverSide : true,
    ajax : {
      url : $('#maintable').attr('data-url'),
      data : {status : status, requested : requests}
    },
    columns : [
      {data : 'visitor_id', name : 'visitor_id'},
      {data : 'name', name : 'name'},
      {data : 'employee_id', name : 'employee_id'},
      {data : 'date', name : 'date'},
      {data : 'checkout', name : 'checkout'},
      {data : 'status', name : 'status'},
      {data : 'action', name : 'action'},
    ],
    "ordering" : false,
    "searching": false,
    "filter": false,
    "lengthChange": false
  });

  let hidecolumn = $('#maintable').data('hidecolumn');
  if(!hidecolumn) {
      table.column( 7 ).visible( false );
  }
}

function confirmDelete() {
  var r = confirm("Are you sure want to delete this record?");
  if (r == false) {
      return false;
  }
}
