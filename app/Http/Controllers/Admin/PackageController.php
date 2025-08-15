<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PackageController extends Controller
{
    /**
     * GET /admin/packages
     */
    public function index(Request $request)
    {
        $destinations = Destination::select('id', 'name')->orderBy('name')->get();

        $query = Package::query();

        // Filters
        if ($search = trim((string) $request->get('search'))) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%");
            });
        }

        if (($destId = $request->get('destination_id')) && $destId !== 'all') {
            $query->where('destination_id', $destId);
        }

        if (($status = $request->get('status')) && $status !== 'all') {
            $query->where('status', $status);
        }

        $packages = $query
            ->orderBy('display_order')
            ->orderByDesc('is_bestseller')
            ->orderByDesc('is_featured')
            ->paginate(12)
            ->withQueryString();

        return view('admin.packages.index', compact('packages', 'destinations'));
    }

    /**
     * GET /admin/packages/create
     */
    public function create()
    {
        $destinations = Destination::select('id', 'name')->orderBy('name')->get();
        return view('admin.packages.create', compact('destinations'));
    }

    /**
     * POST /admin/packages
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);

        // Normalize booleans & tags
        $data['is_bestseller'] = $request->boolean('is_bestseller');
        $data['is_featured']   = $request->boolean('is_featured');
        $data['tags']          = $this->normaliseTags($request->input('tags'));

        Package::create($data);

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package created successfully.');
    }

    /**
     * GET /admin/packages/{package}/edit
     */
    public function edit(Package $package)
    {
        $destinations = Destination::select('id', 'name')->orderBy('name')->get();
        return view('admin.packages.edit', compact('package', 'destinations'));
    }

    /**
     * PUT /admin/packages/{package}
     */
    public function update(Request $request, Package $package)
    {
        $data = $this->validateData($request);

        $data['is_bestseller'] = $request->boolean('is_bestseller');
        $data['is_featured']   = $request->boolean('is_featured');
        $data['tags']          = $this->normaliseTags($request->input('tags'));

        $package->update($data);

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package updated successfully.');
    }

    /**
     * DELETE /admin/packages/{package}
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return back()->with('success', 'Package deleted.');
    }

    /**
     * Shared validation rules.
     */
    protected function validateData(Request $request): array
    {
        return $request->validate([
            'title'          => ['required', 'string', 'max:255'],
            'country'        => ['nullable', 'string', 'max:100'],
            'location'       => ['nullable', 'string', 'max:255'],
            'subtitle'       => ['nullable', 'string', 'max:255'],
            'description'    => ['nullable', 'string'],
            'duration'       => ['nullable', 'string', 'max:50'],
            'price'          => ['nullable', 'numeric'],
            'price_unit'     => ['nullable', 'string', 'max:50'],
            'status'         => ['required', Rule::in(['active', 'inactive', 'draft'])],
            'destination_id' => ['nullable', 'integer', 'exists:destinations,id'],
            'display_order'  => ['nullable', 'integer', 'min:0'],
            'is_bestseller'  => ['sometimes', 'boolean'],
            'is_featured'    => ['sometimes', 'boolean'],
            'image_url'      => ['nullable', 'url'],
            'rating'         => ['nullable', 'numeric', 'min:0', 'max:5'],
            'total_reviews'  => ['nullable', 'integer', 'min:0'],
            // Accept CSV or JSON for tags (we normalize below)
            'tags'           => ['nullable'],
            'inclusions'     => ['nullable','string'],   // one item per line
            'exclusions'     => ['nullable','string'],   // one item per line
            'itinerary'      => ['nullable','string'],   // one day per line
            'gallery_urls'   => ['nullable','string'],   // comma-separated URLs
        ]);
    }

    /**
     * Ensure tags are stored consistently.
     * - If your Package model has: protected $casts = ['tags' => 'array'];
     *   return an array here (JSON column).
     * - If you store CSV in a text column, return a CSV string instead.
     */
    protected function normaliseTags($raw)
    {
        if (is_array($raw)) {
            // Multi-select -> normalize array
            return array_values(array_filter(array_map('trim', $raw)));
        }

        if (is_string($raw)) {
            // CSV string -> array (for JSON-cast). If you store CSV, use implode below instead.
            $arr = array_values(array_filter(array_map('trim', explode(',', $raw))));
            return $arr; // or: return implode(',', $arr);
        }

        return [];
    }
}
