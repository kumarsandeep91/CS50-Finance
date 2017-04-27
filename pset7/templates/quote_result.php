<?php
if (empty ($_POST["symbol"]))
        {
            //error message
            apologize("Symbol must not be blank");
        }
$stock = lookup($_POST["symbol"]);
if (!$stock)
{
    apologize("Symbol not found.");
}
$price = number_format($stock["price"], 2, '.', '');
printf ("A share of %s (%s) costs <b>$%.2f ", $stock["name"], $stock["symbol"], $price);
?>
