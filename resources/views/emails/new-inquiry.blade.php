<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'Inter', Helvetica, Arial, sans-serif; background-color: #f8fafc; color: #0f172a; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0; }
        .header { background-color: #0f172a; padding: 40px; text-align: center; }
        .header h1 { color: #f8fafc; margin: 0; font-size: 24px; font-weight: 800; letter-spacing: -0.025em; }
        .content { padding: 40px; }
        .section { margin-bottom: 24px; }
        .label { font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: #64748b; margin-bottom: 4px; }
        .value { font-size: 16px; font-weight: 600; color: #0f172a; }
        .message-box { background-color: #f1f5f9; padding: 24px; border-radius: 12px; font-size: 14px; line-height: 1.6; color: #334155; border: 1px solid #e2e8f0; }
        .footer { padding: 24px; text-align: center; font-size: 12px; color: #94a3b8; border-top: 1px solid #f1f5f9; }
        .btn { display: inline-block; padding: 12px 24px; background-color: #0f172a; color: #ffffff; text-decoration: none; border-radius: 8px; font-weight: 700; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Lead Captured</h1>
        </div>
        <div class="content">
            <div class="section">
                <div class="label">Full Name</div>
                <div class="value">{{ $inquiry->name }}</div>
            </div>
            <div class="section">
                <div class="label">Email Address</div>
                <div class="value">{{ $inquiry->email }}</div>
            </div>
            @if($inquiry->company)
            <div class="section">
                <div class="label">Company</div>
                <div class="value">{{ $inquiry->company }}</div>
            </div>
            @endif
            <div class="section">
                <div class="label">Inquiry Subject</div>
                <div class="value">{{ $inquiry->subject }}</div>
            </div>
            <div class="section">
                <div class="label">Project Details</div>
                <div class="message-box">
                    {{ $inquiry->message }}
                </div>
            </div>
            <div style="text-align: center;">
                <a href="{{ url('/admin/inquiries') }}" class="btn">View in Dashboard</a>
            </div>
        </div>
        <div class="footer">
            ProgrammersIn Reality Lab &bull; Velocity First Engineering
        </div>
    </div>
</body>
</html>
