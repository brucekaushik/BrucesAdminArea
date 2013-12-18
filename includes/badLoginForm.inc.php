<div class="container">
	
    <div class="formscontainer">

        <form method="post" action="home.php" id="loginform">

            <div style="color: red; font-weight:bold;"><br>Login failed. Please make sure you've entered a valid username and password and try again, or call the administrator.</div><br>

            <center><p style="font-size: 120%"><b>Please login to continue</b><br></p></center>

            <div style='color: grey; font-size: 13px;'>If don't have a username and password use one from the database below, observe that you can do different things based on the level of the user you use to login.</div><br>

            <table>

                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username"><br></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"><br></td>
                    </tr>

            </table>

            <br><center><input type="submit" name="login" value="login" style="width: 100px"></center>	

        </form>

    </div>
	
</div>