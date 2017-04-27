<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <select class="form-control" name="symbol">
                <option value = ""></option>
                <?php
                    $rows = query ("SELECT symbol FROM portfolios WHERE id = ?", $_SESSION["id"]);
                    foreach ($rows as $row)
                    {
                        printf("<option  value = \"%s\"> %s </option>", $row["symbol"], ($symbol = strtoupper($row["symbol"])));
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Sell</button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="index.php">Back</a>
</div>
