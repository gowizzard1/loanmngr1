$(document).ready(function() {
    $('#client-table').DataTable();
    $('#client-transactions-table').DataTable({
         "pageLength": 25,
         "dom": '<"top">rt<"bottom"flip><"clear">',
         // "info": false
    });
    $('.standing-loans').DataTable();
} );


//document.getElementsByTagName("H1")[0].setAttribute("class", "democlass");

// $(document).ready(function() {
    
//     $('#client-transactions-table tfoot th').each( function () {
//         var title = $(this).text();
//         $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
//     } );
 
//     // DataTable
//     var table = $('#client-transactions-table').DataTable();
 
//     // Apply the search
//     table.columns().every( function () {
//         var that = this;
 
//         $( 'input', this.footer() ).on( 'keyup change', function () {
//             if ( that.search() !== this.value ) {
//                 that
//                     .search( this.value )
//                     .draw();
//             }
//         } );
//     } );
// } );