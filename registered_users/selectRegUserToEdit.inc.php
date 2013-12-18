<div class="container">

    <div class="formscontainer">

        <div style="color: red; font-weight:bold;" class="centeralign"><br><br>Select the reg user to EDIT.</div><br><br>

        <center>
        <form action="home.php?action=editRegUser" method="post">

            <?php

            $usernameQuery = "select username from AdminArea where level='reg'";
            $usernameRes = mysql_query($usernameQuery, $c);

            print "<select name='editUsername'>";
            while ($usernameRow = mysql_fetch_row($usernameRes)){
                    print "<option value='$usernameRow[0]'>$usernameRow[0]</option>";
            }
            print "</select>";

            ?>

            <br><br>

            <input type="submit" value="submit" style="width: 80px">

        </form>
        </center>

    </div>
	
</div>