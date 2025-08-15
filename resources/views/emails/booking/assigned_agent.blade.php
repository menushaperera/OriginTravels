@php($pkg = $booking->package)
<x-mail::message>
# New Booking Assigned

Hello {{ $booking->agent?->name ?? 'Agent' }},

A new booking has been assigned to you.

**Booking #{{ $booking->id }}**  
**Customer:** {{ $booking->customer_name }} ({{ $booking->customer_email }})  
**Package:** {{ $pkg->title }}  
**Departure:** {{ optional($booking->departure_date)->format('M d, Y') ?? 'TBD' }}  
**Travelers:** {{ $booking->travelers }}  
**Total:** {{ $booking->total_formatted }}

Please contact the customer as soon as possible.

Thanks,  
ORIGIN Travels
</x-mail::message>
