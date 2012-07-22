<?php

$this_dir = dirname(__FILE__);
require realpath($this_dir . '/../config.inc');

$oauth = new OAuth(
  $config['consumer_key'],
  $config['consumer_secret']
); 


$oauth->setAuthType(OAUTH_AUTH_TYPE_URI);
$oauth->setToken($argv[1], $argv[2]);
$access = $oauth->getAccessToken($config['access_uri']);
var_export($access);
