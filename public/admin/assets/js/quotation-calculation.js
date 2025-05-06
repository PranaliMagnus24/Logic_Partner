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


////Quotation Preview Button
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
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Other" name="other_one_label[]">
            </div>
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


///////////Template Table
$(document).ready(function () {
    $('#addRowBtn').click(function () {
        let newRow = `
            <tr>
                <td>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-light move-up"><i class="bi bi-arrow-up"></i></button>
                        <button type="button" class="btn btn-sm btn-light move-down"><i class="bi bi-arrow-down"></i></button>
                        <button type="button" class="btn btn-sm btn-danger delete-row"><i class="bi bi-trash"></i></button>
                    </div>
                </td>
                <td><input type="text" name="labels[]" class="form-control"></td>
                <td>
                    <div class="input-group">
                        <input type="text" name="percentages[]" class="form-control">
                        <span class="input-group-text">%</span>
                    </div>
                </td>
                <td>
                    <select name="statuses[]" class="form-control">
                        <option value="Reserved">Reserved</option>
                        <option value="Unconditional Contract">Unconditional Contract</option>
                        <option value="Build Deposite Paid">Build Deposite Paid</option>
                        <option value="Settlement Land">Settlement Land</option>
                        <option value="Base Payment Paid">Base Payment Paid</option>
                        <option value="Frame Payment Paid">Frame Payment Paid</option>
                        <option value="Roof Payment Paid">Roof Payment Paid</option>
                        <option value="Enclosed Payment Paid">Enclosed Payment Paid</option>
                        <option value="Practical Completion">Practical Completion</option>
                    </select>
                </td>
            </tr>
        `;
        $('#paymentTable tbody').append(newRow);
    });

    // Delete row
    $(document).on('click', '.delete-row', function () {
        $(this).closest('tr').remove();
    });

    // Move row up
    $(document).on('click', '.move-up', function () {
        let row = $(this).closest('tr');
        row.prev().before(row);
    });

    // Move row down
    $(document).on('click', '.move-down', function () {
        let row = $(this).closest('tr');
        row.next().after(row);
    });
});


/////////Land DEposite value display selected
document.addEventListener('DOMContentLoaded', function () {
    const landDepositePercent = document.getElementById('land-deposite-percent');
    const templateDepositePercent = document.querySelector('input[name="template_land_deposite_percent"]');

    if (landDepositePercent && templateDepositePercent) {
        // Set initial value
        templateDepositePercent.value = landDepositePercent.value;

        // Optional: live update on input
        landDepositePercent.addEventListener('input', function () {
            templateDepositePercent.value = this.value;
        });
    }
});
////Building deposite value
document.addEventListener('DOMContentLoaded', function () {
    const buildingDepositePercent = document.getElementById('building-deposite-percent');
    const templateDepositePercent = document.querySelector('input[name="template_building_deposite_percent"]');

    if (buildingDepositePercent && templateDepositePercent) {
        // Set initial value
        templateDepositePercent.value = buildingDepositePercent.value;

        // Optional: live update on input
        buildingDepositePercent.addEventListener('input', function () {
            templateDepositePercent.value = this.value;
        });
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const eoiDepositeLand = document.getElementById('eoiDepositeLand');
    const eoiTemplateLand = document.querySelector('input[name="template_eoi_deposite_land"]');

    if (eoiDepositeLand && eoiTemplateLand) {
        // Set initial value
        eoiTemplateLand.value = eoiDepositeLand.value;

        // Optional: live update on input
        eoiDepositeLand.addEventListener('input', function () {
            eoiTemplateLand.value = this.value;
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const eoiDepositeBuild = document.getElementById('eoiDepositeBuild');
    const eoiTemplateBuild = document.querySelector('input[name="template_eoi_deposite_build"]');

    if (eoiDepositeBuild && eoiTemplateBuild) {
        // Set initial value
        eoiTemplateBuild.value = eoiDepositeBuild.value;

        // Optional: live update on input
        eoiDepositeBuild.addEventListener('input', function () {
            eoiTemplateBuild.value = this.value;
        });
    }
});


////Calculate land price + house price
$(document).ready(function () {
    function calculatePrice() {
        let landPrice = parseFloat($('#landPrice').val()) || 0;
        let housePrice = parseFloat($('#housePrice').val()) || 0;
        let totalPrice = landPrice + housePrice;

        $('#totalPrice').val(totalPrice.toFixed(2));
    }

    $('#landPrice, #housePrice').on('input', calculatePrice);
});


//////////enquiry preview
function submitenquiryPreview() {
    const form = document.getElementById('enquiryForm');

    const previewForm = document.createElement('form');
    previewForm.action = window.appData.enquiryPreviewRoute;
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

