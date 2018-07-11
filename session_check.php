<?php
session_start();
if($_SESSION["email"] != "")
{
echo "1" ;

}
else
{
echo "0";
}
?>