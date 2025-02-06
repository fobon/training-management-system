<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/css/ionicons.min.css">
    <style>

        body {
            user-select: none;
            overflow-y: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background: hsl(218deg 50% 91%);
            height: 100vh;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        .screen {
            background: hsl(213deg 85% 97%);
            padding: 2em;
            display: flex;
            flex-direction: column;
            border-radius: 30px;
            box-shadow: 0 0 2em hsl(231deg 62% 94%);
        }

        .screen-1 {
            gap: 2em;
        }

        .logo {
            margin-top: -3em;
        }

        .email {
            background: hsl(0deg 0% 100%);
            box-shadow: 0 0 2em hsl(231deg 62% 94%);
            padding: 1em;
            display: flex;
            flex-direction: column;
            gap: 0.5em;
            border-radius: 20px;
            color: hsl(0deg 0% 30%);
            margin-top: -3em;
        }

        .email input {
            outline: none;
            border: none;
        }

        .email input::placeholder {
            color: hsl(0deg 0% 0%);
            font-size: 0.9em;
        }

        .password {
            background: hsl(0deg 0% 100%);
            box-shadow: 0 0 2em hsl(231deg 62% 94%);
            padding: 1em;
            display: flex;
            flex-direction: column;
            gap: 0.5em;
            border-radius: 20px;
            color: hsl(0deg 0% 30%);
            margin-top: 1em;
        }

        .password input {
            outline: none;
            border: none;
        }

        .password input::placeholder {
            color: hsl(0deg 0% 0%);
            font-size: 0.9em;
        }

        .login {
            padding: 1em;
            background: hsl(233deg 36% 38%);
            color: hsl(0 0 100);
            border: none;
            border-radius: 30px;
            font-weight: 600;
        }

        .footer {
            display: flex;
            font-size: 0.7em;
            color: hsl(0deg 0% 37%);
            gap: 14em;
            padding-bottom: 10em;
        }

        .footer span {
            cursor: pointer;
        }

        button {
            cursor: pointer;
        }

        h1 {
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="screen screen-1">
        <h1>Login</h1><br>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="email">
                <label for="email" class="form-label">Email Address</label>
                <div class="sec-2">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}" class="form-control" placeholder="example@email.com">
                </div>
            </div>

            <div class="password">
                <label for="password" class="form-label">Password</label>
                <div class="sec-2">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input class="pas" type="password" name="password" id="password" required class="form-control" placeholder="············">
                    <ion-icon class="show-hide" name="eye-outline"></ion-icon>
                </div>
            </div>

            <br><button type="submit" class="login">Login</button>
        </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
