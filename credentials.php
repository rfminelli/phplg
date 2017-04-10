<?php
/**
 * Returns the username and password for the given router.
 * $username should be empty if no username is needed to
 * access the router.
 */
function get_credentials($router)
{
  switch ($router)
    {
    case '193.254.1.194':
      $username = '';
      $password = 'xxxxx';
      break;
    case '193.254.1.200':
      $username = '';
      $password = 'yyyyy';
      break;
    }

  return array($username, $password);
}
?>
