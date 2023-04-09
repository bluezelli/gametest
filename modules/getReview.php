<?php

function getReview(): array
{
    global $pdo;
    try {
        $review = $pdo->query('SELECT * FROM review')->fetchAll(PDO::FETCH_CLASS, 'Review');
        return $review;
    } catch (PDOException $e) {
        die("error: " . $e->getMessage());
    }


}

function postReview()
{
    if (isset($_POST['submit'])) {
        if (!empty($_POST['title']) && !empty($_POST['review'])) {
            global $pdo;
            try {
                $postReview = $pdo->prepare('INSERT INTO review (title, description, game_id, user_id) VALUES (:t, :d, :g, :u)');
                $postReview->bindParam("t", $_POST['title']);
                $postReview->bindParam("d", $_POST['review']);
                $postReview->bindParam("g", $_SESSION['game_id']);
                $postReview->bindParam("u", $_SESSION['user_id']);
                $postReview->execute();
                $_SESSION['message'] = "Review succesvol gepost";
                header("Refresh:0");
            } catch (PDOException $e) {
                die("error: " . $e->getMessage());
            }
        } else {
            $_SESSION['message'] = "Vul alle velden in";
        }
    } else {
        $_SESSION['message'] = "";
    }
}