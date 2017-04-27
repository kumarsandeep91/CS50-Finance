<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("buy_form.php", ["title" => "Buy Stock"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validation of input.
        if (empty($_POST["symbol"]) || empty($_POST["shares"]))
        {
            if (empty($_POST["symbol"]))
                apologize ("Enter some stock to buy.");
            apologize ("The no of shares can not be blank.");
        }
        if (!preg_match("/^\d+$/", $_POST["shares"]))
            apologize ("Invalid no of shares.");
        
        // check input symbol is valid.
        $stock = lookup ($_POST["symbol"]);
        if (empty($stock))
            apologize ("You entered a invalid symbol.");
        
        // searching database for available cash.
        $result = query ("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        $cash = $result[0]["cash"];
        $symbol = $stock["symbol"];
        $name = $stock["name"];
        $price = $stock["price"];
        
        if ($cash < ($price * $_POST["shares"]))
            apologize ("Not enough cash available in your account.");
            
        // inserting bought share into portfolios.
        $result = query ("INSERT INTO portfolios (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], $symbol, $_POST["shares"]);
        // updating cash.
        $pps = $price;
        $price = $price * $_POST["shares"];
        $result = query ("UPDATE users SET cash = cash - $price WHERE id = ?", $_SESSION["id"]);
        
        // saving history.
        $result = query ("INSERT INTO history (id, symbol, shares, price, transaction) VALUES(?, ?, ?, ?, \"BUY\")", $_SESSION["id"], $symbol, $_POST["shares"], $pps);
        
        redirect("/");
    }

?>
