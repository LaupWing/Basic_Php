<?php
    include('config/db_connect.php');
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM pizzas WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        $pizza = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);
        print_r($pizza);
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
        <?php else:?>
            <h5>NO PIZZA FOUND</h5>
        <?php endif;?>
    </div>
    <?php include('partials/footer.php')?>
</html>