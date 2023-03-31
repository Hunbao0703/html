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
                    $p = $_POST['student_score'];
                    $no = 0;
                    $yes = 0;
                    for($i = 1;$i < 6;$i++){
                        echo "<tr>" . "<th>" . $i . "</th>";
                        echo "<th>" . $p[$i - 1] . "</th>" . "</tr>";
                        if($p[$i - 1] < 60){
                            $no += 1;
                        }
                        elseif($p[$i - 1] >= 60){
                            $yes += 1;
                        }
                    }
                ?>
            </table>
            <?php
                    echo '總共及格人數為：' . $yes . '<br>';
                    echo '總共不及格人數為：' . $no;
            ?>
            

        </form>
    </body>
</html>