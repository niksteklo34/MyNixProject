<head>
    <link rel="stylesheet" href="css/login.css">
</head>
<div class="form">
    <div class="form-floating mb-3">
        <label for="name">Имя</label>
        <input type="text" class="form-control" id="name" placeholder="Имя" name="name">
    </div>
    <div class="form-floating mb-3">
        <label for="surname">Фамилия</label>
        <input type="text" class="form-control" id="surname" placeholder="Фамилия" name="surname">
    </div>
    <div class="form-floating mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Email-адрес" name="email">
    </div>
    <div class="form-floating mb-3">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" placeholder="Пароль" name="password">
    </div>
</div>
<div class="checkbox">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="checkbox" id="flexCheckChecked">
        <label class="form-check-label" for="flexCheckChecked">
            Принимаю <a href="#">правила лиц. соглашения</a>
        </label>
    </div>
</div>
<div class="row buttons-bar justify-content-center">
    <div class="button">
        <button type="submit" class="apply btn btn-success col">Зарегистрироваться</button>
    </div>
    <div class="button">
        <button type="submit" class="apply btn btn-success col">Войти</button>
    </div>
</div>
