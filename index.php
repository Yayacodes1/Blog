<?php
// Get PDO DSN string and connect to the database
$root = realpath(__DIR__);
$database = $root . '/data/data.sqlite';  // Make sure this path is correct
$dsn = 'sqlite:' . $database;

// Create PDO connection
$pdo = new PDO($dsn);

// Prepare and execute the statement to get all posts
$sql = "SELECT * FROM post ORDER BY created_at DESC";
$stmt = $pdo->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>A blog application</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    </head>
    <body>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <h2>
                <?php echo htmlspecialchars($row['title'], ENT_HTML5, 'UTF-8') ?>
            </h2>
            <div>
                <?php echo $row['created_at'] ?>
            </div>
            <p>
                <?php echo htmlspecialchars($row['body'], ENT_HTML5, 'UTF-8') ?>
            </p>
            <p><a href="#">Read more...</a></p>
    
    
                
    
            <?php endwhile ?>

            
            
            
            
            
    </body>
</html>