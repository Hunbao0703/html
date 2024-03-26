<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>乙級</title>

    </head>
    <body>
    <button id="refreshButton">下一題</button> 
    <br><br><br>
    <form id="quizForm">
        <?php
            $file = file('fk2.txt'); // 打开文本文件以供读取
            $ppt = $file[array_rand($file)];
            for($i = 0;$i < strlen($ppt);$i++) {
                if($ppt[$i] == "(") {
                    $f = $i;
                }
                if($ppt[$i] == ")") {
                    $e = $i;
                    break;
                }
            }

            if(($e - $f) > 2){
                $correctAnswers = [];
                for($i = 0;$i < strlen($ppt);$i++) {
                    if($i == $f) {
                        $i = $e + 1;
                    }
                    if($ppt[$i] == "a" && $ppt[$i + 1] == "1") {
                        echo '<br><br>';
                        echo $ppt[$i + 1];
                        echo '.';
                        echo '<input type="checkbox" name="answer" value="1">';
                        $i++;
                        continue;
                    }
                    else if($ppt[$i] == "a" && $ppt[$i + 1] == "2") {
                        echo '<br><br>';
                        echo $ppt[$i + 1];
                        echo '.';
                        echo '<input type="checkbox" name="answer" value="2">';
                        $i++;
                        continue;
                    }  
                    else if($ppt[$i] == "a" && $ppt[$i + 1] == "3") {
                        echo '<br><br>';
                        echo $ppt[$i + 1];
                        echo '.';
                        echo '<input type="checkbox" name="answer" value="3">';
                        $i++;
                        continue;
                    }
                    else if($ppt[$i] == "a" && $ppt[$i + 1] == "4") {
                        echo '<br><br>';
                        echo $ppt[$i + 1];
                        echo '.';
                        echo '<input type="checkbox" name="answer" value="4">';
                        $i++;
                        continue;
                    }
                    echo $ppt[$i];
                }
                $ansdisplay = "";
                for($i = $f + 1;$i < $e;$i++) {
                    $correctAnswers[] = $ppt[$i];
                    $ansdisplay .= $ppt[$i] . " ";
                }
                echo "<br>";
                echo "-----複選題------";
                
            }
            else {
                for($i = 0;$i < strlen($ppt);$i++) {
                    if($i == $f) {
                        $i = $e + 1;
                    }
                    if($ppt[$i] == "a" && $ppt[$i + 1] == "1") {
                        echo '<br><br>';
                        echo $ppt[$i + 1];
                        echo '.';
                        echo '<input type="radio" name="answer" value="1">';
                        $i++;
                        continue;
                    }
                    else if($ppt[$i] == "a" && $ppt[$i + 1] == "2") {
                        echo '<br><br>';
                        echo $ppt[$i + 1];
                        echo '.';
                        echo '<input type="radio" name="answer" value="2">';
                        $i++;
                        continue;
                    }  
                    else if($ppt[$i] == "a" && $ppt[$i + 1] == "3") {
                        echo '<br><br>';
                        echo $ppt[$i + 1];
                        echo '.';
                        echo '<input type="radio" name="answer" value="3">';
                        $i++;
                        continue;
                    }
                    else if($ppt[$i] == "a" && $ppt[$i + 1] == "4") {
                        echo '<br><br>';
                        echo $ppt[$i + 1];
                        echo '.';
                        echo '<input type="radio" name="answer" value="4">';
                        $i++;
                        continue;
                    }
                    echo $ppt[$i];
                }
                $ans = $ppt[$f + 1];
                $ansdisplay = $ppt[$f + 1];
            }
            
            

            
            echo "<br>";    
        ?>
    </form>
    <br>
    <div id="result"></div>
    <br><br>
    <button id="toggleButton">显示/隐藏答案</button>
    
    <?
        echo '<div id="answerdisplay" style="display: none;">';
        echo $ansdisplay;
        echo '</div>';
        
    ?>
    
    <script>
        var radioButtons = document.querySelectorAll('input[type="radio"]');
        var resultDiv = document.getElementById("result");

        radioButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var selectedAnswer = document.querySelector('input[name="answer"]:checked');
                if (selectedAnswer) {
                    var selectedValue = selectedAnswer.value;
                    if (selectedValue === "<?echo $ans?>") {
                        resultDiv.textContent = "回答正确！";
                    } else {
                        resultDiv.textContent = "回答错误。";
                    }
                }
            });
        });
    </script>


    <script>
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var resultDiv = document.getElementById("result");
        var correctAnswers = <?php echo json_encode($correctAnswers); ?>; // 从PHP传递正确答案到JavaScript数组

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener("click", function() {
                var selectedAnswers = Array.from(document.querySelectorAll('input[name="answer"]:checked'))
                    .map(checkbox => checkbox.value);

                var isCorrect = correctAnswers.every(answer => selectedAnswers.includes(answer));

                if (isCorrect && selectedAnswers.length === correctAnswers.length) {
                    resultDiv.textContent = "回答正确！";
                } else {
                    resultDiv.textContent = "回答错误。";
                }
            });
        });
    </script>
    
    <script>
         var answerDiv = document.getElementById("answerdisplay");
        var toggleButton = document.getElementById("toggleButton");
        var isAnswerVisible = false;

        toggleButton.addEventListener("click", function() {
            if (isAnswerVisible) {
                answerDiv.style.display = "none";
                toggleButton.textContent = "显示答案";
            } else {
                answerDiv.style.display = "block";
                toggleButton.textContent = "隐藏答案";
            }
            isAnswerVisible = !isAnswerVisible;
        });
    </script>
    
    <br>
    <br><br>
    
    

    <script>
        document.getElementById("refreshButton").addEventListener("click", function() {
            location.reload(); // 刷新页面
        });
    </script>
    </body>
</html>
