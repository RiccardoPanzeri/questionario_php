<?php 
session_start();
$score = 0;
//array con le risposte corrette
$rightAnswers = [
    "answer1" => "PHP",
    "answer2" => "Il Browser",
    "answer3" => "Un Array Associativo"
];
$userAnswers = [];//array che
$totalAnswers = count($rightAnswers);

//controllo che il metodo sia post e che i valori forniti con il form non siano vuoti 
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["answer1"]) && 
isset($_POST["answer2"]) && isset($_POST["answer3"])){
    foreach($rightAnswers as $answerNum => $value){//per ogni valore contenuto nell'array delle risposte corrette
        if(htmlspecialchars($_POST[$answerNum]) === $rightAnswers[$answerNum]){//se la risposta fornita e quella corretta coincidono, aumento il punteggio
            $score++;  
        }
        $userAnswers[$answerNum] = htmlspecialchars($_POST[$answerNum]);//conservo la risposta dell'utente in un array apposito, che mi servirà dopo
    }

}else{//se il metodo non è post o se i campi sono vuoti interrompo lo script e reindirizzo l'utente
    header("Location: ../index.html");
    exit(1);

}
//conservo le risposte dell'utente, le risposte corrette, il totale delle domande e il punteggio calcolato nella superglobale di sessione
$_SESSION["score"] = $score;
$_SESSION["rightAnswers"] = $rightAnswers;
$_SESSION["userAnswers"] = $userAnswers;
$_SESSION["totalAnswers"] = $totalAnswers;
header("Location: ./result.php");



