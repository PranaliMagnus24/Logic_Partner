<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Project Name: {{ $enquiry->project_name }}</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Client Name:</strong> {{ $enquiry->customer_name }} </p>
                </div>
                <div class="col-md-6">
                    <p><strong>Project Location:</strong> {{ $enquiry->project_location }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Estimated Budget:</strong> ₹{{ number_format($enquiry->estimated_budget, 2) }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Estimated Timeline:</strong> {{ $enquiry->estimated_timeline }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Enquiry Name:</strong> {{ $enquiry->enquiry_name }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Stage:</strong> {{ $enquiry->stage }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Status:</strong> {{ ucfirst($enquiry->status) }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Follow Up Date:</strong> {{ \Carbon\Carbon::parse($enquiry->follow_up_date)->format('d M Y') }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Follow Up Time:</strong> {{ \Carbon\Carbon::parse($enquiry->follow_up_time)->format('h:i A') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
