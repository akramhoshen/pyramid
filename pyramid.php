<?php

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pyramidDB";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Function generate pyramid
function generatePyramid($height) {
    $pyramid = "";
    for ($i = 1; $i <= $height; $i++) {
        $pyramid .= str_repeat(" ", $height - $i) . str_repeat("*", 2 * $i - 1) . "\n";
    }
    echo "<pre>$pyramid</pre>";
}

if (isset($_POST["submit"])) {
    $height = intval($_POST["height"]);
    
    if ($height > 0) {
        // Generate pyramid
        generatePyramid($height);
        
        // Store height in database
        $db->query("INSERT INTO pyramids (height) VALUES ($height)");
    } else {
        echo "Please enter a valid height.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pyramid Generator</title>
</head>
<body>
    <form method="post" action="">
        <input type="number" id="height" name="height" placeholder="Enter the height" required>
        <input type="submit" name="submit"  value="Generate Pyramid">
    </form>
</body>
</html>
