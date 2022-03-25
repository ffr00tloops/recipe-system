<?php

function recipeList() {
    header("location:home.php");
}

if(isset($_POST['recipelist'])) {
    recipeList();
}

function addRecipe() {

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "recipesdb";
    
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "<script>alert('Success')</script";

    $title = $_POST['title'];
    $recipe = $_POST['recipe'];

    $sql = "INSERT INTO recipes (title, description)
    VALUES ( '$title', '$recipe')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: home.php");

    exit();


}

if(isset($_POST['newrecipe'])) {
    addRecipe();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Tracking System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    </style>
</head>
<body>
    <div class="lg:my-32 lg:mx-96 mx-full text-center border-2 lg:rounded-lg shadow ">
        <header class="text-white text-center bg-emerald-600 p-4">
            <h1>Recipe Tracking System</h1>
        </header>
        <button_container class="text-white border-cyan-500">
            <form method="post">
                <button class="btn btn-primary bg-emerald-500 rounded p-2 m-2" name="recipelist">Recipe List</button>
            </form>
        </button_container>
        <div class="border-t-2 rounded">
        <div class="text-center m-3 shadow">
            <form method="post">
                <h1 class="bg-cyan-600 text-white p-3 rounded">Add New Recipe</h1>
                <div class="m-3">
                    <div class="m-3 flex flex-col">
                        <label for="title">Title: </label>
                        <input type="text" name="title" id="title" class="border-2 border-black-600"></input>
                    </div>
                    <div class="m-3 flex flex-col">
                        <label for="recipe">Recipe: </label>
                        <textarea type="text" name="recipe" id="recipe" class="border-2 border-black-600"></textarea>
                    </div>
                    <button class="btn btn-primary bg-cyan-500 text-white rounded p-2 m-2" name="newrecipe">Add New Recipe</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>