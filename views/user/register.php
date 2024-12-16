<html lang="ee">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="/utils/register.php" method="post">
        <label for="username">Nombre de usuario: </label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email: </label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña: </label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>