<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
        <head>
            <title>LOGIN ADMIN</title>
        </head>
    <body>
    <h3>LOGIN ADMIN</h3>
    <form method="POST" action="<?php echo base_url()."index.php/data/cek_login/"; ?>">
        <table>
            <tr>
                <td>Username : </td>
                <td><input type="text" name="user"></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="tbl_login" value="Login"></td>
            </tr>
        </table>
    </form>
    </body>
</html>