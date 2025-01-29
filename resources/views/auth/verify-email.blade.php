<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    height: 100vh;
    background: linear-gradient(135deg, #1e2a78 40%, #474646 100%);
}

.container {
    display: flex;
    flex-direction: column;
    gap: 20px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 30px;
    width: 430px;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    opacity: 0;
    transform: translateY(20px);
    animation: formAppear 3.2s ease forwards;
}

.description {
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    line-height: 1.5;
}

.success-message {
    color: #4BB543;
    font-size: 14px;
    line-height: 1.5;
}

.button-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
}

.button-submit {
    padding: 10px 15px;
    background: rgb(89, 91, 255);
    border: none;
    border-radius: 10px;
    color: white;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
}

.button-submit:hover {
    background: rgb(76, 78, 233);
}

.button-logout {
    padding: 10px 15px;
    background: transparent;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    color: white;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
}

.button-logout:hover {
    background: rgba(255, 255, 255, 0.1);
}

@keyframes formAppear {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
    </style>
</head>
<body>
    <div class="container">
        <div class="description">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="success-message">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="button-container">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="button-submit">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="button-logout">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</body>
</html>
