/*
 * START - Js for backend User list page datatable
 */
$(function () {
    oTable = $('#order_list').DataTable({
        "language": {
            "info": "Showing _START_ to _END_ of _TOTAL_ orders",
            "lengthMenu": "Show _MENU_ orders",
            "infoFiltered": "(filtered from _MAX_ total orders)",
            "sInfoEmpty": "Showing 0 to 0 of 0 orders",
        },
        searching: true,
        "paging": true,
        "processing": true,
        "serverSide": true,
        stateSave: false,
        "ajax": javascript_path + '/get-all-orders',
        "columns": [
            {data: 'DT_Row_Index', name: 'id'},
            {data: 'customer_name', name: 'first_name'},
            {data: 'address', name: 'last_name'},
            {data: 'quantity', name: 'email'},
            {data: 'order_date', name: 'user_status'},
            {data: 'action', name: 'action', orderable: false, searchable: false, "width": "15%"}
        ],
    });
});
/*
 * END - Js for backend User list page datatable
 */

/*
 * START - Js for Delete user single record
 * @Param           : user_id
 * @return          : redirect to same page
 */
function deleteUser(id) {
    if (id) {
        if (confirm('Are you sure you want to delete this?')) {
            $.ajax({
                url: javascript_path + '/user/delete/' + id,
                type: "POST",
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'user_id': id,
                    dataType: 'json',
                },
                success: function (resp) {
                    window.location.href = window.location.href;
                }
            });
        }
    }
}
/*
 * END - Js for Delete user single record
 */