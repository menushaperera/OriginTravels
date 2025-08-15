<?php

namespace App\Http\Controllers;

use App\Models\Package;

class PackagePublicController extends Controller
{
    public function show(Package $package)
    {
        // Fallbacks so your page never crashes if something is empty
        $hero = $package->image_url ?: 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=1920&h=1080&fit=crop';

        // If you later add columns like inclusions/exclusions/itinerary/gallery_urls,
        // this will still work (they’ll just be empty until you fill them).
        $inclusions = $this->splitLines($package->inclusions ?? '') ?: [
            'Airport transfers (round-trip)',
            'City highlights tour',
            'Entrance tickets to one attraction',
            'English-speaking guide',
            'Daily breakfast',
        ];

        $exclusions = $this->splitLines($package->exclusions ?? '') ?: [
            'International flights',
            'Travel insurance',
            'Personal expenses & tips',
            'Visa fees (if applicable)',
        ];

        // You can store “Day 1: …” each on a new line in a future textarea.
        $itineraryLines = $this->splitLines($package->itinerary ?? '');
        $itinerary = count($itineraryLines) ? $itineraryLines : [
            'Day 1: Arrival • Airport pickup • Hotel check-in • Evening free time',
            'Day 2: City highlights • Merlion Park • Marina Bay • Gardens by the Bay',
            'Day 3: Sentosa Island • Optional Universal Studios or S.E.A. Aquarium',
            'Day 4: Chinatown & Little India • Departure transfer',
        ];

        // Simple gallery: if you later add a comma-separated “gallery_urls” field,
        // these will replace the placeholders automatically.
        $gallery = $this->csvToArray($package->gallery_urls ?? '') ?: [
            'https://images.unsplash.com/photo-1525625293386-3f8f99389edd?w=1200',
            'https://images.unsplash.com/photo-1506351421178-63b52a2d2562?w=1200',
            'https://images.unsplash.com/photo-1555217851-6141535bd771?w=1200',
            'https://images.unsplash.com/photo-1600664356348-10686526af4f?w=1200',
            'https://images.unsplash.com/photo-1516815231560-8f41ec531527?w=1200',
        ];

        // Tags -> small chips on page (uses your existing tags cast)
        $tags = is_array($package->tags) ? $package->tags : [];

        return view('packages.show', compact(
            'package', 'hero', 'inclusions', 'exclusions', 'itinerary', 'gallery', 'tags'
        ));
    }

    private function splitLines(?string $text): array
    {
        $text = trim((string) $text);
        if ($text === '') return [];
        // Split by new lines, trim, remove empties
        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $text))));
    }

    private function csvToArray(?string $csv): array
    {
        $csv = trim((string) $csv);
        if ($csv === '') return [];
        return array_values(array_filter(array_map('trim', explode(',', $csv))));
    }
}
