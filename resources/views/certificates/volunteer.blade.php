<!DOCTYPE html>
<html>
<head>
    <title>Attestation de Bénévolat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            line-height: 1.6;
        }
        .certificate {
            border: 2px solid #4a5568;
            padding: 30px;
            position: relative;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }
        .content {
            padding: 30px 20px;
            text-align: center;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
        h1 {
            color: #2d3748;
            font-size: 24px;
        }
        .stamp {
            position: absolute;
            bottom: 50px;
            left: 50px;
            opacity: 0.5;
            transform: rotate(-15deg);
            font-size: 28px;
            color: #4299e1;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="header">
            <h1>ATTESTATION DE BÉNÉVOLAT</h1>
        </div>
        <div class="content">
            <p>Nous attestons que <strong>{{ $userName }}</strong> a participé avec succès comme bénévole à l'opportunité <strong>{{ $opportunityTitle }}</strong>.</p>
            <p>{{ $userName }} a contribué <strong>{{ $hoursServed }} heures</strong> de service volontaire, complété le {{ \Carbon\Carbon::parse($completedAt)->format('d/m/Y') }}.</p>
            <p>Cette attestation est délivrée pour servir et valoir ce que de droit.</p>
        </div>
        <div class="signature">
            <p>Pour {{ $organizationName }}</p>
            <br>
            <p>_______________________</p>
            <p>Signature autorisée</p>
        </div>
        <div class="stamp">CERTIFIÉ</div>
    </div>
</body>
</html>