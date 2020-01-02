<?php
    function getAllNotes($username, $password, $eiId) {
        //Part 1 - Login into eschool
        $url = "https://app.eschool.center/ec-server/login";
        $ch = curl_init($url);
        $data = array(
            'username' => $username,
            'password' => $password
        );
        $postString = http_build_query($data, '', '&');
        $tmpDir = getcwd() . '\\tmp\\';

		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIESESSION, true);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $tmpDir . 'cookiejar.txt');
		curl_setopt($ch, CURLOPT_COOKIEFILE, $tmpDir . 'cookiefile.txt');

        curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        if ($status == 401) {
            return "401";
        }

        //Part 2 - Getting userId
        $url = "https://app.eschool.center/ec-server/state";

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, false);

        $response = json_decode(curl_exec($ch), true);
        $userId = $response['userId'];
        
        //Part 3 - Getting all notes
        $url = 	"https://app.eschool.center/ec-server/student/getDiaryPeriod/?userId=$userId&eiId=$eiId";

        curl_setopt($ch, CURLOPT_URL, $url);

        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }
?>