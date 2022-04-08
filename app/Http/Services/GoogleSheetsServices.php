<?php

namespace App\Http\Services;

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

Class GoogleSheetsServices {

    public $client, $service, $documentID;

    public function __construct() {
        $this->client = $this->getClient();
        $this->service = new Sheets($this->client);
        $this->documentID = '1yX1XyUR7AZSle9UxA-s3eEdWxJZAJoiQ_SXxsdKXdQE';
        $this->range = 'A:Z';
    }

    public function getClient() {
        $client = new Client();
        $client->setApplicationName('Google Sheets API PHP Quickstart');
        $client->setRedirectUri('http://127.0.0.1:8000/');
        $client->setScopes(Sheets::SPREADSHEETS);
        $client->setAuthConfig('credentials.json');
        $client->setAccessType('offline');
        return $client;
    }

    public function readSheet() {
        $doc = $this->service->spreadsheets_values->get($this->documentID, $this->range);
        return $doc;
    }

}

?>