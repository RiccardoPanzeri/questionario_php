<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION["rightAnswers"]) && isset($_SESSION["userAnswers"])){
        $answerCount = 1;
        $rightAnswers = $_SESSION["rightAnswers"];
        $userAnswers = $_SESSION["userAnswers"];
    }else{
        header("Location:../index.html");
        exit(1);
    }

    echo "<h1 class= text>Il tuo Punteggio è: {$_SESSION['score']} su {$_SESSION['totalAnswers']}</h1>";
    echo "<h2 class= text>Ecco la soluzione:</h2>";
    foreach($rightAnswers as $answer => $value){
        if($userAnswers[$answer] === $rightAnswers[$answer]){
            echo "<p class=para> Risposta corretta alla domanda numero {$answerCount}: <span class='rightAnswer'>{$rightAnswers[$answer]}</span>. Corretto!</p>";

        }else{
            echo "<p class=para> Risposta corretta alla domanda numero {$answerCount}: <span class='rightAnswer'>{$rightAnswers[$answer]}</span>.<br> Hai risposto: <span class='wrongAnswer'>{$userAnswers[$answer]}</span></p>";
        }
        $answerCount++;
    }

    echo "<a href='../index.html'>Torna alla HomePage</a>";
    
    ?>
    
</body>
</html>