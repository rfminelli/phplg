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

$router = $_POST['router'];
$query  = $_POST['query'];
$params = $_POST['params'];

include "lg.php";
include "lg.html";
?>
