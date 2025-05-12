<!DOCTYPE html>
<html>
<head>
    <title>Property PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        h4, h5 { margin-top: 0; }
        .section { margin-bottom: 20px; }
        .img-box { width: 100%; height: 200px; object-fit: cover; margin-bottom: 10px; }
    </style>
</head>
<body>

<h2>{{ $property->project_name }}</h2>
<p><strong>Address:</strong> {{ $property->property_address }}</p>
<p><strong>Price:</strong> ${{ number_format($property->property_price) }}</p>

{{-- Property Images --}}
@if($property->propertyImage->where('image_type', 'property')->count())
    @foreach ($property->propertyImage->where('image_type', 'property') as $image)
        <img class="img-box" src="{{ public_path('upload/propertyImg/' . $image->image_name) }}" alt="Property Image">
    @endforeach
@endif

<div class="section">
    <h4>Description</h4>
    <p>{!! $property->property_description !!}</p>
</div>

<div class="section">
    <h4>Specifications</h4>
    <table>
        <tr><th>Project Name</th><td>{{ $property->project_name }}</td></tr>
        <tr><th>Prices From</th><td>${{ number_format($property->price_from) }}</td></tr>
        <tr><th>Number Available</th><td>{{ $property->number_available }}</td></tr>
        <tr><th>Property Type</th><td>{{ $property->category->category_name }}</td></tr>
        <tr><th>Status</th><td>{{ $property->status }}</td></tr>
        <tr><th>Contract Type</th><td>{{ $property->contract->contract_type_name }}</td></tr>
        <tr><th>Estimated Date</th><td>{{ \Carbon\Carbon::parse($property->estimated_date)->format('d M Y') }}</td></tr>
        <tr><th>Land Area</th><td>{{ $property->land_area }} sqm</td></tr>
        <tr><th>House Area</th><td>{{ $property->house_area }} sqm</td></tr>
    </table>
</div>

</body>
</html>
