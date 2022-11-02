<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\OwnerType;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'location_ids' => 'nullable|array|min:1',
            'location_ids.*' => 'integer|distinct|min:1',
            'owner_type_ids' => 'nullable|array|min:1',
            'owner_type_ids.*' => 'integer|distinct|min:1',
            'property_type_ids' => 'nullable|array|min:1',
            'property_type_ids.*' => 'integer|distinct|min:1',
            'rent' => 'nullable|integer|min:0|max:2',
            'repair' => 'nullable|boolean',
            'credit' => 'nullable|boolean',
            'documents' => 'nullable|boolean',
            'min_area' => 'nullable|integer|min:0',
            'max_area' => 'nullable|integer|gt:min_area',
            'min_price' => 'nullable|integer|min:0',
            'max_price' => 'nullable|integer|gt:min_price',
        ]);
        $locationIds = $request->has('location_ids') ? $request->location_ids : [];
        $ownerTypeIds = $request->has('owner_type_ids') ? $request->owner_type_ids : [];
        $propertyTypeIds = $request->has('property_type_ids') ? $request->property_type_ids : [];
        $repair = $request->has('repair') ? $request->repair : null;
        $credit = $request->has('credit') ? $request->credit : null;
        $documents = $request->has('documents') ? $request->documents : null;
        $rent = $request->has('rent') ? $request->rent : null;
        $minArea = $request->has('min_area') ? $request->min_area : null;
        $maxArea = $request->has('max_area') ? $request->max_area : null;
        $minPrice = $request->has('min_price') ? $request->min_price : null;
        $maxPrice = $request->has('max_price') ? $request->max_price : null;

        $properties = Property::when($locationIds, function ($query, $locationIds) {
            $query->whereIn('location_id', $locationIds);
            })
            ->when($ownerTypeIds, function ($query, $ownerTypeIds) {
                $query->whereIn('owner_type_id', $ownerTypeIds);
            })
            ->when($propertyTypeIds, function ($query, $propertyTypeIds) {
                $query->whereIn('property_type_id', $propertyTypeIds);
            })
            ->when($credit, function ($query) {
                $query->where('credit', 1);
            })
            ->when($documents, function ($query) {
                $query->where('documents', 1);
            })
            ->when($repair, function ($query) {
                $query->where('repair', 1);
            })
            ->when($rent, function ($query, $rent) {
                $query->where('rent', $rent);
            })
            ->when($minArea, function ($query, $minArea) {
                $query->where('area', '>=', $minArea);
            })
            ->when($maxArea, function ($query, $maxArea) {
                $query->where('area', '<=', $maxArea);
            })
            ->when($minPrice, function ($query, $minPrice) {
                $query->where('price', '>=', $minPrice);
            })
            ->when($maxPrice, function ($query, $maxPrice) {
                $query->where('price', '<=', $maxPrice);
            })
            ->with(['location', 'owner_type', 'property_type'])
            ->orderBy('id', 'desc')
            ->simplePaginate(50);

        $properties = $properties->appends([
            'location_ids' => $locationIds,
            'owner_type_ids' => $ownerTypeIds,
            'property_type_ids' => $propertyTypeIds,
            'rent' => $rent,
            'documents' => $documents,
            'credit' => $credit,
            'repair' => $repair,
            'minArea' => $minArea,
            'maxArea' => $maxArea,
            'min_price' => $minPrice,
            'max_price' => $maxPrice,
        ]);

        $locations = Location::orderBy('name')
            ->get();
        $owner_types = OwnerType::orderBy('name')
            ->get();
        $property_types = PropertyType::orderBy('name')
            ->get();

        return view('property.index')
            ->with([
                'properties' => $properties,
                'locations' => $locations,
                'owner_types' => $owner_types,
                'property_types' => $property_types,
                'locationIds' => $locationIds,
                'ownerTypeIds' => $ownerTypeIds,
                'propertyTypeIds' => $propertyTypeIds,
                'rent' => $rent,
                'credit' => $credit,
                'documents' => $documents,
                'repair' => $repair,
                'minArea' => $minArea,
                'maxArea' => $maxArea,
                'minPrice' => $minPrice,
                'maxPrice' => $maxPrice,
            ]);
    }

    public function show($id)
    {
        $property = Property::where('id', $id)
            ->with(['location', 'property_type', 'owner_type'])
            ->firstOrFail();

        if (Cookie::has('property_views')) {
            $propertyIds = explode(',', Cookie::get('property_views'));
            if (!in_array($property->id, $propertyIds)) {
                $property->increment('viewed');
                $propertyIds[] = $property->id;
                Cookie::queue('property_views', implode(',', $propertyIds), 60 * 8);
            }
        } else {
            $property->increment('viewed');
            Cookie::queue('product_views', $property->id, 60 * 8);
        }

        return view('property.show')
            ->with([
                'product' => $property,
            ]);
    }
}
