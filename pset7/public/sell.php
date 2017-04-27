<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("sell_form.php", ["title" => "Sell"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $symbol = $_POST["symbol"];
        if (empty($symbol))
        {
            apologize ("You must select a symbol to Sell.");
        }
        $rows = query ("SELECT symbol, shares FROM portfolios WHERE symbol = ?", $symbol);
        $stock = $rows[0]["shares"];
        // looking up current price.
        $share = lookup ($symbol);
        $price = $stock * $share["price"];
        // delete stock from portfolios.
        $result = query ("DELETE FROM portfolios WHERE id = ? AND symbol = ?",$_SESSION["id"],$symbol);
        // update cash in users table
        $result = query ("UPDATE users SET cash = cash + $price WHERE id = ?", $_SESSION["id"]);
        
        // saving history
        $result = query ("INSERT INTO history (id, symbol, shares, price, transaction) VALUES(?, ?, ?, ?, \"SELL\")", $_SESSION["id"], $share["symbol"], $stock, $share["price"]);
        
        // redirect to portfolio
        redirect("/");
    }

?>
