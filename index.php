<?php

include ('config/db_connect');

$sql = 'SELECT title, interests, id FROM users ORDER BY created_at';
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);


mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <link href="styles.css" type="text/css" rel="stylesheet">
</head>


<?php include('templates/header.php'); ?>


<div>
    <div>
        <?php foreach ($users as $user): ?>
        <div>
            <div>
                <div>
                    <h6><?php echo htmlspecialchars($user['title']); ?></h6>
                    <div><?php echo htmlspecialchars($user['interests']); ?></div>
                </div>
                <div>
                    <a href="details.php?id=<?php echo $user['id'] ?>">Details</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<?php include('templates/footer.php'); ?>

</html>



