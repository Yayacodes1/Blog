<?php
try {
    // Get PDO DSN string and connect to the database
      // Make sure this path is correct
      require_once 'lib/common.php';

    // Check if database file exists
    if (!file_exists($database)) {
        die("Database not found. Please <a href='data/init.php'>initialize the database</a> first.");
    }
    

// Create PDO connection
    $pdo = getPDO();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if table exists
    $tableExists = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='post'")->fetch();
    if (!$tableExists) {
        die("Database table not found. Please <a href='data/init.php'>initialize the database</a> first.");
    }

    // Prepare and execute the statement to get all posts
    $sql = "SELECT * FROM post ORDER BY created_at DESC, id DESC";
    $stmt = $pdo->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
    <?php require 'templates/title.php' ?>

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
            <p><a 
            href="data/view-post.php?post_id=<?php echo $row['id'] ?>"
            >Read more...</a>
        </p>
    
    
                
    
            <?php endwhile ?>

            
            
            
            
            
    </body>
</html>