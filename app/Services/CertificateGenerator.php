<?php

namespace App\Services;

use App\Models\Application;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateGenerator
{
    public function generateCertificate(Application $application)
    {
        $data = [
            'userName' => $application->user->name,
            'opportunityTitle' => $application->opportunity->title,
            'hoursServed' => $application->hours_served,
            'completedAt' => $application->completed_at,
            'organizationName' => $application->opportunity->organization->name ?? 'Organization',
        ];

        $pdf = PDF::loadView('certificates.volunteer', $data);
        return $pdf->output();
    }
}