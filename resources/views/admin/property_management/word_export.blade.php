<div id="wordExportTemplate" style="display: none;">
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <title>Property Card</title>
            <style>
            body
            {
                margin: 0;
                font-family: Arial, sans-serif;
                background: #f5f7fa;
            }
            .container
            {
                max-width: 1100px;
                margin: 30px auto;
                padding: 20px;
            }
            .card
            {
                display: flex;
                background: white;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                border-radius: 6px;
                overflow: hidden;
            }
            .left
            {
                width: 35%;
                border-right: 1px solid #ddd;
            }
            .left img
            {
                width: 100%;
                height: auto;
                display: block;
            }
            .info
            {
                padding: 15px;
            }
            .location
            {
                color: #0077cc;
                font-size: 18px;
                font-weight: bold;
                display: block;
            }
            .price
            {
                color: #009900;
                font-size: 22px;
                font-weight: bold;
                margin: 5px 0;
            }
            .icons
            {
                margin: 10px 0;
                color: #444;
                font-size: 16px;
            }
            .icons span
            {
                margin-right: 10px;
            }
            .address
            {
                font-size: 14px;
                margin: 10px 0;
            }
            .stage
            {
                margin-top: 10px;
                font-weight: bold;
                font-size: 14px;
            }
            .stage-number {
                background: #27ae60;
                color: white;
                padding: 3px 7px;
                border-radius: 4px;
                font-size: 13px;
            }
            .right
            {
                padding: 20px;
                width: 65%;
            }
            .right h2
            {
                margin-top: 0;
                color: #333;
            }
            .right h3
            {
                margin-top: 20px;
                color: #333;
            }
            .right p
            {
                color: #555;
                line-height: 1.6;
            }
            .right ol
            {
                padding-left: 20px;
                color: #444;
            }
            .right ol li
            {
                margin-bottom: 8px;
            }
            .three-column
            {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
                margin-top: 30px;
            }
            .box
            {
                background: white;
                border-radius: 6px;
                box-shadow: 0 1px 6px rgba(0,0,0,0.1);
                overflow: hidden;
                padding: 10px;
            }
            .box img
            {
                width: 100%;
                height: auto;
                border-bottom: 1px solid #ddd;
                margin-bottom: 10px;
            }
            .box table
            {
                width: 100%;
                border-collapse: collapse;
                font-size: 14px;
            }
            .box table td
            {
                padding: 6px 8px;
                border: 1px solid #ddd;
            }
            .spec .icons
            {
                font-size: 16px;
                margin: 10px 0;
                color: #444;
                display: flex;
                gap: 10px;
            }
            .spec-btn
            {
                background-color: #007bff;
                color: white;
                border: none;
                padding: 8px 16px;
                margin-bottom: 10px;
                font-weight: bold;
                border-radius: 5px;
                cursor: default;
            }
</style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="left">
                @if($property->propertyImage->where('image_type', 'property')->count())
                <img src="{{ asset('upload/propertyImg/' . $property->propertyImage->where('image_type', 'property')->first()->image_name) }}" alt="Property Image" />
                @endif
                <div class="info">
                    <span class="location">{{ $property->project_name }}</span>
                    <span class="price">${{$property->property_price}}</span>
                    <div class="icons">
                        <span>🛏️ {{ $property->available_rooms }}</span>
                        <span>🛁 {{ $property->available_bathrooms }}</span>
                        <span>🚗 {{ $property->available_parking }}</span>
                    </div>
                    <div class="address">
                        <strong>{{$property->property_address}}</strong>
                    </div>
                    <div class="stage">Stage: <span class="stage-number">{{$property->stage}}</span></div>
                </div>
            </div>
            <div class="right">
                <h5>{{$property->property_address}}</h5>
                <p>{!! $property->property_description !!}</p>
            </div>
        </div>
    </div>
    <div class="three-column">
        <div class="box">
            @if($property->propertyImage->where('image_type', 'project')->count())
            <img src="{{ asset('upload/propertyImg/' . $property->propertyImage->where('image_type', 'project')->first()->image_name) }}" alt="Project Image" />
            @endif
            <table>
                <tr><td><strong>Project Name</strong></td><td>{{$property->project_name}}</td></tr>
                <tr><td><strong>Prices From</strong></td><td>${{$property->price_from}}</td></tr>
                <tr><td><strong>Number Available</strong></td><td>{{ $property->number_available }}</td></tr>
            </table>
        </div>
        <div class="box">
            @if($property->propertyImage->where('image_type', 'area')->count())
            <img src="{{ asset('upload/propertyImg/' . $property->propertyImage->where('image_type', 'area')->first()->image_name) }}" alt="Area Image" />
            @endif
            <table>
                <tr><td><strong>Area Name</strong></td><td>{{ $property->area_name }}</td></tr>
                <tr><td><strong>Total Population</strong></td><td>{{ $property->total_population }}</td></tr>
                <tr><td><strong>Distance to CBD</strong></td><td>{{ $property->distance_to_cbd }}</td></tr>
            </table>
        </div>
        <div class="box spec">
            <button class="spec-btn">Specification</button>
            <div class="icons">
                <span>🛏️ {{ $property->available_rooms }}</span>
                <span>🛁 {{ $property->available_bathrooms }}</span>
                <span>🚗 {{ $property->available_parking }}</span>
            </div>
            <table>
                <tr><th>Property Id</th><td>{{ $property->property_id }}</td></tr>
                <tr><th>Property Type</th><td>{{ $property->category->category_name}}</td></tr>
                <tr><th>Status</th><td>{{ $property->status }}</td></tr>
                <tr><th>Contract Type</th><td>{{ $property->contract->contract_type_name }}</td></tr>
                <tr><th>Title Type</th><td>{{ $property->title_type }}</td></tr>
                <tr><th>Titled</th><td>{{ $property->titled }}</td></tr>
                <tr><th>Indicative Package</th><td>{{ $property->indicative_package }}</td></tr>
                <tr><th>Estimated Date</th><td>{{ \Carbon\Carbon::parse($property->estimated_date)->format('d M Y') }}</td></tr>
                <tr><th>Rent Yield</th><td>{{ $property->rent_yield }} %</td></tr>
                <tr><th>Approx. Weekly Rent</th><td>${{ $property->approx_weekly_rent }}</td></tr>
                <tr><th>Land Area</th><td>{{ $property->land_area }} sqm</td></tr>
                <tr><th>House Area</th><td>{{ $property->house_area }} sqm</td></tr>
                @if(!empty($property->land_price))
                <tr><th>Land Price</th><td>${{ $property->land_price }}</td></tr>
                @endif
                @if(!empty($property->house_price))
                <tr><th>House Price</th><td>${{ $property->house_price }}</td></tr>
                @endif
                @if(!empty($property->total_price))
                <tr><th>Total Price</th><td>${{ $property->total_price }}</td></tr>
                @endif
                <tr><th>Stage</th><td>{{ $property->stage }}</td></tr>
                <tr><th>Stamp duty Est.</th><td>${{ $property->stamp_duty_est }}</td></tr>
                <tr><th>Gov. Transfer Fee</th><td>${{ $property->gov_transfer_fee }}</td></tr>
            </table>
        </div>
    </div>
</body>
</html>
</div>




