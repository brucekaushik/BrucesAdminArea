<div class="container">

    <div class="formscontainer">
	
        <div style="color: red; font-weight:bold;" class="centeralign"><br><br>Use the form below to add a new reg user.</div>
        <div style='color: grey; font-size: 13px;'>You can use only a-z A-Z 0-9 and _ when adding a registered user, Any other characters added will be removed automatically, This applies for username, password, and full name fields.<br><br> Also, note that max number of characters allowed are 20 per field, you will see an error if exceeded.</div><br>
		
        <form action="home.php?action=addRegUserSubmission" method="post">

            <table>
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password"></td>
                </tr>
                <tr>
                    <td>Active?</td>
                    <td><input type="checkbox" name="active"></td>
                </tr>
                <tr>
                    <td>Comments</td>
                    <td><textarea rows="5" cols="20" name="comments"></textarea></td>
                </tr>
            </table>


            <input type="hidden" name="level" value="reg"><br><br>
            <center><input type="submit" value="add" style="width: 100px"></center>

        </form>
		
    </div>
	
</div>
