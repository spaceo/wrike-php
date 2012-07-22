<?php

if (empty($argv[1]) || empty($argv[2])) {
  return;
}

$this_dir = dirname(__FILE__);
require realpath($this_dir . '/../config.inc');
require realpath($this_dir . '/../oauth_ticket.inc');

$oauth = new OAuth(
  $config['consumer_key'],
  $config['consumer_secret']
); 

$oauth->setAuthType(OAUTH_AUTH_TYPE_URI);
 
$oauth->setToken($ticket['oauth_token'], $ticket['oauth_token_secret']);

$text = !empty($argv[2]) ? htmlentities($argv[2], ENT_COMPAT | ENT_HTML401, 'UTF-8') : '';
$link = !empty($argv[3]) ? '<br/>' . $argv[3] : '';

$oauth->fetch(
  "http://www.wrike.com/api/json/v2/wrike.comment.add",
  array(
    'taskId' => $argv[1],
    'text' => $text . $link,
  )
);

$response_info = $oauth->getLastResponseInfo();
echo $oauth->getLastResponse();

