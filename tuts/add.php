<?php
    $errors = array('email'=> '', 'title' => '', 'ingredients'=>'');
    $ingredients = $title = $email = '';
    if(isset($_POST['submit'])){
        if(empty($_POST['email'])){
            $errors['email']= 'An Email is required <br/>';
        }else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email']= 'email must be a valid email address';
            }
        }
        if(empty($_POST['title'])){
            $errors['title'] = 'An Title is required <br/>';
        }else{
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['title'] = 'Title must letters and spaces only';
            }
        }
        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = 'Ingredients is required <br/>';
        }else{
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $errors['ingredients']= "Ingredients must be seperated with comma's";
            }
        }

        if(array_filter($errors)){
            
        }else{
            header('Location: index.php');
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
            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text"><?php echo $errors['email'] ?></div>
            <label for="">Pizza Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
            <div class="red-text"><?php echo $errors['title'] ?></div>
            <label for="">Ingredients: (comma seperated):</label>
            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="red-text"><?php echo $errors['ingredients'] ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>
    <?php include('partials/footer.php')?>
</html>