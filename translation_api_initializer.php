<?php

class TranslationApiInitializer {

    private $clientID;
    private $clientSecret;
    private $authUrl;
    private $grantType;
    private $scopeUrl;

    public function __construct() {
        $this->clientID = "Client ID";

        $this->clientSecret = "Client Secret";
        //OAuth Url.
        $this->authUrl = "https://datamarket.accesscontrol.windows.net/v2/OAuth2-13/";
        //Application Scope Url
        $this->scopeUrl = "http://api.microsofttranslator.com";
        //Application grant type
        $this->grantType = "client_credentials";
    }

    /*
     * Get the translated text
     * 
     * @param   string $text        Text content for translation
     * @param   string $from_lang   Language of the text
     * @param   string $to_lang     Translation language
     * @return  array               Result set
     */

    public function textTranslate($text, $from_lang, $to_lang) {


        try {
            //Get the Access token.
            $accessToken = $this->getTokens($this->grantType, $this->scopeUrl, $this->clientID, $this->clientSecret, $this->authUrl);

            //Create the authorization Header string.
            $authHeader = "Authorization: Bearer " . $accessToken;

            //Input String.
            $inputStr = urlencode($text);
            
            $from = $from_lang;
            $to = $to_lang;

            //HTTP Detect Method URL.
            $detectMethodUrl = "http://api.microsofttranslator.com/V2/Http.svc/Translate?text=" . $inputStr . 
            "&from=" . $from . "&to=" . $to."&contentType=text/plain";

            //Call the curlRequest.
            $strResponse = $this->curlRequest($detectMethodUrl, $authHeader);

            //Interprets a string of XML into an object.
            $xmlObj = simplexml_load_string($strResponse);
            foreach ((array) $xmlObj[0] as $val) {
                $translated_str = $val;
            }


            return array("status" => "success", "msg" => $translated_str);
            
        } catch (Exception $e) {
            return array("status" => "error", "msg" => $e->getMessage());
        }
    }

    /*
     * Get the access token.
     *
     * @param string $grantType    Grant type.
     * @param string $scopeUrl     Application Scope URL.
     * @param string $clientID     Application client ID.
     * @param string $clientSecret Application client ID.
     * @param string $authUrl      Oauth Url.
     *
     * @return string.
     */

    function getTokens($grantType, $scopeUrl, $clientID, $clientSecret, $authUrl) {
        try {
            //Initialize the Curl Session.
            $ch = curl_init();
            //Create the request Array.
            $paramArr = array(
                'grant_type' => $grantType,
                'scope' => $scopeUrl,
                'client_id' => $clientID,
                'client_secret' => $clientSecret
            );
            //Create an Http Query.//
            $paramArr = http_build_query($paramArr);
            //Set the Curl URL.
            curl_setopt($ch, CURLOPT_URL, $authUrl);
            //Set HTTP POST Request.
            curl_setopt($ch, CURLOPT_POST, TRUE);
            //Set data to POST in HTTP "POST" Operation.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $paramArr);
            //CURLOPT_RETURNTRANSFER- TRUE to return the transfer as a string of the return value of curl_exec().
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            //CURLOPT_SSL_VERIFYPEER- Set FALSE to stop cURL from verifying the peer's certificate.
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            //Execute the  cURL session.
            $strResponse = curl_exec($ch);
            //Get the Error Code returned by Curl.
            $curlErrno = curl_errno($ch);
            if ($curlErrno) {
                $curlError = curl_error($ch);
                throw new Exception($curlError);
            }
            //Close the Curl Session.
            curl_close($ch);
            //Decode the returned JSON string.
            $objResponse = json_decode($strResponse);

            if ($objResponse->error) {
                throw new Exception($objResponse->error_description);
            }
            return $objResponse->access_token;
        } catch (Exception $e) {
            echo "Exception-" . $e->getMessage();
        }
    }

    /*
     * Create and execute the HTTP CURL request.
     *
     * @param string $url        HTTP Url.
     * @param string $authHeader Authorization Header string.
     * @param string $postData   Data to post.
     *
     * @return string.
     *
     */

    function curlRequest($url, $authHeader, $postData='') {
        //Initialize the Curl Session.
        $ch = curl_init();
        //Set the Curl url.
        curl_setopt($ch, CURLOPT_URL, $url);
        //Set the HTTP HEADER Fields.
        curl_setopt($ch, CURLOPT_HTTPHEADER, array($authHeader, "Content-Type: text/xml"));
        //CURLOPT_RETURNTRANSFER- TRUE to return the transfer as a string of the return value of curl_exec().
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //CURLOPT_SSL_VERIFYPEER- Set FALSE to stop cURL from verifying the peer's certificate.
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, False);
        if ($postData) {
            //Set HTTP POST Request.
            curl_setopt($ch, CURLOPT_POST, TRUE);
            //Set data to POST in HTTP "POST" Operation.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        }
        //Execute the  cURL session.
        $curlResponse = curl_exec($ch);
        //Get the Error Code returned by Curl.
        $curlErrno = curl_errno($ch);
        if ($curlErrno) {
            $curlError = curl_error($ch);
            throw new Exception($curlError);
        }
        //Close a cURL session.
        curl_close($ch);
        return $curlResponse;
    }

    /**
     * Returns a stream of a wave-file speaking the passed-in text in the desired language.
     * @param string $text text of language to break
     * @param string $to_lang language of the text
     * @return -
     */
    public function textToSpeech($text, $to_lang) {

        try {

            //Get the Access token.
            $accessToken = $this->getTokens($this->grantType, $this->scopeUrl, $this->clientID, $this->clientSecret, $this->authUrl);

            //Create the authorization Header string.
            $authHeader = "Authorization: Bearer " . $accessToken;

            //Set the params.
            $inputStr = urlencode($text);
            $language = $to_lang;

            $params = "text=$inputStr&language=$language&format=audio/mp3";

            //HTTP Speak method URL.
            $url = "http://api.microsofttranslator.com/V2/Http.svc/Speak?$params";
            //Set the Header Content Type.
            header('Content-Type: audio/mp3');
            header('Content-Disposition: attachment; filename=' . uniqid('SPC_') . '.mp3');

            //Call the curlRequest.
            $strResponse = $this->curlRequest($url, $authHeader);
            echo $strResponse;
        } catch (Exception $e) {
            echo "Exception: " . $e->getMessage() . PHP_EOL;
        }
    }

}
