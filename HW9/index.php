<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>教師成績管理系統</title>
    </head>
    <body>
        <h1>教師成績管理系統</h1>
        <form action="grade.php" method="post">
            <table border = "1">
                <tr>
                    <th>座號</th>
                    <th colspan="3">成績</th>
                </tr>
                <?php
                    
                    for($i = 1;$i < 6;$i++){
                        echo "<tr>" . "<th>" . $i . "</th>";
                        echo "<th>" . '<input type="text" name="student_score[]">' . "</th>" . "</tr>";
                    }
                ?>
            </table>
            <input type="submit" value='成績輸入'>
            

        </form>
    </body>
</html>