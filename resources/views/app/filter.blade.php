<form action="{{ url()->current() }}" method="get">
    <div class="mb-3">
        <label for="location" class="form-label fw-bold">Locations</label>
        <select class="form-select" name="location_ids[]" id="location" multiple size="3">
            @foreach($locations as $location)
                <option value="{{ $location->id }}" {{ in_array($location->id, $locationIds) ? 'selected':'' }}>
                    {{ $location->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="owner_type" class="form-label fw-bold">Owner Types</label>
        <select class="form-select" name="owner_type_ids[]" id="owner_type" multiple size="3">
            @foreach($owner_types as $owner_type)
                <option value="{{ $owner_type->id }}" {{ in_array($owner_type->id, $ownerTypeIds) ? 'selected':'' }}>
                    {{ $owner_type->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="property_type" class="form-label fw-bold">Colors</label>
        <select class="form-select" name="property_type_ids[]" id="property_type" multiple size="3">
            @foreach($property_types as $property_type)
                <option value="{{ $property_type->id }}" {{ in_array($property_type->id, $propertyTypeIds) ? 'selected':'' }}>
                    {{ $property_type->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="min_area" class="form-label fw-bold">Min Area</label>
            <input type="number" class="form-control" name="min_area" id="min_area" placeholder="0"
                   value="{{ isset($minArea) ? $minArea : old('min_area') }}">
        </div>
        <div class="col">
            <label for="max_area" class="form-label fw-bold">Max Area</label>
            <input type="number" class="form-control" name="max_area" id="max_area" placeholder="0"
                   value="{{ isset($maxArea) ? $maxArea : old('max_area') }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="min_price" class="form-label fw-bold">Min Price</label>
            <input type="number" class="form-control" name="min_price" id="min_price" placeholder="0"
                   value="{{ isset($minPrice) ? $minPrice : old('min_price') }}">
        </div>
        <div class="col">
            <label for="max_price" class="form-label fw-bold">Max Price</label>
            <input type="number" class="form-control" name="max_price" id="max_price" placeholder="0"
                   value="{{ isset($maxPrice) ? $maxPrice : old('max_price') }}">
        </div>
    </div>
    <div class="mb-3">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rent" id="sale" value="0"
                    {{ isset($rent) ? 'checked': '' }}>
            <label class="form-check-label fw-bold" for="sale">For Sale</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rent" id="rent" value="1"
                    {{ isset($rent) ? 'checked': '' }}>
            <label class="form-check-label fw-bold" for="rent">For Rent</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rent" id="both" value="2"
                    {{ isset($rent) ? 'checked': '' }}>
            <label class="form-check-label fw-bold" for="both">For Sale or Rent</label>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="repair" id="repair" value="1"
                        {{ isset($repair) ? 'checked': '' }}>
                <label class="form-check-label fw-bold" for="repair">Repair</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="credit" id="credit" value="1"
                        {{ isset($credit) ? 'checked': '' }}>
                <label class="form-check-label fw-bold" for="credit">Credit</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="documents" id="documents" value="1"
                        {{ isset($documents) ? 'checked': '' }}>
                <label class="form-check-label fw-bold" for="documents">Documents</label>
            </div>
        </div>
    </div>
    <div class="row g-2">
        <div class="col">
            <button type="submit" class="btn btn-dark w-100">Filter</button>
        </div>
        <div class="col-auto">
            <a href="{{ url()->current() }}" class="btn btn-light w-100">Clear</a>
        </div>
    </div>
</form>