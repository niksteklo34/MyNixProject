<head>
    <link rel="stylesheet" href="css/login.css">
</head>
<form action="login/auth" method="post">
    <div class="form">
        <h1>Войти</h1>
        <hr class="over-text">
        <div class="form-floating mb-3">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" placeholder="Имя" name="name" required>
        </div>
        <div class="form-floating mb-3">
            <label for="surname">Фамилия</label>
            <input type="text" class="form-control" id="surname" placeholder="Фамилия" name="surname" required>
        </div>
        <div class="form-floating mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email-адрес" name="email" required>
        </div>
        <div class="form-floating mb-3">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" placeholder="Пароль" name="password" required>
        </div>
    </div>
    <div class="checkbox">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="checkbox" id="flexCheckChecked" required>
            <label class="form-check-label" for="flexCheckChecked">
                Принимаю <a href="#">правила лиц. соглашения</a>
            </label>
        </div>
    </div>
    <div class="row buttons-bar justify-content-center">
        <div class="button">
            <button type="submit" class="apply btn btn-success col" name="login">Войти</button>
        </div>
        <div class="button">
            <button class="apply btn btn-success col"><a href="register" style="text-decoration: none;color: white">Зарегистрироваться</a></button>
        </div>
        <p style="color: white; margin-top: 10px">Пожалуйста, заполните поля правильно</p>
</form>