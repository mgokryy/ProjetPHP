<?php
include_once 'model/GameModel.php';

class GameController
{
    private $model;

    public function __construct()
    {
        $this->model = new GameModel();
    }

    public function chooseCategory()
    {
        $categories = $this->model->getAllCategories();
        include 'view/choose_category.php';
    }

    public function startGame()
    {
        if (!isset($_POST['category_id'])) {
            header("Location: index.php?page=accueil");
            exit();
        }

        $_SESSION['category'] = $_POST['category_id'];
        $_SESSION['score'] = 10000;
        $_SESSION['currentQuestion'] = 0;
        $_SESSION['askedQuestions'] = [];

        $this->loadQuestion();
        header("Location: index.php?page=jeu");
        exit();
    }

    public function loadQuestion()
    {
        if (!isset($_SESSION['category'])) {
            header("Location: index.php?page=choose_category");
            exit();
        }

        $categoryId = $_SESSION['category'];
        $askedQuestions = $_SESSION['askedQuestions'] ?? [];
        $question = $this->model->getRandomQuestionExcluding($categoryId, $askedQuestions);

        if ($question) {
            $_SESSION['askedQuestions'][] = $question['id_question'];
            $_SESSION['question'] = [
                'id' => $question['id_question'],
                'text' => $question['question'],
                'correct' => $question['correct_option'],
                'answers' => [
                    '1' => $question['option1'],
                    '2' => $question['option2'],
                    '3' => $question['option3'],
                    '4' => $question['option4']
                ]
            ];

            $_SESSION['timeRemaining'] = 30;
        } else {
            header("Location: index.php?page=jeu_result");
            exit();
        }
    }

    public function handleAnswer()
    {
        if (!isset($_POST['answer'])) {
            header("Location: index.php?page=jeu");
            exit();
        }

        $selectedAnswer = $_POST['answer'];
        $correctAnswer = $_SESSION['question']['correct'];
        $scoreBeforeAnswer = $_SESSION['score'];

        $timeLimit = 30;
        $timeTaken = $timeLimit - (int)$_SESSION['timeRemaining'];

        if ($timeTaken <= 10) {
            $_SESSION['score'] += 1000;
        }

        if ($selectedAnswer == $correctAnswer) {
            $_SESSION['score'] += 50000;
        } else {
            $_SESSION['score'] -= 20000;
        }
        if (isset($_POST['paris']) && $_POST['paris'] == '1') {
            $_SESSION['score'] = $selectedAnswer == $correctAnswer ? $_SESSION['score'] * 50 : 0;
        }

        $_SESSION['currentQuestion']++;
        $this->loadQuestion();
        header("Location: index.php?page=jeu");
        exit();
    }
}
