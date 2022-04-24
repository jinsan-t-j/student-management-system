require('./bootstrap');

/* Variables*/
window.app = {};
app.lang = {};
app.lang.datatables = {
    "emptyTable": "No entries found",
    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
    "infoFiltered": "(filtered from _MAX_ total entries)",
    "loadingRecords": "Processing...",
    "processing": "<div class=\"dt-loader\"><\/div>",
    "search": "<div class=\"d-flex align-items-center input-group\"><span class=\"input-group-addon\"><i class=\"fa fa-search\"><\/i><\/span>",
    "searchPlaceholder": "Search",
    "zeroRecords": "No matching results ",
    "paginate": { "first": "First", "last": "Last", "next": "Next", "previous": "Previous" },
    "aria": { "sortAscending": " activate to sort column ascending", "sortDescending": " activate to sort column descending" }
};
app.options = {};
app.options.datatables = {
    "language": app.lang.datatables,
    "processing": true,
    "serverSide": true,
};

$('body').on('click', '.confirm-delete', function(event) {
    event.preventDefault();
    var deleteButton = $(this);
    Swal.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this item !",
        icon: 'warning',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete it',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed){
            deleteButton.submit();
        }
    });
});

$(".select2").select2({
    dropdownAutoWidth: true,
    width: '100%'
});