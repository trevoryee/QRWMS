<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="QR Inventory Management System">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="yeet@uwm.edu">
        <link rel="stylesheet" href="index.css">
        <!--<script src="index.js"></script>-->
    </head>

    <body>
        
        <div id= "input">
            <form method="post" action="insert_sql.php">
                Database: <input type="text" id="database" name="database"><br><br>
                Make: <input type="text" id='make' name='make'><br><br>
                Model: <input type="text" id='make' name='model'><br><br>
                SN: <input type="text" id='sn' name='sn'><br><br>
                <input type="submit" name="Submit"><br><br>
            </form>
        </div>

    </body>
</html>