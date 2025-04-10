'use strict';

document.addEventListener('DOMContentLoaded', function () {
  (function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // Form validation setup
    FormValidation.formValidation(document.getElementById('addRoleForm'), {
      fields: {
        name: {
          validators: {
            notEmpty: {
              message: 'Please enter role name'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          eleValidClass: '',
          rowSelector: '.form-control-validation'
        }),
        submitButton: new FormValidation.plugins.SubmitButton(),
        autoFocus: new FormValidation.plugins.AutoFocus()
      }
    });

    // Select All
    const selectAll = document.querySelector('#selectAll'),
      checkboxList = document.querySelectorAll('input[type="checkbox"][name="permission[]"]');
    if (selectAll) {
      selectAll.addEventListener('change', t => {
        checkboxList.forEach(e => {
          e.checked = t.target.checked;
        });
      });
    }

 // Edit role button



    // Reset modal to "Add" state
    const roleModal = document.getElementById('addRoleModal');
    roleModal.addEventListener('hidden.bs.modal', function () {
      const form = document.getElementById('addRoleForm');
      form.setAttribute('action', '/role');

      const methodInput = form.querySelector('input[name="_method"]');
      if (methodInput) methodInput.remove();

      document.getElementById('modalRoleName').value = '';
      checkboxList.forEach(cb => (cb.checked = false));
      document.querySelector('.role-title').textContent = 'Add New Role';
    });






  })();

});

document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.querySelectorAll('.role-delete').forEach(button => {
        button.addEventListener('click', function () {
            const roleId = this.getAttribute('data-role-id');
            if (confirm('Are you sure you want to delete this role?')) {
                fetch(`/role/${roleId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        location.reload();
                    } else {
                        alert('Failed to delete the role.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Something went wrong!');
                });
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
document.querySelectorAll('.role-edit-modal').forEach(button => {
    button.addEventListener('click', function () {
      const roleId = this.getAttribute('data-role-id');
      const roleName = this.getAttribute('data-role-name');
      const permissions = JSON.parse(this.getAttribute('data-role-permissions'));

      const form = document.getElementById('addRoleForm1');
      form.setAttribute('action', `/role/${roleId}`);

      let methodInput = form.querySelector('input[name="_method"]');
      if (!methodInput) {
        methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        form.appendChild(methodInput);
      }
      methodInput.value = 'PATCH';

      document.getElementById('modalRoleName').value = roleName;

      checkboxList.forEach(cb => (cb.checked = false));

      permissions.forEach(perm => {
        const checkbox = form.querySelector(`input[name="permission[]"][value="${perm}"]`);
        if (checkbox) checkbox.checked = true;
      });

      document.querySelector('.role-title').textContent = 'Edit Role';
    });
  });
});
