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
    var quill = new Quill('#quill-editor-full', {
      theme: 'snow',
      placeholder: 'Write here...',
    });

    var textarea = document.getElementById('quill-editor-full-area');
    quill.root.innerHTML = textarea.value.trim();
    quill.on('text-change', function () {
      textarea.value = quill.root.innerHTML;
    });

    document.querySelector('form').addEventListener('submit', function () {
      textarea.value = quill.root.innerHTML;
    });
  });


