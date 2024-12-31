<?php
include_once 'bdd.php';

class GameModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = Bdd::connexion();
    }

    public function getRandomQuestion($categoryId)
    {
        $query = $this->bdd->prepare("
            SELECT id_question, question, option1, option2, option3, option4, correct_option 
            FROM questions 
            WHERE category_id = ? 
            ORDER BY RAND() 
            LIMIT 1
        ");
        $query->execute([$categoryId]);
        $question = $query->fetch(PDO::FETCH_ASSOC);
        if ($question) {
            return $question;
        } else {
            return null; 
        }
    }


    public function getRandomQuestionExcluding($categoryId, $excludedIds)
    {
       
        $notInClause = '';
        if (!empty($excludedIds)) {
            $placeholders = implode(',', array_fill(0, count($excludedIds), '?'));
            $notInClause = "AND id_question NOT IN ($placeholders)";
        }
        $sql = "SELECT * FROM questions 
                WHERE category_id = ? $notInClause 
                ORDER BY RAND() 
                LIMIT 1";

        $stmt = $this->bdd->prepare($sql);

        $params = array_merge([$categoryId], $excludedIds);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllCategories()
    {
        $query = $this->bdd->query("SELECT id_categorie, name FROM categories");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}




