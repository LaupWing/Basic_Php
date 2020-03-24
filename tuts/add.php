<?php
    if(isset($_POST['submit'])){
        // echo htmlspecialchars($_POST['email']);
        // echo htmlspecialchars($_POST['title']);
        // echo htmlspecialchars($_POST['ingredients']);
        if(empty($_POST['email'])){
            echo 'An email is required <br/>'
        }else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo 'This is not a valid email';
            }
            // echo htmlspecialchars($_POST['email']);
        }
        if(empty($_POST['title'])){
            echo 'An title is required <br/>'
        }else{
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                echo 'Title must be letters and spaces only';
            }
            // echo htmlspecialchars($_POST['title']);
        }
        if(empty($_POST['ingredients'])){
            echo 'An ingredients is required <br/>'
        }else{
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                echo 'Ingredients must be comma seperated';
            }
            // echo htmlspecialchars($_POST['ingredients']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

    <?php include('partials/header.php')?>
    <section class="container grey-text">
        <h4 class="center">Add A pizza</h4>
        <form method="post" action="add.php" class="white">
            <label for="">Your email:</label>
            <input type="text" name="email">
            <label for="">Pizza Title:</label>
            <input type="text" name="title">
            <label for="">Ingredients: (comma seperated):</label>
            <input type="text" name="ingredients">
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>
    <?php include('partials/footer.php')?>
</html>