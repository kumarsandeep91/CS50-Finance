<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO: insert user into database.
        if (empty ($_POST["username"]) || empty ($_POST["password"]) || empty ($_POST["confirmation"]))
        {
            //error message
            apologize("All fields are mandatory i.e must not be blank.");
        }
        if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Password does not matched.");
        }
        $result = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));
        if ($result === false)
        {
            apologize("user already exists in our database");
        }
        // retriving id of current registered user.
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];
        //mark user logged in
        $_SESSION["id"] = $id;
        redirect ("index.php");
    }

?>
