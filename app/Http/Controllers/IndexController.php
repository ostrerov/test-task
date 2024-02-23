<?php

namespace App\Http\Controllers;

use App\Http\Data\AccountsData;
use App\Http\Data\DealsData;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Support\Facades\Config;
use Winter\LaravelConfigWriter\ArrayFile;
use Winter\LaravelConfigWriter\Exceptions\ConfigWriterException;

use function Pest\Laravel\get;

class IndexController extends Controller
{
    private Client $query;

    private string $zohoAccessTokenPath;

    private string $accessToken;

    /**
     * @throws ConfigWriterException
     */
    public function __construct()
    {
        $this->query = new Client([
            'base_uri' => 'https://www.zohoapis.eu/crm/v6/',
            'timeout' => 2.0
        ]);

        $this->zohoAccessTokenPath = storage_path('app/service/main/zoho_access_token.txt');
        if (File::exists($this->zohoAccessTokenPath)) {
            $this->accessToken = File::get($this->zohoAccessTokenPath);
        }
    }

    public function index()
    {
        return Inertia::render('Index');
    }

    /**
     * @throws GuzzleException
     */
    public function storeAccounts(AccountsData $accountsData): bool
    {
        try {
            $this->query->request('POST', 'Accounts', [
                'verify' => false,
                'headers' => [
                    'Authorization' => 'Zoho-oauthtoken ' . $this->accessToken,
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode([
                    'data' => [
                        [
                            'Account_Name' => $accountsData->name,
                            'Phone' => $accountsData->phone,
                            'Website' => $accountsData->website
                        ]
                    ]
                ])
            ]);
        } catch (ClientException $exception) {
            if ($exception->getCode() === 401) {
                $this->getNewToken();
                $this->storeAccounts($accountsData);
            }
        } catch (GuzzleException $exception) {
            dd($exception);
        }

        return false;
    }

    public function storeDeals(DealsData $dealsData): bool
    {
        try {
            $this->query->request('POST', 'Deals', [
                'verify' => false,
                'headers' => [
                    'Authorization' => 'Zoho-oauthtoken ' . $this->accessToken,
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode([
                    'data' => [
                        [
                            'Deal_Name' => $dealsData->name,
                            'Stage' => $dealsData->stage,
                            'Account_Name' => $dealsData->accountName,
                            'Closing_Date' => date('Y-m-d', strtotime($dealsData->closingDate)),
                        ]
                    ]
                ])
            ]);
        } catch (ClientException $exception) {
            if ($exception->getCode() === 401) {
                $this->getNewToken();
                $this->storeDeals($dealsData);
            } else {
                dd($exception);
            }
        } catch (GuzzleException $exception) {
            dd($exception);
        }

        return false;
    }

    public function getAccounts()
    {
        try {
            $response = $this->query->request('GET', 'Accounts?fields=Account_Name', [
                'verify' => false,
                'headers' => [
                    'Authorization' => 'Zoho-oauthtoken ' . $this->accessToken,
                    'Content-Type' => 'application/json'
                ],
            ]);

            return $response->getBody()->getContents();
        } catch (ClientException $exception) {
            if ($exception->getCode() === 401) {
                $this->getNewToken();
                $this->getAccounts();
            }
        } catch (GuzzleException $exception) {
            dd($exception);
        }

        return false;
    }

    public function getDeals(): object|bool
    {
        try {
            $response = $this->query->request('GET', 'Deals?fields=Stage', [
                'verify' => false,
                'headers' => [
                    'Authorization' => 'Zoho-oauthtoken ' . $this->accessToken,
                    'Content-Type' => 'application/json'
                ],
            ]);

            return json_decode($response->getBody()->getContents());
        } catch (ClientException $exception) {
            if ($exception->getCode() === 401) {
                $this->getNewToken();
                $this->getDeals();
            }
        } catch (GuzzleException $exception) {
            dd($exception);
        }

        return false;
    }

    private function getNewToken(): void
    {
        $refreshToken = config('app.zoho_refresh_token');
        $clientID = config('app.zoho_client_id');
        $clientSecret = config('app.zoho_client_secret');

        try {
            $response = $this->query->request('POST', 'https://accounts.zoho.eu/oauth/v2/token?refresh_token=' . $refreshToken . '&client_id=' . $clientID . '&client_secret=' . $clientSecret . '&grant_type=refresh_token', [
                'verify' => false,
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            $directory = 'service/main';

            if (!File::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            File::put($this->zohoAccessTokenPath, $data['access_token']);
        } catch (ClientException $exception) {
            dd($exception);
        } catch (GuzzleException $exception) {
            dd($exception);
        }
    }
}
