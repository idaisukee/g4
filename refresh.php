<?php
function refresh()
{
    $json = shell_exec('cat constants/client_secret.json');
    $array = json_decode($json);
    $refresh_token = shell_exec('cat constants/reflesh_token');
    $client_id = $array->installed->client_id;
    $client_secret = $array->installed->client_secret;

    $str_refresh_token = '"refresh_token='.$refresh_token.'"';
    $str_client_id = '"client_id='.$client_id.'"';
    $str_client_secret = '"client_secret='.$client_secret.'"';
    $str_grant_type = '"grant_type=refresh_token"';
    $refresh_url = 'https://www.googleapis.com/oauth2/v4/token';

    $str = 'curl --data '.$str_refresh_token.' --data '.$str_client_id.' --data '.$str_client_secret.' --data '.$str_grant_type.' '.$refresh_url;

    return $token_json = shell_exec($str);
}
?>
