<?php

function addRecipe() {
    header("location:addrecipe.php");
}

if(isset($_POST['newrecipe'])) {
    addRecipe();
}


function deleteAllRecipes() {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "recipesdb";
    
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "<script>alert('Success')</script";

    $sql = "DELETE FROM recipes";

    if ($conn->query($sql) === TRUE) {
        echo "All records deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: home.php");
    exit();

}

if(isset($_POST['deleterecipes'])) {
    deleteAllRecipes();
}


$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "recipesdb";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM recipes";
$res = mysqli_query($conn,$sql);


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
                <button class="btn btn-primary bg-cyan-500 rounded p-2 m-2" name="newrecipe">New Recipe</button>
                <button class="btn btn-primary bg-emerald-500 rounded p-2 m-2" name="recipelist">Recipe List</button>
                <button class="btn btn-primary bg-red-500 rounded p-2 m-2" name="deleterecipes">Delete All Recipes</button>
            </form>
        </button_container>
        <div class="border-t-2 rounded lg:flex lg:flex-between lg:justify-center">
            <?php 
            while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                $rows[] = $row;
            }

            foreach($rows as $row) {
                echo "<div class=\"text-center m-3 shadow\">";
                echo "<h1 class=\"bg-emerald-600 text-white p-3 rounded\">";
                echo $row['title'];
                echo "</h1>";
                echo "</div>";
            }        
            ?>
            <div class="text-center m-3 shadow">
                <h1 class="bg-emerald-600 text-white p-3 rounded">Chicken Alfredo</h1>
                <div class="m-3">
                    <h1>&#8226; Table Spoon of Shit</h1>
                    <h1>&#8226; Teaspoon of cum</h1>
                    <button class="btn btn-primary bg-yellow-500 text-white rounded p-2 m-2" name="recipelist">Edit Recipe</button> 
                    <button class="btn btn-primary text-white bg-red-500 rounded p-2 m-2 " name="deleterecipes">Delete Recipe</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

