<?php
include_once 'controller/GameController.php';
$game = new GameController();

if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=connexion");
    exit();
}

if (!isset($_SESSION['question']) || !isset($_SESSION['score'])) {
    header("Location: index.php?page=choose_category");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu</title>
    <style>
        .correct {
            background-color: rgb(160, 242, 179);
        }
        
        .incorrect {
            background-color: rgb(239, 149, 158);
        }

        #timer {
            font-size: 24px;
            color: red;
            font-weight: bold;
        }
        form {
            margin-top: 25px;  
        }
    </style>
</head>
<body>
    <h1>Jeu - Question en cours</h1>

    <p>Score actuel : <?php echo $_SESSION['score']; ?> fcfa</p>
    <p>Question : <?php echo $_SESSION['currentQuestion'] + 1; ?>/7</p>

    <div>
        <p><?php echo $_SESSION['question']['text']; ?></p>
        <p>Temps restant : <span id="timer">30</span> secondes</p>
        <form method="post" action="index.php?page=jeu_answer" id="answerForm">
            
            <?php foreach ($_SESSION['question']['answers'] as $key => $answer): ?>
                <label id="answer_<?php echo $key; ?>" class="answer">
                    <input type="radio" name="answer" value="<?php echo $key; ?>" required>
                    <?php echo $answer; ?>
                </label><br>
            <?php endforeach; ?>

            <label>
                <input type="checkbox" name="paris" value="1"> Activer le pari (double ou rien)
            </label><br>

            <button type="submit">Valider</button>
        </form>
    </div>


    <script>
        let timeLeft = 30;
        const timerElement = document.getElementById('timer');
        
        const timer = setInterval(function() {
            if (timeLeft <= 0) {
                clearInterval(timer);
                document.getElementById('answerForm').submit(); 
            } else {
                timerElement.innerText = timeLeft;
                timeLeft--;
            }
        }, 1000);

        document.getElementById('answerForm').onsubmit = function(event) {
            event.preventDefault(); 

            const selectedAnswer = document.querySelector('input[name="answer"]:checked')?.value;
            const correctAnswer = "<?php echo $_SESSION['question']['correct']; ?>";
            const isCorrect = selectedAnswer === correctAnswer;

            const answerLabels = document.querySelectorAll('.answer');
            answerLabels.forEach(label => {
                const answerValue = label.querySelector('input').value;
                label.classList.remove('correct', 'incorrect');
                if (answerValue == selectedAnswer) {
                    label.classList.add(isCorrect ? 'correct' : 'incorrect');
                }
                if (answerValue == correctAnswer && !isCorrect) {
                    label.classList.add('correct');
                }
            });

            setTimeout(() => document.getElementById('answerForm').submit(), 1000);
        };
    </script>
</body>
</html>
