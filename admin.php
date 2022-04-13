<?php 
    require('connect.php');
    session_start();
    require('warning.php');
    require('search_function.php');

    $query = "SELECT * FROM users";

    $statement = $db->prepare($query);

    $statement->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?php require('navbar.php') ?>
    <div class="py-3">
        <div class="container">
        <p class="display-4">Users</p>
        <form action="process_user.php" method="post">
            <ul class="list-group">
                <?php while($row = $statement->fetch()) : ?>
                    <li class="list-group-item" style="width: 350px;">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="usersRadio" id="usersRadio" value="<?= $row['username'] ?>">
                            <label for="usersRadio" class="form-check-label pl-1"><?= $row['username'] ?></label>
                            <?php if($row['user_type'] == 1) : ?>
                                <span class="text-success">(admin)</span>
                            <?php endif ?>
                            <?php if($row['user_type'] == 2) : ?>
                                <span class="text-warning">(mod)</span>
                            <?php endif ?>
                        </div>
                    </li>   
                <?php endwhile ?>  
            </ul>
            <button class="btn btn-primary mt-3" name="command" value="Promote User">Promote</button>
            <button class="btn btn-danger mt-3" name="command" value="Delete User">Delete</button>
        </form>
        </div>
    </div>
</body>
</html>
