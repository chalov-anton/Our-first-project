<?php

include ('config/db_connect');

$title = $email = $interests = '';
$errors = array('email' => '', 'title' => '', 'interests' => '');

if (isset($_POST['submit'])) {

    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required <br />';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email adress';
        }
    }

    if (empty($_POST['title'])) {
        $errors['title'] = 'A Title is required <br />';
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Title must be letters and spaces only';
        }
    }

    if (empty($_POST['interests'])) {
        $errors['interests'] = 'Interests are required <br />';
    } else {
        $interests = $_POST['interests'];
        if (!preg_match('/^([a-zA-Z0-9\s]+)(,\s*[a-zA-Z0-9\s]*)*$/', $interests)) {
            $errors['interests'] = 'Interests mus be a comma separated list';
        }
    }

    if (array_filter($errors)) {

    } else {
        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html>

<link href="styles.css" type="text/css" rel="stylesheet">

<?php include('templates/header.php') ?>
<main>
   

    <form action="add.php" method="POST">
         <h1 class="reg-title">Registration Form</h1>
         <fieldset>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" placeholder="Enter your email address" value="<?php echo $email ?>">
        <div><?php echo $errors['email']; ?></div>

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" placeholder="Enter your title" value="<?php echo $title ?>">
        <div><?php echo $errors['title']; ?></div>

        <label for="interests">Interests (comma separated):</label>
        <input type="text" name="interests" id="interests" placeholder="What are you interested in?" value="<?php echo $interests ?>">
        <div><?php echo $errors['interests']; ?></div>
    </fieldset>
        <div>
            <input type="submit" name="submit" value="Send">
        </div>
    </form>
</main>
<?php include('templates/footer.php') ?>

</html>
