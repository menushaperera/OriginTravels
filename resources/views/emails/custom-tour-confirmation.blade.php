<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #1E3A8A 0%, #FF6B35 100%); color: white; padding: 30px; text-align: center; }
        .content { padding: 30px; background: #f9f9f9; }
        .details { background: white; padding: 20px; margin: 20px 0; border-radius: 8px; }
        .detail-row { padding: 10px 0; border-bottom: 1px solid #eee; }
        .detail-row:last-child { border-bottom: none; }
        .label { font-weight: bold; color: #1E3A8A; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank You for Your Custom Tour Request!</h1>
        </div>
        <div class="content">
            <p>Dear {{ $customTour->full_name }},</p>
            
            <p>We have received your custom tour request and our travel experts are already working on creating the perfect itinerary for you.</p>
            
            <div class="details">
                <h2>Your Request Details:</h2>
                <div class="detail-row">
                    <span class="label">Destination:</span> 
                    {{ $customTour->city }}, {{ $customTour->country }}
                </div>
                <div class="detail-row">
                    <span class="label">Travel Dates:</span> 
                    {{ optional($customTour->departure_date)->format('M d, Y') ?? 'Not specified' }} – 
                    {{ optional($customTour->return_date)->format('M d, Y') ?? 'Not specified' }}
                </div>
                <div class="detail-row">
                    <span class="label">Travelers:</span> 
                    {{ $customTour->adults }} Adults
                    @if($customTour->children && $customTour->children !== '0 children'), {{ $customTour->children }} @endif
                    @if($customTour->infants && $customTour->infants !== '0 infants'), {{ $customTour->infants }} @endif
                </div>
                <div class="detail-row">
                    <span class="label">Budget Range:</span> 
                    {{ $customTour->budget ? '$'.$customTour->budget.' per person' : 'Not specified' }}
                </div>
            </div>
            
            <p><strong>What happens next?</strong></p>
            <ul>
                <li>Our travel consultant will review your requirements</li>
                <li>We'll contact you within 24 hours with a personalized itinerary</li>
                <li>You can review and request any modifications</li>
                <li>Once finalized, we'll handle all the bookings for you</li>
            </ul>
            
            <p>If you have any immediate questions, please contact us at <a href="mailto:support@origintravels.com">support@origintravels.com</a> or call us at +94 77 123 4567.</p>
            
            <p>Best regards,<br>
            The ORIGIN Travels Team</p>
        </div>
    </div>
</body>
</html>
