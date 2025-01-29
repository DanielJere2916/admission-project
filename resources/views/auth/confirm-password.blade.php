<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm Password</title>
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
    <form class="form" method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div class="description">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        @error('password')
            <span class="error-message">{{ $message }}</span>
        @enderror
        <div class="flex-column">
            <label>Password</label>
        </div>
        <div class="inputForm">
            <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
                <path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path>
                <path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path>
            </svg>
            <input type="password" name="password" class="input" placeholder="Enter your Password" required autocomplete="current-password" />
        </div>

        <button class="button-submit">{{ __('Confirm') }}</button>
    </form>
</body>
</html>
