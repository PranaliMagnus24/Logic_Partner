/**
 * Edit Permission Modal JS
 */

'use strict';

// Populate the edit modal with the selected permission's data
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('edit-permission')) {
        const permissionId = e.target.getAttribute('data-id');
        const permissionName = e.target.getAttribute('data-name');

        // Set the permission name in the input field
        document.getElementById('editPermissionName').value = permissionName;

        // Optionally, you can store the permission ID in a hidden input for later use
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'permission_id';
        hiddenInput.value = permissionId;
        document.getElementById('editPermissionForm').appendChild(hiddenInput);
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Handle the form submission for editing a permission
    document.getElementById('editPermissionForm').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        const formData = new FormData(this);
        const permissionId = formData.get('permission_id');

        // Make an AJAX request to update the permission
        fetch(`/permission/update/${permissionId}`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken // Include CSRF token
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Close the modal
                $('#editPermissionModal').modal('hide');

                // Optionally, refresh the DataTable or update the row
                dt_permission.ajax.reload(); // Reload the DataTable to reflect changes
            } else {
                // Handle validation errors or other issues
                console.error(data.message);
                // Optionally, display error messages to the user
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
