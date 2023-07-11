<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use App\Models\TokenApi;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;

class TokenHelper
{
    public static function getToken()
    {
        // Cek apakah token tersimpan di database
        $token = TokenApi::pluck('token')->first();

        if ($token) {
            return $token;
        }

        $client = new Client();

        try {
            $response = $client->request('POST', 'https://splp.layanan.go.id/oauth2/token', [
                RequestOptions::FORM_PARAMS => [
                    'client_id' => 'zxoPNxYWkLVuWRzynxkW799BnGoa',
                    'client_secret' => 'fh6OdJ7O_atJ6fz5S0LsO_6xLR4a',
                    'grant_type' => 'client_credentials',
                ],
                RequestOptions::HEADERS => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Cookie' => 'INGRESSCOOKIE=1688906562.328.10847.921469|535ad0017083e3dc73b7f3bf259b869e',
                ],
            ]);

            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);

            if ($statusCode >= 200 && $statusCode < 300) {
                // Permintaan berhasil (kode status 2xx)
                // Lakukan sesuatu dengan isi respons
                TokenApi::create([
                    'token' => $responseData['access_token'],
                    'expires_in' => $responseData['expires_in'],
                ]);

                return $responseData['access_token'];
            } else {
                // Permintaan gagal (kode status selain 2xx)
                // Lakukan penanganan kesalahan yang sesuai
                logger("Permintaan gagal dengan kode status: " . $statusCode);
            }
        } catch (RequestException $e) {
            // Terjadi kesalahan saat melakukan permintaan
            // Lakukan penanganan kesalahan yang sesuai
            logger("Terjadi kesalahan saat melakukan permintaan: " . $e->getMessage());
        }


    }

    public static function isTokenExpired()
    {
        $expiryTime = TokenApi::pluck('expires_in')->first();

        if ($expiryTime) {
            return time() > $expiryTime;
        }

        // Jika tidak ada informasi expiry di database, token dianggap sudah kedaluwarsa
        return true;
    }
}