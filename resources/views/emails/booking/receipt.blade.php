<x-mail::message>
# Thanks for your booking, {{ $booking->customer_name }}!

We’ve received your payment for **{{ $package->title }}**.

**Invoice:** {{ $booking->invoice_number }}  
**Total Paid:** {{ $booking->total_formatted }}  
**Status:** {{ ucfirst($booking->payment_status) }}  
@isset($booking->departure_date)
**Departure:** {{ $booking->departure_date->format('M d, Y') }}
@endisset

@component('mail::button', ['url' => route('checkout.invoice', $booking->id)])
Download Invoice (PDF)
@endcomponent

If you have questions, reply to this email.

Thanks,  
ORIGIN Travels
</x-mail::message>
