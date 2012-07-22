<?php

$this_dir = dirname(__FILE__);
require realpath($this_dir . '/../config.inc');

$oauth = new OAuth(
  $config['consumer_key'],
  $config['consumer_secret']
); 


$oauth->setAuthType(OAUTH_AUTH_TYPE_URI);
$req = $oauth->getRequestToken($config['request_uri'], "oob");
var_dump($req);
