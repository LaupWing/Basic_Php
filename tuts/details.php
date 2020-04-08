<?php
    include('config/db_connect.php');
    if(isset($_POST['delete'])){
        print('Deleting');
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            header('Location: index.php');
        }else {
            echo 'quyer error ' . mysqli_error($conn);
        }
    }
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM pizzas WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        $pizza = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">

    <?php include('partials/header.php')?>
    <div class="container center">
        <?php if($pizza):?>
            <h4> <?php echo htmlspecialchars($pizza['title']);?> </h4>
            <p> <?php echo htmlspecialchars($pizza['email']);?> </p>
            <p> <?php echo date($pizza['created_at']);?> </p>
            <h5>Ingredients:</h5>
            <p><?php htmlspecialchars($pizza['ingredients']); ?></p>
            <form action="details.php" method="POST">
                <input name="id_to_delete" type="hidden" value="<?php echo $pizza['id'];?>">
                <button name="delete" type="submit" class="btn brand z-depth-0">Delete</button>
            </form>
        <?php else:?>
            <h5>NO PIZZA FOUND</h5>
        <?php endif;?>
    </div>
    <?php include('partials/footer.php')?>
</html>