// Initialize DataTable
// new DataTable('#example');

// $('#example').DataTable({
//     responsive: true
// });

new DataTable('#example', {
    responsive: true,
});

$(document).ready(function() {
    // Quotation Table List
    if ($('.datatable').length) {
        $('.datatable').DataTable({
            serverSide: true,
            processing: true,
            responsive: true,
            dom: "<'row mb-3'<'col-sm-4'l><'col-sm-8 d-flex justify-content-end align-items-center gap-2'fB>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row mt-2'<'col-sm-6'i><'col-sm-6 d-flex justify-content-end'p>>",
            buttons: [
                {
                    extend: 'collection',
                    text: 'Export',
                    className: 'btn btn-light dropdown-toggle',
                    buttons: [
                        {
                            extend: 'csv',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4, 5] }
                        },
                        {
                            extend: 'excel',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4, 5] }
                        },
                        {
                            extend: 'pdf',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4, 5] }
                        },
                        {
                            extend: 'print',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4, 5] }
                        }
                    ]
                }
            ],
            ajax: {
                url: quotationUrl
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'report_name', name: 'report_name' },
                { data: 'property', name: 'property' },
                { data: 'contract_type', name: 'contract_type' },
                { data: 'purchase_price', name: 'purchase_price' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    }

    // Enquiry Table List
    if ($('.enquiryTable').length) {
        $('.enquiryTable').DataTable({
            serverSide: true,
            processing: true,
            responsive: true,
            dom: "<'row mb-3'<'col-sm-4'l><'col-sm-8 d-flex justify-content-end align-items-center gap-2'fB>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row mt-2'<'col-sm-6'i><'col-sm-6 d-flex justify-content-end'p>>",
            buttons: [
                {
                    extend: 'collection',
                    text: 'Export',
                    className: 'btn btn-light dropdown-toggle',
                    buttons: [
                        {
                            extend: 'csv',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4] }
                        },
                        {
                            extend: 'excel',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4] }
                        },
                        {
                            extend: 'pdf',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4] }
                        },
                        {
                            extend: 'print',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4] }
                        }
                    ]
                }
            ],
            ajax: {
                url: enquiryUrl
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'project_name', name: 'project_name' },
                { data: 'project_location', name: 'project_location' },
                { data: 'estimated_budget', name: 'estimated_budget' },
                { data: 'estimated_timeline', name: 'estimated_timeline' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    }

///User Table List
    if ($('.userList').length) {
        $('.userList').DataTable({
            serverSide: true,
            processing: true,
            responsive: true,
            dom: "<'row mb-3'<'col-sm-4'l><'col-sm-8 d-flex justify-content-end align-items-center gap-2'fB>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row mt-2'<'col-sm-6'i><'col-sm-6 d-flex justify-content-end'p>>",
            buttons: [
                {
                    extend: 'collection',
                    text: 'Export',
                    className: 'btn btn-light dropdown-toggle',
                    buttons: [
                        {
                            extend: 'csv',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3] }
                        },
                        {
                            extend: 'excel',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3] }
                        },
                        {
                            extend: 'pdf',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3] }
                        },
                        {
                            extend: 'print',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3] }
                        }
                    ]
                }
            ],
            ajax: {
                url: userUrl
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'roles', name: 'roles', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]

        });
    }

///Permission Table List
    if ($('.permissionList').length) {
        $('.permissionList').DataTable({
            serverSide: true,
            processing: true,
            responsive: true,
            dom: "<'row mb-3'<'col-sm-4'l><'col-sm-8 d-flex justify-content-end align-items-center gap-2'fB>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row mt-2'<'col-sm-6'i><'col-sm-6 d-flex justify-content-end'p>>",
            buttons: [
                {
                    extend: 'collection',
                    text: 'Export',
                    className: 'btn btn-light dropdown-toggle',
                    buttons: [
                        {
                            extend: 'csv',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3] }
                        },
                        {
                            extend: 'excel',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3] }
                        },
                        {
                            extend: 'pdf',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3] }
                        },
                        {
                            extend: 'print',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3] }
                        }
                    ]
                }
            ],
            ajax: {
                url: permissionUrl
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]

        });
    }

    ////Roles Table List
    if ($('.rolesList').length) {
        $('.rolesList').DataTable({
            serverSide: true,
            processing: true,
            responsive: true,
            dom: "<'row mb-3'<'col-sm-4'l><'col-sm-8 d-flex justify-content-end align-items-center gap-2'fB>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row mt-2'<'col-sm-6'i><'col-sm-6 d-flex justify-content-end'p>>",
            buttons: [
                {
                    extend: 'collection',
                    text: 'Export',
                    className: 'btn btn-light dropdown-toggle',
                    buttons: [
                        {
                            extend: 'csv',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3] }
                        },
                        {
                            extend: 'excel',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3] }
                        },
                        {
                            extend: 'pdf',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3] }
                        },
                        {
                            extend: 'print',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3] }
                        }
                    ]
                }
            ],
            ajax: {
                url: rolesUrl
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]

        });
    }
