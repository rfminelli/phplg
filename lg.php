<?php
/* 
phplg is a PHP Looking Glass for CISCO Routers.

Copyright (c) 2000, 2001, 2002 
Gabriella Paolini - gabriella.paolini@garr.it 
Personal Home Page: www.gabit.com gabi@gabit.com   
Copyright (c) 2004 Dashamir Hoxha, dhoxha@inima.al

phplg is free software; you can redistribute it and/or modify it under
the terms of  the GNU General Public License as  published by the Free
Software  Foundation; either  version 2  of the  License, or  (at your
option) any later version.

phplg is distributed  in the hope that it will  be useful, but WITHOUT
ANY WARRANTY; without even  the implied warranty of MERCHANTABILITY or
FITNESS FOR A  PARTICULAR PURPOSE. See the GNU  General Public License
for more details.

You  should have received  a copy  of the  GNU General  Public License
along with phplg; if not, write to the Free Software Foundation, Inc.,
59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

function get_output()
{
  global $router, $query, $params;
  if ($router=='' or $query=='')  return;

  $command = get_command($query, $params);
  run_command($router, $command);
}

function get_command($query, $params)
{
  switch ($query)
    {
    case 'traceroute':
    case 'ping':
    case 'mtrace':
    case 'mrinfo':
      $command = $query." ".$params;
      break;

    default:
      $command = $query." ".$params;
      break;
    }

  $command = str_replace("\n", "Not Valid", $command);
  $command = substr($command, 0, 60);

  return $command;
}

function run_command($router, $command)
{
  //open connection (socket)
  $fp = fsockopen($router, 23, &$errno, &$errstr, 3);
  if(!$fp)
    {
      $errormsg = "Impossible to connect to the router: $errno: $errstr";
      print "<div class='errormsg'>$errormsg</div>";
      return;
    }

  include 'credentials.php';
  list($username, $password) = get_credentials($router);

  if ($username != '')   fputs ($fp, $username."\n");
  fputs ($fp, $password."\n");
  fputs ($fp, "terminal length 0\n\n");
  fputs ($fp, $command."\n");
  fputs ($fp, "exit\n");
  $start = time();
  socket_set_timeout($fp, 30);
  $res = fread($fp, 300000);
  fclose($fp);
  print "<hr><pre>";
  print substr($res, 85);
  print "</pre><hr>\n";    
}
?>
