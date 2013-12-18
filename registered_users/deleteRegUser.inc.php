<?php
			
    $editUsername = $_POST['editUsername'];
    $adminDetailsQuery = "select * from AdminArea where username='$editUsername'";
    $adminDetailsRes = mysql_query($adminDetailsQuery, $c);
    $adminDetailsRow = mysql_fetch_array($adminDetailsRes, MYSQL_ASSOC);

    $full_name = $adminDetailsRow['full_name'];
    $username = $adminDetailsRow['username'];
    $password = $adminDetailsRow['password'];
    $active = $adminDetailsRow['active'];
    $comments = $adminDetailsRow['comments'];

    if($active == "yes"){
        $active = "checked";
    }

?>

<div class="container">

    <div class="formscontainer">

        <div style="color: red; font-weight:bold;" class="centeralign"><br><br>Use the form below to DELETE the RegUser selected.</div><br><br>

        <form action="home.php?action=deleteRegUserSubmission" method="post">

            <table>
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" value="<?= $full_name?>"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?= $username?>"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" value="<?= $password?>"></td>
                </tr>
                <tr>
                    <td>Active?</td>
                    <td><input type="checkbox" name="active" checked="<?= $active?>"></td>
                </tr>
                <tr>
                    <td>Comments</td>
                    <td><textarea rows="5" cols="20" name="comments"><?= $comments?></textarea></td>
                </tr>
            </table>

            <input type="hidden" name="level" value="reg">
            <center><input type="submit" value="delete" style="width: 100px"></center>

        </form>

    </div>
	
</div>
