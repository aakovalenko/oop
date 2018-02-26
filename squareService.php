<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 26.02.18
 * Time: 11:06
 */
$rows = $_REQUEST['rows'];
$cols = $_REQUEST['cols'];

for($i = 0; $i<$cols; $i++)
{
    for($x=0; $x<$rows; $x++)
    {
        print("*");
    }
    print("<br/>");
}