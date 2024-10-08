<?php 
session_start();
$score = 0;
$rightAnswers = [
    "answer1" => "PHP",
    "answer2" => "Il Browser",
    "answer3" => "Un Array Associativo"
];
$userAnswers = [];
$totalAnswers = count($rightAnswers);


if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["answer1"]) && 
isset($_POST["answer2"]) && isset($_POST["answer3"])){
    foreach($rightAnswers as $answerNum => $value){
        if(htmlspecialchars($_POST[$answerNum]) === $rightAnswers[$answerNum]){
            $score++;
        }
        $userAnswers[$answerNum] = htmlspecialchars($_POST[$answerNum]);
    }

}else{
    header("Location: ../index.html");
    exit(1);

}

$_SESSION["score"] = $score;
$_SESSION["rightAnswers"] = $rightAnswers;
$_SESSION["userAnswers"] = $userAnswers;
$_SESSION["totalAnswers"] = $totalAnswers;
header("Location: ./result.php");



