<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<h1>Login</h1>
<form action="?c=user&a=validate" method="post">
    <label for="email">Email: </label>
    <input type="email" name="email" require class="form-control">
    <br>
    <label for="password">Password: </label>
    <input type="password" name="password" require class="form-control">
    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
</form>