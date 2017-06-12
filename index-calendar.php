<?php
	require_once __DIR__ . '/vendor/autoload.php';

    function getClient() {
        $client = new Google_Client();
        $client->setApplicationName('Gcalendar');
        $client->setScopes(implode(' ', array(
                Google_Service_Calendar::CALENDAR_READONLY)
        ));
        $client->setAuthConfig(__DIR__ . '/client_secret_446088162951-e4jpcfohkh9ivjm3c7sjnch568t60bmk.apps.googleusercontent.com.json');
        $client->setAccessType('offline');

        // Load previously authorized credentials from a file.
        $credentialsPath = expandHomeDirectory('~/.credentials/calendar-php-quickstart.json');
        if (file_exists($credentialsPath)) {
            $accessToken = json_decode(file_get_contents($credentialsPath), true);
        } else {

            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            die("authUrl : ".$authUrl);

            $authCode = trim(fgets(fopen('php://stdin', 'r')));
            // Exchange authorization code for an access token.
            die("authCode : ".print_r($authCode,true));
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            die("TEST");

            // Store the credentials to disk.
            if(!file_exists(dirname($credentialsPath))) {
                mkdir(dirname($credentialsPath), 0700, true);
            }
            file_put_contents($credentialsPath, json_encode($accessToken));
            printf("Credentials saved to %s\n", $credentialsPath);
        }
        $client->setAccessToken($accessToken);

        // Refresh the token if it's expired.
        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
        }
        return $client;
    }

    /**
     * Expands the home directory alias '~' to the full path.
     * @param string $path the path to expand.
     * @return string the expanded path.
     */
    function expandHomeDirectory($path) {
        $homeDirectory = getenv('HOME');
        if (empty($homeDirectory)) {
            $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
        }
        return str_replace('~', realpath($homeDirectory), $path);
    }

    // Get the API client and construct the service object.
    $client = getClient();
    $service = new Google_Service_Calendar($client);

    // Print the next 10 events on the user's calendar.
    $calendarId = 'primary';
    $optParams = array(
        'maxResults' => 10,
        'orderBy' => 'startTime',
        'singleEvents' => TRUE,
        'timeMin' => date('c'),
    );
    $results = $service->events->listEvents($calendarId, $optParams);

    if (count($results->getItems()) == 0) {
        print "No upcoming events found.\n";
    } else {
        print "Upcoming events:\n";
        foreach ($results->getItems() as $event) {
            $start = $event->start->dateTime;
            if (empty($start)) {
                $start = $event->start->date;
            }
            printf("%s (%s)\n", $event->getSummary(), $start);
        }
    }

?>