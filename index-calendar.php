<?php
	require_once __DIR__ . '/vendor/autoload.php';

    function getClient() {
        $client = new Google_Client();
        //$client->setApplicationName('Gcalendar');
        $client->setClientId('446088162951-e4jpcfohkh9ivjm3c7sjnch568t60bmk.apps.googleusercontent.com');
        $client->setClientSecret('Fo08_ibJRI6RnNqn_7R_F1ZS');
        $client->setScopes(implode(' ', array(
                Google_Service_Calendar::CALENDAR_READONLY)
        ));
        $client->setAuthConfig(__DIR__ . '/client_secret_446088162951-e4jpcfohkh9ivjm3c7sjnch568t60bmk.apps.googleusercontent.com.json');
        $client->setAccessType('offline');

            // Load previously authorized credentials from a file.
            $credentialsPath = expandHomeDirectory('~/.credentials/calendar-php-quickstart.json');
            /*if (file_exists($credentialsPath)) {
                //die("Have File credentialsPath");
                $accessToken = json_decode(file_get_contents($credentialsPath), true);
                //echo "Have File credentialsPath<br />";
            } else {*/
                if(isset($_GET['code'])){
                    $authCode = $_GET['code'];
                    // Exchange authorization code for an access token.
                    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

                    // Store the credentials to disk.
                    /*if(!file_exists(dirname($credentialsPath))) {
                        mkdir(dirname($credentialsPath), 0700, true);
                    }*/
                    file_put_contents($credentialsPath, json_encode($accessToken));
                    //printf("Credentials saved to %s\n", $credentialsPath);
                }else{
                    $authUrl = $client->createAuthUrl();

                    die('<a href="'.$authUrl.'">Click</a>');
                }
            //}

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
        echo "No upcoming events found.<br />";
    } else {
        echo "Upcoming events:<br />";
        foreach ($results->getItems() as $event) {
            $start = $event->start->dateTime;
            if (empty($start)) {
                $start = $event->start->date;
            }
            printf("%s (%s)\n", $event->getSummary(), $start);
        }
    }

    $listCalendar = $service->calendarList->listCalendarList();

    if (count($listCalendar->getItems()) == 0) {
        echo "No upcoming list calendar found.<br />";
    } else {
        echo "Upcoming list calendar :<br />";
        foreach ($listCalendar->getItems() as $calendar) {
            echo $calendar->getSummary()."<br />";
        }
    }


?>