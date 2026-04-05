<x-layout>
    <x-flash />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --red: #FF0000;
            --red-dark: #CC0000;
            --red-glow: rgba(255, 0, 0, 0.35);
            --black: #0A0A0A;
            --card: #111111;
            --border: #1f1f1f;
            --muted: #444;
            --text: #e8e8e8;
        }

        body {
            background-color: var(--black);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
            opacity: 0.6;
        }

        .spotlight {
            position: fixed;
            top: -200px;
            left: 50%;
            transform: translateX(-50%);
            width: 800px;
            height: 600px;
            background: radial-gradient(ellipse at center, rgba(255, 0, 0, 0.18) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .ambient-bl {
            position: fixed;
            bottom: -100px;
            left: -100px;
            width: 400px;
            height: 400px;
            background: radial-gradient(ellipse, rgba(255, 0, 0, 0.07) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .auth-stage {
            position: relative;
            z-index: 2;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .twin-panels {
            position: relative;
            width: 1200px;
            max-width: 95vw;
            min-height: 650px;
            display: flex;
            background: transparent;
            overflow: visible;
        }

        .panel {
            flex: 1;
            transition: transform 0.65s cubic-bezier(0.23, 1, 0.32, 1), opacity 0.4s ease;
            position: relative;
        }

        .left-panel,
        .right-panel {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .left-panel {
            background: transparent;
            padding: 3rem 2.5rem;
            position: relative;
            border-right: 1px solid rgba(255, 0, 0, 0.25);
        }

        .right-panel {
            padding: 2rem 2rem;
        }

        /* Swapped state - panels exchange positions */
        .twin-panels.swapped .left-panel {
            transform: translateX(100%);
        }

        .twin-panels.swapped .right-panel {
            transform: translateX(-100%);
        }

        .form-card {
            width: 100%;
            max-width: 460px;
            margin: 0 auto;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 2rem 2rem;
            position: relative;
            transition: opacity 0.3s ease;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.5);
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: -1px;
            left: 20%;
            right: 20%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--red), transparent);
            border-radius: 2px;
        }

        .left-panel .play-icon-bg {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 64px;
            height: 64px;
            background: var(--red);
            border-radius: 16px;
            margin-bottom: 1.8rem;
            box-shadow: 0 0 30px var(--red-glow);
            animation: pulse 2.5s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                box-shadow: 0 0 30px var(--red-glow);
            }

            50% {
                box-shadow: 0 0 60px rgba(255, 0, 0, 0.6);
            }
        }

        .big-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(4rem, 8vw, 7rem);
            line-height: 0.9;
            letter-spacing: 2px;
            color: #fff;
        }

        .big-title span {
            color: var(--red);
            text-shadow: 0 0 40px var(--red-glow);
        }

        .tagline {
            font-size: 0.9rem;
            color: #777;
            margin-top: 1.5rem;
            max-width: 280px;
        }

        .stat-row {
            display: flex;
            gap: 2rem;
            margin-top: 2.5rem;
        }

        .stat-num {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2rem;
            color: var(--red);
        }

        .stat-label {
            font-size: 0.7rem;
            color: #555;
            text-transform: uppercase;
        }

        .deco-bars {
            position: absolute;
            bottom: 40px;
            left: 2.5rem;
            display: flex;
            gap: 5px;
        }

        .deco-bar {
            width: 4px;
            border-radius: 2px;
            background: linear-gradient(to top, var(--red), transparent);
            animation: bar-dance 1.5s ease infinite alternate;
        }

        @keyframes bar-dance {
            from {
                transform: scaleY(0.5);
                opacity: 0.4;
            }

            to {
                transform: scaleY(1);
                opacity: 1;
            }
        }

        .deco-bar:nth-child(1) {
            height: 20px;
        }

        .deco-bar:nth-child(2) {
            height: 35px;
            animation-delay: 0.1s;
        }

        .deco-bar:nth-child(3) {
            height: 25px;
            animation-delay: 0.2s;
        }

        .deco-bar:nth-child(4) {
            height: 45px;
            animation-delay: 0.3s;
        }

        .deco-bar:nth-child(5) {
            height: 30px;
            animation-delay: 0.4s;
        }

        .deco-bar:nth-child(6) {
            height: 55px;
            animation-delay: 0.5s;
        }

        .deco-bar:nth-child(7) {
            height: 38px;
            animation-delay: 0.35s;
        }

        .deco-bar:nth-child(8) {
            height: 22px;
            animation-delay: 0.15s;
        }

        .center-rotator {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, transparent, var(--red), var(--red), transparent);
            transform-origin: center;
            z-index: 15;
            pointer-events: none;
            transition: transform 0.65s cubic-bezier(0.23, 1, 0.32, 1);
            box-shadow: 0 0 8px rgba(255, 0, 0, 0.5);
        }

        .input-group {
            margin-bottom: 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .input-group label {
            font-size: 0.75rem;
            color: #777;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap input {
            width: 100%;
            background: #0d0d0d;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0.7rem 1rem 0.7rem 2.6rem;
            color: #e8e8e8;
            font-size: 0.9rem;
            outline: none;
            transition: 0.2s;
        }

        .input-wrap input:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(255, 0, 0, 0.1);
        }

        .field-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #444;
            pointer-events: none;
        }

        .pw-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #666;
            cursor: pointer;
            z-index: 5;
            font-size: 1rem;
        }

        .btn-signin,
        .btn-register {
            width: 100%;
            padding: 0.85rem;
            background: linear-gradient(135deg, #e50000, #990000);
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.2rem;
            letter-spacing: 2px;
            border: none;
            border-radius: 10px;
            color: white;
            cursor: pointer;
            transition: transform 0.15s, box-shadow 0.15s;
            box-shadow: 0 4px 20px rgba(255, 0, 0, 0.3);
            margin-top: 0.5rem;
        }

        .btn-signin:hover,
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(255, 0, 0, 0.5);
        }

        .meta-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1rem 0;
            font-size: 0.75rem;
        }

        .forgot-link {
            color: var(--red);
            text-decoration: none;
        }

        .social-row {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .btn-social {
            flex: 1;
            background: #111;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0.6rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            color: #ccc;
            cursor: pointer;
        }

        .or-divider {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin: 1rem 0;
            color: #333;
            font-size: 0.75rem;
        }

        .or-divider::before,
        .or-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .error-msg {
            background: rgba(255, 0, 0, 0.1);
            border-left: 3px solid var(--red);
            padding: 0.6rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.75rem;
            display: none;
            align-items: center;
            gap: 0.5rem;
            color: #ff8888;
        }

        .password-strength {
            display: flex;
            gap: 4px;
            margin-top: 6px;
        }

        .strength-bar {
            height: 3px;
            flex: 1;
            background: #1a1a1a;
            border-radius: 2px;
        }

        .strength-bar.active-weak {
            background: #e53e3e;
        }

        .strength-bar.active-medium {
            background: #ed8936;
        }

        .strength-bar.active-strong {
            background: #48bb78;
        }

        .terms-row {
            display: flex;
            gap: 0.6rem;
            margin: 1rem 0;
            font-size: 0.78rem;
            align-items: center;
        }

        @media (max-width: 820px) {
            .twin-panels {
                flex-direction: column;
            }

            .left-panel,
            .right-panel {
                width: 100%;
                transform: none !important;
            }

            .center-rotator {
                display: none;
            }
        }
    </style>
    </head>

    <body>
        <div class="spotlight"></div>
        <div class="ambient-bl"></div>

        <div class="auth-stage">
            <div class="twin-panels" id="twinPanels">
                <!-- LEFT PANEL (branding) -->
                <div class="panel left-panel" id="leftPanel">
                    <div class="branding-login" id="brandingLogin">
                        <div class="play-icon-bg">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="white">
                                <polygon points="5,3 19,12 5,21" />
                            </svg>
                        </div>
                        <div class="big-title">VIEW<br /><span>TUBE</span></div>
                        <div class="deco-bars">
                            <div class="deco-bar"></div>
                            <div class="deco-bar"></div>
                            <div class="deco-bar"></div>
                            <div class="deco-bar"></div>
                            <div class="deco-bar"></div>
                            <div class="deco-bar"></div>
                            <div class="deco-bar"></div>
                            <div class="deco-bar"></div>
                        </div>
                    </div>
                    <div class="branding-register" style="display: none;" id="brandingRegister">
                        <div class="play-icon-bg">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="white">
                                <polygon points="5,3 19,12 5,21" />
                            </svg>
                        </div>
                        <div class="big-title">VIEW<br /><span>TUBE</span></div>
                        <div class="deco-bars">
                            <div class="deco-bar"></div>
                            <div class="deco-bar"></div>
                            <div class="deco-bar"></div>
                            <div class="deco-bar"></div>
                            <div class="deco-bar"></div>
                            <div class="deco-bar"></div>
                            <div class="deco-bar"></div>
                            <div class="deco-bar"></div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT PANEL (forms) -->
                <div class="panel right-panel" id="rightPanel">
                    <!-- LOGIN FORM -->
                    <div class="form-card" id="loginFormCard">
                        <div style="display: flex; align-items:center; gap:8px; margin-bottom:1rem;">
                            <div
                                style="background:#FF0000; width:32px; height:32px; border-radius:8px; display:flex; align-items:center; justify-content:center;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
                                    <polygon points="5,3 19,12 5,21" />
                                </svg>
                            </div>
                            <span style="font-family: 'Bebas Neue'; font-size:1.5rem;">VIEW<span
                                    style="color:#FF0000;">TUBE</span></span>
                        </div>
                        <div class="form-header">
                            <h2 style="font-family:'Bebas Neue';">Welcome Back</h2>
                            <p>Don't have an account? <a href="#" id="switchToRegisterLink"
                                    style="color:var(--red);">Create one →</a></p>
                        </div>
                        <div class="divider" style="margin:1rem 0;"></div>
                        <div class="error-msg" id="loginErrorMsg"><span id="loginErrorText">Invalid credentials</span>
                        </div>
                        <form id="loginFormElem" action="/login-user" method="POST">
                            @csrf
                            <div class="input-group">
                                <label>Email</label>
                                <div class="input-wrap">
                                    <input name="email" type="text" id="loginEmail" placeholder="john@example.com"
                                        required />
                                    <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                        <polyline points="22,6 12,13 2,6" />
                                    </svg>
                                </div>
                            </div>
                            <div class="input-group"><label>Password</label>
                                <div class="input-wrap"><input name="password" type="password" id="loginPassword"
                                        placeholder="Enter password" required />
                                    <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor">
                                        <rect x="3" y="11" width="18" height="11" rx="2"
                                            ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg>
                                    <button type="button" class="pw-toggle"
                                        onclick="toggleLoginPassword()">👁️</button>
                                </div>
                            </div>
                            <div class="meta-row">
                                <div>
                                    <input type="checkbox" id="rememberMe" />
                                    <label for="rememberMe">Remember me
                                    </label>
                                </div>
                                <a href="#" class="forgot-link">Forgot password?</a>
                            </div>
                            <button class="btn-signin">Sign In</button>
                        </form>
                        <p style="text-align:center; font-size:0.7rem; color:#333; margin-top:1.2rem;">Protected by
                            ViewTube</p>
                    </div>

                    <!-- REGISTER FORM -->
                    <div class="form-card" id="registerFormCard" style="display: none;">
                        <div style="display:flex; align-items:center; gap:8px; margin-bottom:1rem;">
                            <div
                                style="background:#FF0000; width:32px; height:32px; border-radius:8px; display:flex; align-items:center; justify-content:center;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
                                    <polygon points="5,3 19,12 5,21" />
                                </svg>
                            </div><span style="font-family:'Bebas Neue'; font-size:1.5rem;">VIEW<span
                                    style="color:#FF0000;">TUBE</span></span>
                        </div>
                        <div class="form-header">
                            <h2>Create Account</h2>
                            <p>Already have an account? <a href="#" id="switchToLoginLink"
                                    style="color:var(--red);">Sign in →</a></p>
                        </div>
                        <div class="divider"></div>
                        <form method="POST" action="/register-user" id="registerFormElem">
                            @csrf
                            <div class="input-group"><label>Full Name</label>
                                <div class="input-wrap">
                                    <input name="name" type="text" id="fullName" placeholder="John Doe"
                                        required />
                                    <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="input-group"><label>Email Address</label>
                                <div class="input-wrap">
                                    <input name="email" type="email" id="regEmail"
                                        placeholder="hello@viewtube.com" required />
                                    <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                        <polyline points="22,6 12,13 2,6" />
                                    </svg>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Password</label>
                                <div class="input-wrap">
                                    <input name="password" type="password" id="regPassword"
                                        placeholder="Min. 8 characters" oninput="checkRegStrength()" required />
                                    <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor">
                                        <rect x="3" y="11" width="18" height="11" rx="2"
                                            ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg>
                                    <button type="button" class="pw-toggle"
                                        onclick="toggleRegPassword()">👁️</button>
                                </div>
                                <div class="password-strength" id="strengthBars">
                                    <div class="strength-bar" id="s1"></div>
                                    <div class="strength-bar" id="s2"></div>
                                    <div class="strength-bar" id="s3"></div>
                                    <div class="strength-bar" id="s4"></div>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Confirm Password</label>
                                <div class="input-wrap">
                                    <input type="password" id="confirmPass" placeholder="Repeat password"
                                        required /><svg class="field-icon" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M9 12l2 2 4-4" />
                                        <rect x="3" y="11" width="18" height="11" rx="2"
                                            ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="terms-row"><input type="checkbox" id="termsCheckbox" required /><span>I agree
                                    to <a href="#">Terms</a> and <a href="#">Privacy</a>. I'm 13+.</span>
                            </div>
                            <button class="btn-register">Create Account</button>
                        </form>
                    </div>
                </div>

                <div class="center-rotator" id="centerRotator"></div>
            </div>
        </div>

        <script>
            const twinPanels = document.getElementById('twinPanels');
            const centerRotator = document.getElementById('centerRotator');
            const loginCard = document.getElementById('loginFormCard');
            const registerCard = document.getElementById('registerFormCard');
            const brandingLogin = document.getElementById('brandingLogin');
            const brandingRegister = document.getElementById('brandingRegister');

            let isAnimating = false;
            let isLoginMode = true; // true = login form visible, branding login visible

            function performSwap(goingToRegister) {
                if (isAnimating) return;
                if ((goingToRegister && !isLoginMode) || (!goingToRegister && isLoginMode)) return;

                isAnimating = true;

                // Rotate center line
                const rotateDeg = goingToRegister ? 180 : -180;
                centerRotator.style.transform = `rotate(${rotateDeg}deg)`;

                // Add swap class to animate panels exchanging positions
                twinPanels.classList.add('swapped');

                // Fade out current form and branding
                const currentForm = isLoginMode ? loginCard : registerCard;
                const nextForm = goingToRegister ? registerCard : loginCard;
                const currentBranding = isLoginMode ? brandingLogin : brandingRegister;
                const nextBranding = goingToRegister ? brandingRegister : brandingLogin;

                currentForm.style.transition = 'opacity 0.25s';
                currentForm.style.opacity = '0';
                currentBranding.style.transition = 'opacity 0.25s';
                currentBranding.style.opacity = '0';

                setTimeout(() => {
                    // Switch forms and branding
                    currentForm.style.display = 'none';
                    nextForm.style.display = 'block';
                    nextForm.style.opacity = '0';
                    nextForm.style.transition = 'opacity 0.3s';

                    currentBranding.style.display = 'none';
                    nextBranding.style.display = 'block';
                    nextBranding.style.opacity = '0';
                    nextBranding.style.transition = 'opacity 0.3s';

                    setTimeout(() => {
                        nextForm.style.opacity = '1';
                        nextBranding.style.opacity = '1';
                    }, 20);

                    // Remove swap class after animation completes
                    setTimeout(() => {
                        twinPanels.classList.remove('swapped');
                        isLoginMode = !isLoginMode;
                        isAnimating = false;
                    }, 600);
                }, 280);
            }

            // "Create one" from login -> swap to register mode
            document.getElementById('switchToRegisterLink')?.addEventListener('click', (e) => {
                e.preventDefault();
                if (isLoginMode) {
                    performSwap(true);
                }
            });

            // "Sign in" from register -> swap back to login mode
            document.getElementById('switchToLoginLink')?.addEventListener('click', (e) => {
                e.preventDefault();
                if (!isLoginMode) {
                    performSwap(false);
                }
            });

            // Password toggle functions
            window.toggleLoginPassword = function() {
                const pw = document.getElementById('loginPassword');
                pw.type = pw.type === 'password' ? 'text' : 'password';
            };

            window.toggleRegPassword = function() {
                const pw = document.getElementById('regPassword');
                pw.type = pw.type === 'password' ? 'text' : 'password';
            };

            // Register strength meter
            window.checkRegStrength = function() {
                const val = document.getElementById('regPassword').value;
                const bars = ['s1', 's2', 's3', 's4'].map(id => document.getElementById(id));
                bars.forEach(b => {
                    if (b) b.className = 'strength-bar';
                });
                if (!val) return;
                let score = 0;
                if (val.length >= 8) score++;
                if (/[A-Z]/.test(val)) score++;
                if (/[0-9]/.test(val)) score++;
                if (/[^A-Za-z0-9]/.test(val)) score++;
                const cls = score <= 1 ? 'active-weak' : score <= 2 ? 'active-medium' : 'active-strong';
                for (let i = 0; i < score && i < bars.length; i++) bars[i].classList.add(cls);
            };

            // Login submission
            document.getElementById('loginFormElem')?.addEventListener('submit', (e) => {

                const errorDiv = document.getElementById('loginErrorMsg');
                const email = document.getElementById('loginEmail').value;
                const pwd = document.getElementById('loginPassword').value;
                if (!email || !pwd) {
                    errorDiv.style.display = 'flex';
                    document.getElementById('loginErrorText').innerText = 'Please fill all fields.';
                    return;
                }
                errorDiv.style.display = 'none';
                const btn = e.target.querySelector('.btn-signin');
                const originalText = btn.innerHTML;

                // setTimeout(() => {
                //     alert(`Welcome back! (Demo: ${email})`);
                //     btn.innerHTML = originalText;
                // }, 800);
            });

            // Register submission
            document.getElementById('registerFormElem')?.addEventListener('submit', (e) => {
                const name = document.getElementById('fullName').value;
                const email = document.getElementById('regEmail').value;
                const pass = document.getElementById('regPassword').value;
                const confirm = document.getElementById('confirmPass').value;
                const terms = document.getElementById('termsCheckbox').checked;

                if (!name || !email || !pass || !confirm) {
                    alert('Please fill all fields');
                    return;
                }
                if (pass !== confirm) {
                    alert('Passwords do not match!');
                    return;
                }
                if (!terms) {
                    alert('You must accept Terms & Conditions');
                    return;
                }

                const btn = e.target.querySelector('.btn-register');
                btn.innerHTML = '✅ Account Created!';
                btn.style.background = 'linear-gradient(135deg,#22863a,#155724)';
                // setTimeout(() => {
                //     btn.innerHTML = 'Create Account';
                //     btn.style.background = '';
                //     alert(`Welcome ${name}!.......`);
                // }, 1500);
            });

            // Initialize
            window.addEventListener('load', () => {
                loginCard.style.display = 'block';
                registerCard.style.display = 'none';
                loginCard.style.opacity = '1';
                brandingLogin.style.display = 'block';
                brandingRegister.style.display = 'none';
                isLoginMode = true;
                twinPanels.classList.remove('swapped');
                centerRotator.style.transform = 'rotate(0deg)';
            });
        </script>
    </body>
</x-layout>
