<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDC WordPress</title>

    <!--Favicons-->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!--Tailwinds-->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="/js/default.js"></script>
  
</head>

<body>
<form id="clickform"> 
	<label ><span class='utili'>Nom d'utilisateur:</span></label><br/>
	<input type="email" name="email" id="email"  required><br/>
	<label for="password"><span class='mp'>Mot de passe:</span></label><br/>
	<input type="password" name="password" id="password"  required>
	<pre></pre>
	<input type="submit" value="connexion" onclick="Connexion()"/>
</form>  
</body>

</html>