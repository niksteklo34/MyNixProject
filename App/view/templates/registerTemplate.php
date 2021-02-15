<head>
    <link rel="stylesheet" href="css/login.css">
</head>
<form action="" method="post">
    <div class="form">
        <h1>Регистрация</h1>
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
            <button type="submit" class="apply btn btn-success col" style="padding: 10px 75px 10px 75px">Зарегистрироваться</button>
        </div>
    </div>
        <?php
        if (!empty($_POST['name'])) {
        $name = trim($_POST['name'], ' ');
        $surname = trim($_POST['surname'], ' ');
        $email = trim($_POST['email'],  ' ');
        $password = trim($_POST['password'],  ' ');

        $checkUser = $array['baseUser']->checkUser($email);

        if (empty($checkUser)) {
            $createUser = $userInfo->createUser($name, $surname, $email, $password);
            echo "<p style=\"text-align: center;margin-top: 10px;font-size: 20px;color: white\">Вы зарегистрировались, {$name}!<br>Теперь <a href=\"login\">войдите</a></p>";
        } else {
            echo "<p style=\"text-align: center;margin-top: 10px;font-size: 20px;color: white\">Такой email уже существует!</p>";
        }
        }
        ?>
</form>
