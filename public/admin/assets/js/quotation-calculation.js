///Addition of land-purchase-cost
$(document).ready(function () {
    function calculatePurchasePrice() {
        let landCost = parseFloat($('#land-purchase-cost').val()) || 0;
        let buildingCost = parseFloat($('#building-cost').val()) || 0;
        let total = landCost + buildingCost;

        $('#purchase-price').val(total.toFixed(2));
    }

    $('#land-purchase-cost, #building-cost').on('input', calculatePurchasePrice);
});

///Calculation percentage
$(document).ready(function () {
    function calculateDeposit(costSelector, percentSelector, resultSelector) {
        let percent = parseFloat($(percentSelector).val()) || 0;
        let cost = parseFloat($(costSelector).val()) || 0;
        let deposit = (cost * percent) / 100;
        $(resultSelector).val(deposit.toFixed(2));
    }

    $('#land-deposite-percent').on('input', function () {
        calculateDeposit('#land-purchase-cost', '#land-deposite-percent', '#land-deposite-price');
    });

    $('#land-purchase-cost').on('input', function () {
        $('#land-deposite-percent').trigger('input');
    });


    $('#building-deposite-percent').on('input', function () {
        calculateDeposit('#building-cost', '#building-deposite-percent', '#building-deposite-price');
    });

    $('#building-cost').on('input', function () {
        $('#building-deposite-percent').trigger('input');
    });
});


////Preview Button
function submitPreview() {
    const form = document.getElementById('quotationForm');

    const previewForm = document.createElement('form');
    previewForm.action = window.quotationPreviewRoute;
    previewForm.method = 'POST';
    previewForm.target = '_blank';

    // Add CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = window.csrfToken;
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

