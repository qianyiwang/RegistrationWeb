<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Heath Care User Interface</title>
    </head>
    <body> 
        <form action="result.php" method="post">
            <table  border="0" cellspacing="0" cellpadding="0"  >
                <tr>
                    <td colspan="1" bgcolor="003366"  align="center" width="1500px">
                        <h1 style="color: #FFCC33; font-size:60px;">Heath Care User Interface</h1>

                    </td>
                </tr>
                <tr>
                    <td bgcolor="#DCDCDC" >
                        First Name: <input type="text" name="firstname" >
                        Last Name: <input type="text" name="lastname" >
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#DCDCDC" height="10px"></td>
                </tr>
                <tr>
                    <td bgcolor="#DCDCDC" >
                        Cell Phone: <input type="text" name="cphone" >
                        Home Phone: <input type="text" name="hphone" >
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#DCDCDC" height="30px"></td>
                </tr>
                <tr>
                    <td bgcolor="#DCDCDC" >
                        Address: <input type="text" name="address" >


                        City: <input type="text" name="city" >


                        State: <input type="text" name="state" >


                        Zip Code: <input type="text" name="zip" >
                    </td>


                </tr>


                <tr>
                    <td bgcolor="#DCDCDC">
                        <b> Gender<br></b>
                        Male: <input type="radio" name="male">
                        Female: <input type="radio" name="female">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#DCDCDC">
                        <b>State <br></b>
                        Married: <input type="checkbox" name="married">
                        Single: <input type="checkbox" name="single">
                        Others: <input type="checkbox" name="others">
                    </td>
                </tr>
               
            </table>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
        <script>
        
        </script>
        
    </body>
</html>

