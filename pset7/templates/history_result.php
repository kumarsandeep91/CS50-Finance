<table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>
    
    <tbody>
        <?php
        $rows = query ("SELECT symbol, shares, price, transaction, time FROM history WHERE id = ?", $_SESSION["id"]);
    
        //iterate over each row
        foreach ($rows as $row)
        {
            print ("<tr>");
            print ("<td> {$row["transaction"]} </td>");
            print ("<td> {$row["time"]} </td>");
            print ("<td> {$row["symbol"]} </td>");
            print ("<td> {$row["shares"]} </td>");
            printf ("<td> $ %.2f </td>", $row["price"]);
            print ("</tr>");
        }
    ?>

    </tbody>
</table>
