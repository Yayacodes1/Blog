<!DOCTYPE html>
<html>
    <head>
        <title>A blog application</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    </head>
    <body>
        
    
    <?php for ($postID = 1; $postID <= 3; $postID++): ?>
            <h2> Article <?php echo $postID ?> title</h2>
            <div> dd Mon YYYY</div>
            <p> A paragraph summarising article <?php echo $postID ?>. </p>
            <p>
                <a href="#">Read more...</a>
            </p>
            <?php endfor ?>
            
            
            
            
            
    </body>
</html>