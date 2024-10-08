<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <?php
    //do inizio alla sessione
    session_start();
    //controllo che i valori siano stati correttmente conservati nella variabile superglobale
    if(isset($_SESSION["rightAnswers"]) && isset($_SESSION["userAnswers"])){
        $answerCount = 1;
        $rightAnswers = $_SESSION["rightAnswers"];
        $userAnswers = $_SESSION["userAnswers"];
    }else{//altrimenti, reindirizzo l'utente alla home e fermo lo script
        header("Location:../index.html");
        exit(1);
    }
    //mostro il punteggio all'utente
    echo "<h1 class= text>Il tuo Punteggio è: {$_SESSION['score']} su {$_SESSION['totalAnswers']}</h1>";
    echo "<h2 class= text>Ecco la soluzione:</h2>";
    //mostro le crisposte corrette all'utente, con eventuale risposta sbagliata fornita
    foreach($rightAnswers as $answer => $value){
        if($userAnswers[$answer] === $rightAnswers[$answer]){
            echo "<p class=para> Risposta corretta alla domanda numero {$answerCount}: <span class='rightAnswer'>{$rightAnswers[$answer]}</span>. Corretto!</p>";

        }else{
            echo "<p class=para> Risposta corretta alla domanda numero {$answerCount}: <span class='rightAnswer'>{$rightAnswers[$answer]}</span>.<br> Hai risposto: <span class='wrongAnswer'>{$userAnswers[$answer]}</span></p>";
        }
        $answerCount++;//aumento il counter delle risposte
    }

    echo "<a href='../index.html'>Torna alla HomePage</a>";
    
    ?>
    
</body>
</html>