<ul class="nav nav-pills">
    <li><a href="quote.php">Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="chpassword.php">Change Password</a></li>
    <li><a href="logout.php"><strong>Log Out</strong></a></li>
</ul>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price</th>
            <th>TOTAL</th>
        </tr>
    </thead>
    <tbody>
    
    <?php
        $rows = query ("SELECT symbol, shares FROM portfolios WHERE id = ?", $_SESSION["id"]);
    
        //iterate over each row
        foreach ($rows as $row)
        {
            $stock = lookup($row["symbol"]);
            print ("<tr>");
            print ("<td> {$stock["symbol"]} </td>");
            print ("<td> {$stock["name"]} </td>");
            print ("<td> {$row["shares"]} </td>");
            printf ("<td> $ %.2f </td>", $stock["price"]);
            printf ("<td> $ %.2f </td>", $stock["price"] * $row["shares"]);
            print ("</tr>");
        }
    ?>
    <tr>
        <td colspan="4">CASH</td>
        <td>
            <?php 
                $rows = query ("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
                printf ("$%.2f", $rows[0]["cash"]);
            ?>
        </td>
    </tr>
    </tbody>
</table>
