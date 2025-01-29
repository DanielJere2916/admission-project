<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
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

.form {
    display: flex;
    flex-direction: column;
    gap: 10px;
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

::placeholder {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    color: rgba(255, 255, 255, 0.7);
}

.flex-column {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.flex-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    gap: 8px;
}

label {
    font-size: 14px;
    color: rgb(255, 255, 255);
    font-weight: 400;
}

.inputForm {
    border: 1.5px solid transparent;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    font-size: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px;
    transition: all 0.2s ease-in-out;
}

.input {
    width: 100%;
    background: none;
    border: none;
    outline: none;
    color: white;
    padding: 4px;
}

.inputForm:hover,
.inputForm:focus-within {
    border: 1.5px solid rgb(89, 91, 255);
}

.flex-row {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 8px;
}

.span {
    font-size: 14px;
    color: rgb(154, 179, 245);
    text-decoration: none;
    margin: 0 auto;
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
    margin-top: 10px;
    transition: all 0.2s ease-in-out;
}

.button-submit:hover {
    background: rgb(76, 78, 233);
}

.p {
    text-align: center;
    color: white;
    font-size: 14px;
    margin: 5px 0;
}

.description {
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    line-height: 1.5;
    margin-bottom: 20px;
}

.error-message {
    color: #ff6b6b;
    font-size: 12px;
    margin-top: 5px;
}

.success-message {
    color: #4BB543;
    font-size: 14px;
    margin-bottom: 15px;
}

svg {
    fill: rgb(255, 255, 255);
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
    <form class="form" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="description">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="success-message">
                {{ session('status') }}
            </div>
        @endif

        @error('email')
            <span class="error-message">{{ $message }}</span>
        @enderror
        <div class="flex-column">
            <label>Email</label>
        </div>
        <div class="inputForm">
            <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                <g id="Layer_3" data-name="Layer 3">
                    <path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path>
                </g>
            </svg>
            <input type="email" name="email" class="input" placeholder="Enter your Email" value="{{ old('email') }}" required autofocus />
        </div>

        <button class="button-submit">{{ __('Email Password Reset Link') }}</button>
        
        <p class="p">
            Remember your password? 
            <a href="{{ route('login') }}" class="span">Back to Login</a>
        </p>
    </form>
</body>
</html>
