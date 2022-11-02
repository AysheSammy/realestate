
    <div class="bg-white rounded shadow p-3 mb-3">
        <div class="row">
            <div class="col">
                <div class="h6">
                    <span class="text-secondary">Location:</span>
                    <a href="{{ route('home', ['location_id' => $property->location_id]) }}">
                        {{ $property->location->name }}
                    </a>
                </div>
                <div class="h6">
                    <span class="text-secondary">Owner Type:</span>
                    <a href="{{ route('home', ['owner_type_id' => $property->owner_type_id]) }}">
                        {{ $property->owner_type->name }}
                    </a>
                </div>
                <div class="h6">
                    <span class="text-secondary">Property Type:</span>
                    <a href="{{ route('home', ['property_type_id' => $property->property_type_id]) }}">
                        {{ $property->property_type->name }}
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="h6">
                    <span class="text-secondary">Price</span>
                    {{ number_format($property->price, 0, '.', ' ') }}K
                </div>
                <div class="h6">
                    <span class="text-secondary">Viewed</span>
                    {{ number_format($property->viewed, 0, '.', ' ') }}
                </div>
            </div>
            <div class="col">
                <div class="h6 mb-0">
                    @if($property->repair)
                        <i class="bi-check-circle text-success"></i>
                    @else
                        <i class="bi-x-circle text-danger"></i>
                    @endif
                    <span class="text-secondary">Repair</span>
                </div>
                <div class="h6 mb-0">
                    @if($property->credit)
                        <i class="bi-check-circle text-success"></i>
                    @else
                        <i class="bi-x-circle text-danger"></i>
                    @endif
                    <span class="text-secondary">Credit</span>
                </div>
                <div class="h6 mb-0">
                    @if($property->documents)
                        <i class="bi-check-circle text-success"></i>
                    @else
                        <i class="bi-x-circle text-danger"></i>
                    @endif
                    <span class="text-secondary">Documents</span>
                </div>
            </div>
            <div class="col">

                <div class="text-danger">
                    @if($property->rent == 0)
                        For Sale
                    @elseif($property->rent == 1)
                        For Rent
                    @else
                        For Sale and Rent
                    @endif
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="d-flex justify-content-between py-1  text-bg-success"  style="cursor: pointer">
                    <p class="text-white mb-0">Description:</p>
                <a href="{{"/properties/".$property->id}}" class="text-decoration-none">
                    <i class="bi-arrow-right-circle text-white"></i>
                </a>
            </div>
            <p class="small">
                {{$property->description}}
            </p>
        </div>
    </div>
