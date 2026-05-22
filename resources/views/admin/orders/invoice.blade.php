<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $order->order_code }}</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; padding: 40px; background: #f8fafc; color: #1e293b; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 40px; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; padding-bottom: 20px; border-bottom: 2px solid #e2e8f0; }
        .logo { display: flex; align-items: center; gap: 12px; }
        .logo-icon { width: 48px; height: 48px; background: linear-gradient(135deg, #3b82f6, #1d4ed8); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; }
        .invoice-title { text-align: right; }
        .invoice-title h1 { margin: 0; color: #1e40af; font-size: 28px; }
        .status { display: inline-block; padding: 6px 16px; border-radius: 20px; font-size: 12px; font-weight: 600; text-transform: uppercase; }
        .status-paid { background: #dcfce7; color: #166534; }
        .status-pending { background: #fef3c7; color: #92400e; }
        .details { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 40px; }
        .detail-group h3 { margin: 0 0 12px 0; font-size: 14px; text-transform: uppercase; color: #64748b; letter-spacing: 0.05em; }
        .detail-group p { margin: 4px 0; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 40px; }
        th { background: #f1f5f9; text-align: left; padding: 12px; font-size: 12px; text-transform: uppercase; color: #64748b; }
        td { padding: 16px 12px; border-bottom: 1px solid #e2e8f0; font-size: 14px; }
        .total { display: flex; justify-content: flex-end; margin-top: 20px; }
        .total-box { background: #eff6ff; padding: 20px 32px; border-radius: 12px; text-align: right; }
        .total-label { font-size: 14px; color: #64748b; margin-bottom: 4px; }
        .total-amount { font-size: 24px; font-weight: 700; color: #1d4ed8; }
        .footer { margin-top: 40px; text-align: center; font-size: 12px; color: #94a3b8; }
        .qr { text-align: center; margin-top: 30px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <div class="logo-icon">BL</div>
                <div>
                    <h2 style="margin:0; font-size: 20px;">Blue Laundry</h2>
                    <p style="margin:0; font-size: 12px; color: #64748b;">Jl. Sudirman No. 1, Jakarta</p>
                </div>
            </div>
            <div class="invoice-title">
                <h1>INVOICE</h1>
                <p style="margin: 8px 0 0 0; font-size: 14px; color: #64748b;">{{ $order->order_code }}</p>
                <span class="status status-{{ $order->payment_status }}">{{ strtoupper($order->payment_status) }}</span>
            </div>
        </div>

        <div class="details">
            <div class="detail-group">
                <h3>Ditagihkan Kepada</h3>
                <p><strong>{{ $order->user->name }}</strong></p>
                <p>{{ $order->user->email }}</p>
                <p>{{ $order->user->phone ?? '-' }}</p>
                <p>{{ $order->delivery_address }}</p>
            </div>
            <div class="detail-group">
                <h3>Detail Order</h3>
                <p><strong>Tanggal:</strong> {{ $order->created_at->format('d F Y') }}</p>
                <p><strong>Jatuh Tempo:</strong> {{ $order->created_at->addDays(1)->format('d F Y') }}</p>
                <p><strong>Metode:</strong> {{ $order->payment->payment_method ?? 'Transfer' }}</p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Layanan</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong>{{ $order->service->name }}</strong><br>
                        <span style="color: #64748b; font-size: 12px;">{{ $order->service->description }}</span>
                    </td>
                    <td>{{ $order->weight }} kg</td>
                    <td>Rp {{ number_format($order->service->price_per_kg) }}/kg</td>
                    <td style="text-align: right;"><strong>Rp {{ number_format($order->total_price) }}</strong></td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            <div class="total-box">
                <div class="total-label">Total Pembayaran</div>
                <div class="total-amount">Rp {{ number_format($order->total_price) }}</div>
            </div>
        </div>

        <div class="qr">
            {!! QrCode::size(120)->generate(route('tracking.search') . '?order_code=' . $order->order_code) !!}
            <p style="font-size: 12px; color: #64748b; margin-top: 8px;">Scan untuk tracking</p>
        </div>

        <div class="footer">
            <p>Terima kasih telah menggunakan layanan Blue Laundry</p>
            <p>Untuk bantuan hubungi: 0812-3456-7890 | halo@blue-laundry.id</p>
        </div>
    </div>
</body>
</html>
