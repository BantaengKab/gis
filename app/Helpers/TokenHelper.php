<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use App\Models\TokenApi;

class TokenHelper
{
    public static function getToken()
    {
        // Cek apakah token tersimpan di database
        $token = TokenApi::pluck('token')->first();

        if ($token) {
            return $token;
        }

       $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->post('https://splp.layanan.go.id/oauth2/token', [
            'client_id' => 'zxoPNxYWkLVuWRzynxkW799BnGoa',
            'client_secret' => 'fh6OdJ7O_atJ6fz5S0LsO_6xLR4a',
            'grant_type' => 'client_credentials',
        ]);
        if ($response->successful()) {
            // Request was successful, handle the response
            $responseData = $response->json();
            // Process the response data
        } else {
            // Request failed, handle the error
            $errorCode = $response->status();
            $errorMessage = $response->body();
            // Handle the error accordingly
        }
        $token = // Logika untuk mengambil token dari API

        // Simpan token di database
        TokenApi::create(['token' => $token]);

        return $token;
    }

    public static function isTokenExpired()
    {
        $expiryTime = TokenApi::pluck('expiry_time')->first();

        if ($expiryTime) {
            return time() > $expiryTime;
        }

        // Jika tidak ada informasi expiry di database, token dianggap sudah kedaluwarsa
        return true;
    }
}
