<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("chp_form.php", ["title" => "Change Password"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO: changing password.
        if (empty ($_POST["oldpassword"]) || empty ($_POST["newpassword"]) || empty ($_POST["confirmation"]))
        {
            //error message
            apologize("All fields are mandatory i.e must not be blank.");
        }
        if ($_POST["newpassword"] != $_POST["confirmation"])
        {
            apologize("New Password does not matched.");
        }
        // matching users old password.
        $rows = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (crypt($_POST["oldpassword"], $row["hash"]) == $row["hash"])
            {
                // updating password.
                $result = query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["newpassword"]), $_SESSION["id"]);
                

                // redirect to portfolio
                redirect("/");
            }
            else
            {
                apologize("Old Password is incorrect");
            }
        }
    }

?>
