<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Project Name: {{ $quotation->project_name }}</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Enquiry Name:</strong> {{ $quotation->enquiry->enquiry_name ?? '-' }} </p>
                </div>
                <div class="col-md-6">
                    <p><strong>Project Location:</strong> {{ $quotation->project_location }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Build Up Area:</strong> {{ $quotation->build_up_area }} </p>
                </div>
                <div class="col-md-6">
                    <p><strong>No. Of Floors:</strong> {{ $quotation->num_floors }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Labor Cost:</strong> {{ $quotation->labor_cost }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Material Cost:</strong> {{ $quotation->material_cost }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Equipment Cost:</strong> {{ $quotation->equipment_cost }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Expenses:</strong> {{ $quotation->misc_expenses }} </p>
                </div>
                <div class="col-md-6">
                    <p><strong>Total Cost:</strong> {{ $quotation->total_cost }} </p>
                </div>
            </div>
        </div>
    </div>
</div>
