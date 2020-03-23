<?php
    if(isset($_POST['submit'])){
        echo htmlspecialchars($_POST['email']);
        echo htmlspecialchars($_POST['title']);
        echo htmlspecialchars($_POST['ingredients']);
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