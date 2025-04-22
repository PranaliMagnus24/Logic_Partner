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


/////////Add More input field button
function addTime() {
    const container = document.getElementById("add-more-container");

    const html = `
        <div class="mb-3 row align-items-center add-more mt-1">
            <input type="text" class="col-sm-4 col-form-label form-control" placeholder="Other"
                name="other_one_label[]" style="width: 240px;">

            <div class="col-sm-8">
                <input type="text" name="other_one_input[]" class="form-control" placeholder="0.00">
            </div>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', html);
}

///////Display state wise stamp_duty
$(document).ready(function() {
    $('#state-select').on('change', function () {
        let selectedState = $(this).val();
        let stampInput = $('input[name="stamp_duty"]');

        stampInput.prop('disabled', true);

        if (selectedState) {
            $.ajax({
                url: `/get-stamp-duty/${selectedState}`,
                type: 'GET',
                success: function (response) {
                    if (response.stamp_duty !== null && response.stamp_duty !== '') {
                        stampInput.val(response.stamp_duty);
                    } else {
                        stampInput.val('');

                    }
                    stampInput.prop('disabled', false);
                },
                error: function () {
                    stampInput.prop('disabled', false);
                    alert('Failed to fetch stamp duty');
                }
            });
        } else {
            stampInput.val('');
            stampInput.prop('disabled', false);
        }
    });

    if ($('#state-select').val()) {
        $('#state-select').trigger('change');
    }
});
