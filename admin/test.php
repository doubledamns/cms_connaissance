<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission to Database</title>
</head>
<body>
    <form id="createForm" method="post" action="submit.php" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        
        <label for="content">Content:</label>
        <textarea id="content" name="content" rows="4" required></textarea>
        
        <label for="image">Choose a file:</label>
        <input type="file" id="image" name="image" required>
        
        <button type="submit">Create Page</button>
    </form>
</body>
</html>
