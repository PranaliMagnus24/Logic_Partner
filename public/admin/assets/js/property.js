function submitpropertyPreview() {
    const form = document.getElementById('propertyForm');

    const previewForm = document.createElement('form');
    previewForm.action = window.appData.previewRoute;
    previewForm.method = 'POST';
    previewForm.target = '_blank';

    // Add CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = window.appData.csrfToken;
    previewForm.appendChild(csrfInput);

    // Copy form values into the new form
    const formData = new FormData(form);
    for (let [name, value] of formData.entries()) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        previewForm.appendChild(input);
    }

    document.body.appendChild(previewForm);
    previewForm.submit();
    document.body.removeChild(previewForm);
}

function setSubmissionType(type) {
    document.getElementById('submission_type').value = type;
}


////text editor
document.addEventListener('DOMContentLoaded', function () {
    var editorContainer = document.getElementById('quill-editor-full');
    var textarea = document.getElementById('quill-editor-full-area');

    if (editorContainer && textarea) {
      var quill = new Quill(editorContainer, {
        theme: 'snow',
        placeholder: 'Write here...',
      });

      quill.root.innerHTML = textarea.value.trim();
      quill.on('text-change', function () {
        textarea.value = quill.root.innerHTML;
      });

      document.querySelector('form').addEventListener('submit', function () {
        textarea.value = quill.root.innerHTML;
      });
    }
  });


  $(document).ready(function () {
    $('#project_name').change(function () {
        var propertyId = $(this).val();

        if (propertyId) {
            $.ajax({
                url: '/admin/get-property-details/' + propertyId,
                type: 'GET',
                success: function (data) {
                    console.log(data); // Log the response
                    if (data.error) {
                        alert(data.error);
                    } else {
                        $('#project_location').val(data.property_address);
                        $('#stage').val(data.stage);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText); // Log the error response
                    $('#project_location').val('');
                    $('#stage').val('');
                }
            });
        } else {
            $('#project_location').val('');
            $('#stage').val('');
        }
    });
});

/////Property compare all and delete all logic
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let table = $('#propertyTable').DataTable();
    // Handle Select All
    $(document).on('change', '#selectAll', function () {
        $('.property-checkbox').prop('checked', this.checked).trigger('change');
    });
     // Handle checkbox change
    $(document).on('change', '.property-checkbox', function () {
            let total = $('.property-checkbox').length;
            let checked = $('.property-checkbox:checked').length;
            $('#selectAll').prop('checked', total === checked);

            if (checked >= 3 && checked <= 5) {
                $('#compareSelected').show();
            } else {
                $('#compareSelected').hide();
            }
        });
        // Handle Compare
        $('#compareSelected').on('click', function () {
            let selectedIds = $('.property-checkbox:checked').map(function () {
                return $(this).val();
            }).get();

            if (selectedIds.length < 3 || selectedIds.length > 5) {
                alert('Please select between 3 to 5 properties.');
                return;
            }

            window.location.href = `${compareUrl}?ids=${selectedIds.join(',')}`;
        });
        // Handle bulkAction dropdown
        $(document).on('change', '#bulkAction', function () {
            const action = $(this).val();
            const selected = $('.property-checkbox:checked').map(function () {
                return $(this).val();
            }).get();

            if (selected.length === 0) {
                Swal.fire('Please select at least one property.');
                return;
            }

            if (action === 'compare') {
                if (selected.length < 3 || selected.length > 5) {
                    Swal.fire('Please select between 3 to 5 properties for comparison.');
                    return;
                }
                window.location.href = `${compareUrl}?ids=${selected.join(',')}`;
            } else if (action === 'delete') {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You are about to delete selected properties.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post(bulkDeleteUrl, { ids: selected })
                        .done(function (res) {
                            Swal.fire('Deleted!', res.message, 'success');
                            table.ajax.reload();
                        })
                        .fail(function (xhr) {
                            Swal.fire('Error!', xhr.responseJSON.message, 'error');
                        });

                    }
                });
            }
        });
    });

    /////Export to word
document.addEventListener("DOMContentLoaded", function () {
    const exportBtn = document.getElementById("exportWordBtn");

    if (typeof window.htmlDocx === 'undefined') {
        console.error("html-docx-js not loaded.");
        return;
    }

    if (exportBtn) {
        exportBtn.addEventListener("click", function () {
            const exportTemplate = document.getElementById("wordExportTemplate");

            if (!exportTemplate) return;

            const styles = `
                <style>
                    body { font-family: Arial, sans-serif; font-size: 14px; }
                    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                    th, td { border: 1px solid #000; padding: 8px; text-align: left; }
                    h2, h3 { color: #2c3e50; }
                    img { margin-top: 15px; }
                </style>
            `;

            const converted = window.htmlDocx.asBlob(`
                <html><head><meta charset="utf-8">${styles}</head><body>${exportTemplate.innerHTML}</body></html>
            `);

            const url = URL.createObjectURL(converted);
            const link = document.createElement("a");
            link.href = url;
            link.download = "property-details.docx";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    }
});
