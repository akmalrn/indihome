<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LogVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $ipAddress = $request->ip();
        $timezone = 'Asia/Jakarta';
        $visitedAt = now()->setTimezone($timezone);

        $response = Http::get("http://ip-api.com/json/{$ipAddress}");
        $data = $response->json();

        Log::info('IP API Response', $data);

        $country = isset($data['status']) && $data['status'] === 'success'
        ? "{$data['city']}, {$data['regionName']}"
        : 'Unknown Location';

        Visit::create([
            'ip_address' => $ipAddress,
            'country' => $country,
            'visited_at' => $visitedAt,
        ]);

        return $next($request);
    }

}