/////CMS Page List
    if ($('.pageList').length) {
        $('.pageList').DataTable({
            serverSide: true,
            processing: true,
            responsive: true,
            dom: "<'row mb-3'<'col-sm-4'l><'col-sm-8 d-flex justify-content-end align-items-center gap-2'fB>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row mt-2'<'col-sm-6'i><'col-sm-6 d-flex justify-content-end'p>>",
            buttons: [
                {
                    extend: 'collection',
                    text: 'Export',
                    className: 'btn btn-light dropdown-toggle',
                    buttons: [
                        {
                            extend: 'csv',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] }
                        },
                        {
                            extend: 'excel',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] }
                        },
                        {
                            extend: 'pdf',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] }
                        },
                        {
                            extend: 'print',
                            className: 'dropdown-item',
                            exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] }
                        }
                    ]
                }
            ],
            ajax: {
                url: pageUrl
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'title', name: 'title' },
                { data: 'summary', name: 'summary' },
                { data: 'description', name: 'description' },
                { data: 'image', name: 'image', orderable: false, searchable: false },
                { data: 'meta_title', name: 'meta_title' },
                { data: 'meta_keyword', name: 'meta_keyword' },
                { data: 'meta_description', name: 'meta_description' },
                { data: 'meta_title', name: 'meta_title' },
                { data: 'og_description', name: 'og_description' },
                { data: 'og_img', name: 'og_img', orderable: false, searchable: false },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]

        });
    }

/////FAQ Table List
if ($('.faqList').length) {
    $('.faqList').DataTable({
    serverSide: true,
    processing: true,
    responsive: true,
    dom: "<'row mb-3'<'col-sm-4'l><'col-sm-8 d-flex justify-content-end align-items-center gap-2'fB>>" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row mt-2'<'col-sm-6'i><'col-sm-6 d-flex justify-content-end'p>>",
    buttons: [
        {
            extend: 'collection',
            text: 'Export',
            className: 'btn btn-light dropdown-toggle',
            buttons: [
                {
                    extend: 'csv',
                    className: 'dropdown-item',
                    exportOptions: { columns: [0, 1, 2, 3] }
                },
                {
                    extend: 'excel',
                    className: 'dropdown-item',
                    exportOptions: { columns: [0, 1, 2, 3] }
                },
                {
                    extend: 'pdf',
                    className: 'dropdown-item',
                    exportOptions: { columns: [0, 1, 2, 3] }
                },
                {
                    extend: 'print',
                    className: 'dropdown-item',
                    exportOptions: { columns: [0, 1, 2, 3] }
                }
            ]
        }
    ],
    ajax: {
        url: faqUrl
    },
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'question', name: 'question' },
        { data: 'answer', name: 'answer' },
        { data: 'status', name: 'status' },
        { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
});
}



});

// Delete confirmation
document.addEventListener('DOMContentLoaded', function () {
    // const deleteLinks = document.querySelectorAll('.delete-confirm');

    // deleteLinks.forEach(link => {
    //     link.addEventListener('click', function (e) {
    //         e.preventDefault();
    //         const url = this.getAttribute('href');

    //         Swal.fire({
    //             title: 'Are you sure?',
    //             text: "This Data will be deleted!",
    //             icon: 'warning',
    //             showCancelButton: true,
    //             confirmButtonColor: '#3085d6',
    //             cancelButtonColor: '#d33',
    //             confirmButtonText: 'Yes, delete it!'
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 window.location.href = url;
    //             }
    //         });
    //     });
    // });

    // Show offcanvas if edit mode is active
    if (window.editMode === true) {
        const offcanvasElement = document.getElementById('offcanvasRight');
        if (offcanvasElement) {
            const offcanvas = new bootstrap.Offcanvas(offcanvasElement);
            offcanvas.show();
        }
    }
});

////delete button
$(document).on('click', '.delete-confirm', function (e) {
    e.preventDefault();
    const url = $(this).attr('href');

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

////Show enquiry details
$(document).on('click', '.view-enquiry', function(e) {
    e.preventDefault();
    let id = $(this).data('id');

    $('#enquiry-details').html('<div class="text-center"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</div>');
    $('#viewEnquiryModal').modal('show');

    $.ajax({
        url: '/admin/enquiry/show/' + id,
        method: 'GET',
        success: function(response) {
            $('#enquiry-details').html(response.html);
        },
        error: function() {
            $('#enquiry-details').html('<p class="text-danger">Failed to load enquiry details.</p>');
        }
    });
});

////Show Quotation details
$(document).on('click', '.view-quotation', function(e) {
    e.preventDefault();
    let id = $(this).data('id');

    $('#quotation-details').html('<div class="text-center"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</div>');
    $('#viewquotationModal').modal('show');

    $.ajax({
        url: '/admin/quotation/show/' + id,
        method: 'GET',
        success: function(response) {
            $('#quotation-details').html(response.html);
        },
        error: function() {
            $('#quotation-details').html('<p class="text-danger">Failed to load quotation details.</p>');
        }
    });
});


