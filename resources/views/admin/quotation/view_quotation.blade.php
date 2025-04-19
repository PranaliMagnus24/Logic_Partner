<div class="container-fluid">
    <div class="text-end mb-3">
        <button class="btn btn-primary" onclick="window.print()">Print</button>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Report Name: {{ $quotation->enquiry->report_name }}</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Summary:</strong> {{ $quotation->summary }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Property:</strong> {{ $quotation->property }} </p>
                </div>
                <div class="col-md-6">
                    <p><strong>Contract Type:</strong> {{ $quotation->contract_type }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Land Purchase Cost:</strong> {{ $quotation->land_purchase_cost }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Building Cost:</strong> {{ $quotation->building_cost }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Purchase price:</strong> {{ $quotation->purchase_price }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>EOI Deposite land:</strong> {{ $quotation->eoi_deposite_land }} </p>
                </div>
                <div class="col-md-6">
                    <p><strong>Land Deposite:</strong> {{ $quotation->land_deposite_percent }}% &nbsp; {{ $quotation->land_deposite_price }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Building Deposite:</strong> {{ $quotation->building_deposite_percent }}% &nbsp; {{ $quotation->building_deposite_price }}  </p>
                </div>

            </div>
        </div>
    </div>
</div>
