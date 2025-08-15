@php
    $pkg = $booking->package;
    $totalCents = (int) ($booking->total_amount_cents ?? 0);
    $total = $totalCents / 100;
    $qty = max(1, (int) ($booking->travelers ?? 1));
    $unit = $qty ? $total / $qty : $total;

    $brand = strtoupper($booking->payment_method_brand ?? 'CARD');
    $last4 = $booking->payment_method_last4 ?? null;
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $booking->invoice_number ?? ('INV-'.$booking->id) }} - ORIGIN Travels</title>
    <style>
        /* dompdf-friendly CSS (avoid flex/positioned layers/JS/fonts) */
        @page { size: A4; margin: 18mm 16mm; }
        body { font-family: DejaVu Sans, Arial, Helvetica, sans-serif; font-size: 12px; color: #374151; }
        h1,h2,h3 { margin: 0 0 6px 0; color:#111827; }
        .muted { color:#6B7280; }
        .mb-2{ margin-bottom:8px; } .mb-3{ margin-bottom:12px; } .mb-4{ margin-bottom:16px; } .mb-6{ margin-bottom:24px; }
        .text-right{ text-align:right; }
        .badge { display:inline-block; padding:4px 10px; border-radius:14px; font-size:11px; font-weight:bold; color:#fff; }
        .paid { background:#10B981; } .pending { background:#FF6B35; }

        table { width:100%; border-collapse: collapse; }
        th, td { padding: 8px; vertical-align: top; }

        .head-table td { padding:0; }
        .head-title { font-size: 28px; font-weight: 700; color: #FF6B35; }
        .inv-no { font-size: 12px; color:#374151; }
        .inv-date { font-size: 12px; color:#6B7280; }

        .box { border:1px solid #E5E7EB; border-radius:6px; padding:10px; }
        .box-title { font-size:10px; text-transform:uppercase; color:#6B7280; font-weight:bold; margin-bottom:6px; }
        .name { font-size: 15px; font-weight: 700; color:#1E3A8A; }

        .items thead th { background:#1E3A8A; color:#fff; font-size:11px; text-transform:uppercase; letter-spacing:.3px; }
        .items tbody td { border-bottom:1px solid #F3F4F6; }
        .amount { font-weight:bold; color:#1E3A8A; }
        .item-desc { font-size:10px; color:#6B7280; margin-top:2px; }

        .totals { width: 300px; margin-left:auto; }
        .totals td { padding:6px 8px; }
        .totals .label { color:#6B7280; }
        .totals .grand td { border-top:2px solid #1E3A8A; font-weight:bold; }
        .totals .grand .val { font-size:16px; color:#FF6B35; }

        .footer { margin-top: 22px; text-align:center; font-size:10px; color:#6B7280; }
        .footer strong { color:#1E3A8A; }
    </style>
</head>
<body>

    {{-- HEADER --}}
    <table class="head-table mb-6">
        <tr>
            <td style="width:60%;">
                <table>
                    <tr>
                        <td style="width:70px;">
                            @php
                                $logoDataUri = null;
                                $logoPath = public_path('logo/logo.png'); // E:\LaravelProject\OriginTravels\public\logo\logo.png
                                if (is_file($logoPath)) {
                                    $mime = 'image/png';
                                    $logoDataUri = 'data:'.$mime.';base64,'.base64_encode(file_get_contents($logoPath));
                                }
                            @endphp
                        </td>
                        <td>
                            <div style="font-size:20px; font-weight:700; color:#1E3A8A;">ORIGIN Travels</div>
                            <div class="muted" style="font-size:11px;">Your Gateway to Extraordinary Adventures</div>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="text-right" style="width:40%;">
                <div class="head-title">INVOICE</div>
                <div class="inv-no mb-2">#{{ $booking->invoice_number ?? ('INV-'.now()->format('Ymd').'-'.str_pad((string)$booking->id, 4, '0', STR_PAD_LEFT)) }}</div>
                <div class="inv-date">Date: {{ now()->format('F d, Y') }}</div>
                <div class="mb-2"></div>
                @php $paid = ($booking->payment_status === 'succeeded'); @endphp
                <span class="badge {{ $paid ? 'paid' : 'pending' }}">{{ $paid ? 'PAID' : 'PENDING' }}</span>
            </td>
        </tr>
    </table>

    {{-- BILLING / PACKAGE --}}
    <table class="mb-6">
        <tr>
            <td style="width:49%;">
                <div class="box">
                    <div class="box-title">Bill To</div>
                    <div class="name mb-2">{{ $booking->customer_name }}</div>
                    <div class="muted">{{ $booking->customer_email }}</div>
                    @if($booking->customer_phone)
                        <div class="muted">{{ $booking->customer_phone }}</div>
                    @endif
                    @if(!empty($booking->customer_address))
                        <div class="muted">{{ $booking->customer_address }}</div>
                    @endif
                </div>
            </td>
            <td style="width:2%;"></td>
            <td style="width:49%;">
                <div class="box">
                    <div class="box-title">Package Details</div>
                    <div class="name mb-2">{{ $pkg->title ?? 'Travel Package' }}</div>
                    <div class="muted">
                        Location: {{ $pkg->location ?? $pkg->country ?? '—' }}<br>
                        Duration: {{ $pkg->duration ?? 'TBD' }}<br>
                        @if($booking->departure_date)
                            Departure: {{ $booking->departure_date->format('F d, Y') }}
                        @endif
                    </div>
                </div>
            </td>
        </tr>
    </table>

    {{-- LINE ITEMS --}}
    <table class="items mb-6">
        <thead>
            <tr>
                <th style="text-align:left; width:45%;">Description</th>
                <th style="text-align:right; width:15%;">Qty</th>
                <th style="text-align:right; width:20%;">Unit Price</th>
                <th style="text-align:right; width:20%;">Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div style="font-weight:600; color:#374151;">{{ $pkg->title ?? 'Travel Package' }}</div>
                    <div class="item-desc">Mode: {{ $booking->pricing_mode === 'land_air' ? 'Land + Air' : 'Land Only' }}</div>
                </td>
                <td class="text-right">{{ $qty }}</td>
                <td class="text-right amount">${{ number_format($unit, 2) }}</td>
                <td class="text-right amount">${{ number_format($total, 2) }}</td>
            </tr>
        </tbody>
    </table>

    {{-- TOTALS --}}
    <table class="totals">
        <tr>
            <td class="label" style="text-align:right; width:60%;">Subtotal</td>
            <td class="val" style="text-align:right; width:40%;">${{ number_format($total, 2) }}</td>
        </tr>
        <tr>
            <td class="label" style="text-align:right;">Tax (0%)</td>
            <td class="val" style="text-align:right;">$0.00</td>
        </tr>
        <tr class="grand">
            <td class="label" style="text-align:right;">Total</td>
            <td class="val text-right">{{ $booking->total_formatted }}</td>
        </tr>
    </table>

    {{-- PAYMENT SUMMARY --}}
    <div class="box mb-6" style="margin-top:18px;">
        <table>
            <tr>
                <td style="width:33%;">
                    <div class="box-title">Payment Method</div>
                    <div><strong>{{ $brand }}</strong>{{ $last4 ? ' •••• '.$last4 : '' }}</div>
                </td>
                <td style="width:33%;">
                    <div class="box-title">Transaction ID</div>
                    <div>{{ $booking->payment_intent_id }}</div>
                </td>
                <td style="width:34%;">
                    <div class="box-title">Payment Date</div>
                    <div>{{ optional($booking->paid_at)->format('M d, Y • h:i A') ?? 'Pending' }}</div>
                </td>
            </tr>
        </table>
    </div>

    {{-- FOOTER --}}
    <div class="footer">
        <div><strong>Thank you for choosing ORIGIN Travels!</strong></div>
        <div>ORIGIN Travels • 123 Travel Street, Adventure City AC 12345 • support@origintravels.com • +1 (555) 123-4567</div>
        <div style="margin-top:6px;">This is a computer-generated invoice. © {{ date('Y') }} ORIGIN Travels</div>
    </div>

</body>
</html>
