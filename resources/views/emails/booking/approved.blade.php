{{-- resources/views/emails/booking/approved.blade.php --}}
<x-mail::message>
# Your booking is approved 🎉

Hi {{ $booking->customer_name }},

Great news — your booking **#{{ $booking->id }}** for **{{ $booking->package->title }}** has been approved by our team.

**Travel date:** {{ optional($booking->departure_date)->format('M d, Y') ?? 'TBD' }}  
**Travelers:** {{ $booking->travelers }}  
**Mode:** {{ $booking->pricing_mode === 'land_air' ? 'Land + Air' : 'Land only' }}  
**Total paid:** {{ $booking->total_formatted }}

@if($agent)
**Your assigned travel agent**

- **Name:** {{ $agent->name }}
- **Email:** {{ $agent->email }}
@if(!empty($agent->phone))
- **Phone:** {{ $agent->phone }}
@endif

They’ll reach out to you shortly with next steps.
@endif

<x-mail::button :url="$invoiceUrl">
Download your invoice (PDF)
</x-mail::button>

If the button doesn’t work, copy and paste this link:
{{ $invoiceUrl }}

Thanks for choosing {{ config('app.name') }}!  
We’re excited to help you explore the world.

— The {{ config('app.name') }} Team
</x-mail::message>
