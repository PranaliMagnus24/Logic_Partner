@extends('admin.layouts.layout')

@section('title', 'Quotation Management')
@section('admin')
@section('pagetitle', 'Quotation Management')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Quotation</h4>
                    <a href="{{ route('list.quotation')}}" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="card-body mt-3">
                    <form action="{{ route('update.quotation', $quotation->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="enquiry_id" value="{{ $enquiryId }}">
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Project Name<span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="project_name" class="form-control" value="{{ $quotation->project_name }}" readonly>
                                @error('project_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Project Location <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <input type="text" name="project_location" class="form-control" value="{{$quotation->project_location}}" readonly>
                                @error('project_location')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Build Up Area <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <input type="number" name="build_up_area" class="form-control" value="{{ old('build_up_area', $quotation->build_up_area) }}">
                                @error('build_up_area')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Number of Floors <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <input type="number" name="num_floors" class="form-control" value="{{ old('num_floors', $quotation->num_floors)}}">
                                @error('num_floors')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Labor Cost <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="number" name="labor_cost" class="form-control" value="{{ old('labor_cost', $quotation->labor_cost)}}">
                                @error('labor_cost')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Material Cost <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="number" name="material_cost" class="form-control" value="{{ old('material_cost', $quotation->material_cost)}}">
                                @error('material_cost')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Equipment Cost <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="number" name="equipment_cost" class="form-control" value="{{ old('equipment_cost', $quotation->equipment_cost)}}">
                                @error('equipment_cost')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Miscellaneous Expenses <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-lg-4">
                                <input type="number" name="misc_expenses" class="form-control" value="{{ old('misc_expenses', $quotation->misc_expenses)}}">
                                @error('misc_expenses')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div id="extraCostsContainer"></div>
                        <div class="mb-3 text-end">
                            <button type="button" class="btn btn-secondary" id="addExtraCost">Add New Row</button>
                        </div><!--  extra costs -->
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Total Cost <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <input type="number" name="total_cost" class="form-control" value="{{ old('total_cost', $quotation->total_cost)}}">
                                @error('total_cost')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Start Date <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $quotation->start_date)}}">
                                @error('start_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Completion Date <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <input type="date" name="completion_date" class="form-control" value="{{ old('completion_date', $quotation->completion_date)}}">
                                @error('completion_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <label for="" class="col-md-4 col-lg-2 col-form-label">Status <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-lg-4">
                                <select name="status" class="form-select">
                                    <option value="active" {{ old('status', $quotation->status) == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ old('status', $quotation->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="action" id="formAction" value="">
                        <div class="mb-3 text-center d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-sm me-2" onclick="setAction('draft')">Update as Draft</button>
                            <button type="submit" class="btn btn-primary btn-sm me-2" onclick="setAction('continue')">Update & Continue</button>
                            <button type="submit" class="btn btn-primary btn-sm" onclick="setAction('new')">Update & New</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<script>
     document.addEventListener('DOMContentLoaded', function() {
        let extraCostIndex = 0; // To keep track of the number of extra cost fields

        // Function to calculate total cost
        function calculateTotalCost() {
            const laborCost = parseFloat(document.getElementById('labor_cost').value) || 0;
            const materialCost = parseFloat(document.getElementById('material_cost').value) || 0;
            const equipmentCost = parseFloat(document.getElementById('equipment_cost').value) || 0;
            const miscExpenses = parseFloat(document.getElementById('misc_expenses').value) || 0;

            let totalExtraCost = 0;

            // Calculate total extra costs
            const extraCostInputs = document.querySelectorAll('.extra-cost-value');
            extraCostInputs.forEach(input => {
                totalExtraCost += parseFloat(input.value) || 0;
            });

            // Calculate total cost
            const totalCost = laborCost + materialCost + equipmentCost + miscExpenses + totalExtraCost;

            // Update the total cost input field
            document.getElementById('total_cost').value = totalCost.toFixed(2); // Format to 2 decimal places
        }

        document.getElementById('addExtraCost').addEventListener('click', function() {
            // Create a new div to hold the input fields
            const newCostDiv = document.createElement('div');
            newCostDiv.classList.add('mb-3', 'd-flex', 'align-items-center');

            // Create a new input field for the name (description) of the extra cost
            const nameInput = document.createElement('input');
            nameInput.type = 'text';
            nameInput.name = `extra_costs[${extraCostIndex}][name]`;
            nameInput.classList.add('form-control', 'me-2');
            nameInput.placeholder = 'Enter cost description';

            // Create a new input field for the value of the extra cost
            const valueInput = document.createElement('input');
            valueInput.type = 'number';
            valueInput.name = `extra_costs[${extraCostIndex}][value]`;
            valueInput.classList.add('form-control', 'me-2', 'extra-cost-value'); // Add a class for easy selection
            valueInput.placeholder = 'Enter extra cost';
            valueInput.addEventListener('input', calculateTotalCost); // Recalculate total cost on input

            // Create a button to remove the input field
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'removeExtraCost');
            removeButton.innerText = 'Remove';
            removeButton.addEventListener('click', function() {
                newCostDiv.remove(); // Remove the input field when the button is clicked
                calculateTotalCost(); // Recalculate total cost after removal
            });

            // Append the name input, value input, and remove button to the new div
            newCostDiv.appendChild(nameInput);
            newCostDiv.appendChild(valueInput);
            newCostDiv.appendChild(removeButton);

            // Append the new div to the container
            document.getElementById('extraCostsContainer').appendChild(newCostDiv);

            // Increment the index for the next input field
            extraCostIndex++;

            // Recalculate total cost after adding a new row
            calculateTotalCost();
        });

        // Initial calculation of total cost on page load
        calculateTotalCost();
    });



    // save and draft button script

    function setAction(action) {
        document.getElementById('formAction').value = action;
    }
</script>
