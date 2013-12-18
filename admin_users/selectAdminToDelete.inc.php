<div class="container">

    <div class="formscontainer">

        <div style="color: red; font-weight:bold;" class="centeralign"><br><br>Select the admin to DELETE.</div><br><br>

        <center>
        <form action="home.php?action=deleteAdmin" method="post">

            <?php

            $usernameQuery = "select username from AdminArea where level='admin'";
            $usernameRes = mysql_query($usernameQuery, $c);

            print "<select name='editUsername'>";
            while ($usernameRow = mysql_fetch_row($usernameRes)){
                print "<option value='$usernameRow[0]'>$usernameRow[0]</option>";
            }
            print "</select>";

            ?>

            <center><br><input type="submit" value="submit" style="width: 80px"></center>

        </form>
        </center>

    </div>
	
</div>

