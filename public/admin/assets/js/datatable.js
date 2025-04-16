// Initialize DataTable
// new DataTable('#example');

// $('#example').DataTable({
//     responsive: true
// });

new DataTable('#example', {
    responsive: true,
});

$(document).ready(function(){
    $('.datatable').DataTable({
        serverSide: true,
        processing: true,
        responsive: true,
        ajax: {
            url: quotationUrl
        },
        columns:[
                { data: 'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false },

        ]
    });
})
// Delete confirmation
document.addEventListener('DOMContentLoaded', function () {
    const deleteLinks = document.querySelectorAll('.delete-confirm');

    deleteLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const url = this.getAttribute('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "This Data will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });

    // Show offcanvas if edit mode is active
    if (window.editMode === true) {
        const offcanvasElement = document.getElementById('offcanvasRight');
        if (offcanvasElement) {
            const offcanvas = new bootstrap.Offcanvas(offcanvasElement);
            offcanvas.show();
        }
    }
});
