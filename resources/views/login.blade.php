<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ViewTube – Sign In</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  <style>
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

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      background-color: var(--black);
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
      min-height: 100vh;
      overflow-x: hidden;
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

    /* Spotlight from bottom-right this time for variation */
    .spotlight {
      position: fixed;
      bottom: -200px;
      right: -100px;
      width: 700px;
      height: 600px;
      background: radial-gradient(ellipse at center, rgba(255,0,0,0.15) 0%, transparent 70%);
      pointer-events: none;
      z-index: 0;
    }

    .spotlight-top {
      position: fixed;
      top: -150px;
      left: 50%;
      transform: translateX(-50%);
      width: 600px;
      height: 400px;
      background: radial-gradient(ellipse at center, rgba(255,0,0,0.1) 0%, transparent 70%);
      pointer-events: none;
      z-index: 0;
    }

    .page-wrapper {
      position: relative;
      z-index: 1;
      display: flex;
      min-height: 100vh;
      align-items: stretch;
    }

    /* LEFT – FORM PANEL */
    .left-panel {
      width: 55%;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 3rem 4rem;
    }

    /* RIGHT – VISUAL PANEL */
    .right-panel {
      width: 45%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 4rem 3.5rem;
      position: relative;
      overflow: hidden;
    }

    .right-panel::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      bottom: 0;
      width: 1px;
      background: linear-gradient(to bottom, transparent, var(--red), transparent);
      opacity: 0.4;
    }

    /* Play icon */
    .play-icon-bg {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 64px;
      height: 64px;
      background: var(--red);
      border-radius: 16px;
      margin-bottom: 2rem;
      box-shadow: 0 0 30px var(--red-glow);
      animation: pulse 2.5s ease-in-out infinite;
    }

    @keyframes pulse {
      0%, 100% { box-shadow: 0 0 30px var(--red-glow); }
      50%       { box-shadow: 0 0 60px rgba(255,0,0,0.6); }
    }

    .big-title {
      font-family: 'Bebas Neue', sans-serif;
      font-size: clamp(5rem, 9vw, 9rem);
      line-height: 0.9;
      letter-spacing: 2px;
      color: #fff;
    }

    .big-title span {
      color: var(--red);
      text-shadow: 0 0 40px var(--red-glow);
    }

    .tagline {
      font-size: 1rem;
      color: #555;
      margin-top: 1.5rem;
      line-height: 1.7;
      max-width: 300px;
    }

    .stat-row {
      display: flex;
      gap: 2rem;
      margin-top: 2.5rem;
    }

    .stat { display: flex; flex-direction: column; gap: 2px; }

    .stat-num {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 2rem;
      color: var(--red);
      line-height: 1;
    }

    .stat-label {
      font-size: 0.7rem;
      color: #555;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    /* Deco bars */
    .deco-bars {
      position: absolute;
      bottom: 40px;
      right: 3.5rem;
      display: flex;
      gap: 5px;
      align-items: flex-end;
    }

    .deco-bar {
      width: 4px;
      border-radius: 2px;
      background: linear-gradient(to top, var(--red), transparent);
      animation: bar-dance 1.5s ease-in-out infinite alternate;
    }

    .deco-bar:nth-child(1) { height: 20px; animation-delay: 0s; }
    .deco-bar:nth-child(2) { height: 35px; animation-delay: 0.1s; }
    .deco-bar:nth-child(3) { height: 25px; animation-delay: 0.2s; }
    .deco-bar:nth-child(4) { height: 45px; animation-delay: 0.3s; }
    .deco-bar:nth-child(5) { height: 30px; animation-delay: 0.4s; }
    .deco-bar:nth-child(6) { height: 55px; animation-delay: 0.5s; }
    .deco-bar:nth-child(7) { height: 38px; animation-delay: 0.35s; }
    .deco-bar:nth-child(8) { height: 22px; animation-delay: 0.15s; }

    @keyframes bar-dance {
      from { transform: scaleY(0.5); opacity: 0.4; }
      to   { transform: scaleY(1);   opacity: 1; }
    }

    .activity-text strong { color: #888; }

    /* FORM CARD */
    .form-card {
      width: 100%;
      max-width: 420px;
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 2.5rem;
      position: relative;
      animation: card-in 0.6s cubic-bezier(0.22,1,0.36,1) both;
    }

    @keyframes card-in {
      from { opacity: 0; transform: translateY(24px) scale(0.98); }
      to   { opacity: 1; transform: translateY(0) scale(1); }
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

    /* Logo inside card */
    .card-logo {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      margin-bottom: 1.8rem;
    }

    .card-logo-icon {
      width: 36px;
      height: 36px;
      background: var(--red);
      border-radius: 9px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 0 16px var(--red-glow);
      flex-shrink: 0;
    }

    .card-logo-text {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.5rem;
      color: #fff;
      letter-spacing: 1px;
    }

    .card-logo-text span { color: var(--red); }

    .form-header h2 {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.9rem;
      color: #fff;
      letter-spacing: 1px;
    }

    .form-header p {
      font-size: 0.82rem;
      color: #555;
      margin-top: 4px;
    }

    .form-header p a {
      color: var(--red);
      text-decoration: none;
    }
    .form-header p a:hover { text-decoration: underline; }

    .divider {
      height: 1px;
      background: var(--border);
      margin: 1.5rem 0;
    }

    .input-group {
      display: flex;
      flex-direction: column;
      gap: 0.4rem;
      margin-bottom: 1rem;
    }

    .input-group label {
      font-size: 0.75rem;
      color: #777;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      font-weight: 500;
    }

    .input-wrap {
      position: relative;
      display: flex;
      flex-direction: column;
    }

    .input-wrap input { order: 1; }
    .field-icon { order: 0; position: absolute; left: 14px; top: 50%; transform: translateY(-50%); pointer-events: none; transition: color 0.2s; color: #444; }

    .input-wrap input {
      width: 100%;
      background: #0d0d0d;
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 0.75rem 1rem 0.75rem 2.6rem;
      color: #e8e8e8;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.9rem;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
    }

    .input-wrap input::placeholder { color: #333; }

    .input-wrap input:focus {
      border-color: var(--red);
      box-shadow: 0 0 0 3px rgba(255,0,0,0.1);
    }

    /* Password toggle */
    .pw-toggle {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #444;
      cursor: pointer;
      padding: 4px;
      display: flex;
      align-items: center;
      transition: color 0.2s;
      z-index: 2;
    }

    .pw-toggle:hover { color: var(--red); }

    /* Remember + Forgot row */
    .meta-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 0.5rem 0 1.2rem;
    }

    .remember-row {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .remember-row input[type="checkbox"] {
      width: 14px;
      height: 14px;
      accent-color: var(--red);
    }

    .remember-row label {
      font-size: 0.78rem;
      color: #555;
      cursor: pointer;
    }

    .forgot-link {
      font-size: 0.78rem;
      color: var(--red);
      text-decoration: none;
    }

    .forgot-link:hover { text-decoration: underline; }

    .btn-signin {
      width: 100%;
      padding: 0.85rem;
      background: linear-gradient(135deg, #e50000, #990000);
      color: #fff;
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.2rem;
      letter-spacing: 2px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition: transform 0.15s, box-shadow 0.15s;
      box-shadow: 0 4px 20px rgba(255,0,0,0.3);
    }

    .btn-signin::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.08), transparent);
      pointer-events: none;
    }

    .btn-signin:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 30px rgba(255,0,0,0.5);
    }

    .btn-signin:active { transform: translateY(0); }

    .or-divider {
      display: flex;
      align-items: center;
      gap: 0.8rem;
      margin: 1.2rem 0;
    }

    .or-divider span { color: #333; font-size: 0.75rem; }
    .or-divider::before,
    .or-divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--border);
    }

    .social-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 0.6rem;
    }

    .btn-social {
      padding: 0.65rem;
      background: #0d0d0d;
      border: 1px solid var(--border);
      border-radius: 10px;
      color: #aaa;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.78rem;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      transition: border-color 0.2s, background 0.2s;
    }

    .btn-social:hover {
      border-color: #444;
      background: #151515;
    }

    /* Error state */
    .error-msg {
      background: rgba(255,0,0,0.08);
      border: 1px solid rgba(255,0,0,0.25);
      border-radius: 8px;
      padding: 0.6rem 0.8rem;
      font-size: 0.78rem;
      color: #ff6b6b;
      margin-bottom: 1rem;
      display: none;
      align-items: center;
      gap: 0.5rem;
    }

    .error-msg.show { display: flex; }

    /* Loading spinner on button */
    @keyframes spin {
      to { transform: rotate(360deg); }
    }
    .spinner {
      width: 18px;
      height: 18px;
      border: 2px solid rgba(255,255,255,0.3);
      border-top-color: #fff;
      border-radius: 50%;
      animation: spin 0.7s linear infinite;
      display: inline-block;
    }

    @media (max-width: 820px) {
      .right-panel { display: none; }
      .left-panel { width: 100%; padding: 2rem 1.5rem; }
    }
  </style>
</head>
<body>

<div class="spotlight"></div>
<div class="spotlight-top"></div>

<div class="page-wrapper">

  <!-- LEFT – FORM -->
  <div class="left-panel">
    <div class="form-card">

      <!-- Logo -->
      <div class="card-logo">
        <div class="card-logo-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="white">
            <polygon points="5,3 19,12 5,21"/>
          </svg>
        </div>
        <span class="card-logo-text">VIEW<span>TUBE</span></span>
      </div>

      <div class="form-header">
        <h2>Welcome Back</h2>
        <p>Don't have an account? <a href="/register">Create one →</a></p>
      </div>

      <div class="divider"></div>

      <!-- Error Message -->
      <div class="error-msg" id="errorMsg">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="12" cy="12" r="10"/>
          <line x1="12" y1="8" x2="12" y2="12"/>
          <line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
        <span id="errorText">Invalid email or password. Please try again.</span>
      </div>

      <form onsubmit="handleSignIn(event)">

        <!-- Email / Username -->
        <div class="input-group">
          <label>Email or Channel Name</label>
          <div class="input-wrap">
            <input type="text" id="emailInput" placeholder="john@example.com or @channel" required />
            <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
              <polyline points="22,6 12,13 2,6"/>
            </svg>
          </div>
        </div>

        <!-- Password -->
        <div class="input-group">
          <label>Password</label>
          <div class="input-wrap" style="position:relative;">
            <input type="password" id="pwInput" placeholder="Enter your password" required />
            <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
            <button type="button" class="pw-toggle" onclick="togglePassword()" title="Show/hide password">
              <svg id="eyeIcon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
              </svg>
            </button>
          </div>
        </div>

        <!-- Remember + Forgot -->
        <div class="meta-row">
          <div class="remember-row">
            <input type="checkbox" id="remember" />
            <label for="remember">Remember me</label>
          </div>
          <a href="#" class="forgot-link">Forgot password?</a>
        </div>

        <!-- Sign In Button -->
        <button type="submit" class="btn-signin" id="signinBtn">
          ▶ &nbsp; Sign In
        </button>

        <div class="or-divider"><span>or continue with</span></div>

        <div class="social-row">
          <!-- Google -->
          <button type="button" class="btn-social">
            <svg width="16" height="16" viewBox="0 0 48 48">
              <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
              <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
              <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
              <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.18 1.48-4.97 2.31-8.16 2.31-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
            </svg>
            Google
          </button>

          <!-- GitHub -->
          <button type="button" class="btn-social">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/>
            </svg>
            GitHub
          </button>
        </div>

      </form>

      <!-- Bottom note -->
      <p style="text-align:center; font-size:0.72rem; color:#333; margin-top:1.5rem;">
        Protected by ViewTube Security &nbsp;·&nbsp; <a href="#" style="color:#444; text-decoration:none;">Privacy</a>
      </p>

    </div>
  </div>

  <!-- RIGHT – VISUAL -->
  <div class="right-panel">

    <div class="play-icon-bg">
      <svg width="28" height="28" viewBox="0 0 24 24" fill="white">
        <polygon points="5,3 19,12 5,21"/>
      </svg>
    </div>

    <div class="big-title">
      VIEW<br/><span>TUBE</span>
    </div>





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

<script>
  let pwVisible = false;

  function togglePassword() {
    pwVisible = !pwVisible;
    const input = document.getElementById('pwInput');
    const icon  = document.getElementById('eyeIcon');
    input.type  = pwVisible ? 'text' : 'password';
    icon.innerHTML = pwVisible
      ? `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
         <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
         <line x1="1" y1="1" x2="23" y2="23"/>`
      : `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
         <circle cx="12" cy="12" r="3"/>`;
  }

  function handleSignIn(e) {
    e.preventDefault();
    const btn = document.getElementById('signinBtn');
    const err = document.getElementById('errorMsg');
    err.classList.remove('show');

    // Loading state
    btn.innerHTML = '<span class="spinner"></span>';
    btn.disabled = true;

    setTimeout(() => {
      const email = document.getElementById('emailInput').value;
      // Demo: wrong credentials trigger error
      if (email.toLowerCase().includes('wrong') || email.toLowerCase().includes('error')) {
        btn.innerHTML = '▶ &nbsp; Sign In';
        btn.disabled = false;
        err.classList.add('show');
        document.getElementById('errorText').textContent = 'Invalid email or password. Please try again.';
      } else {
        // Success
        btn.innerHTML = '✅ &nbsp; Signed In!';
        btn.style.background = 'linear-gradient(135deg,#22863a,#155724)';
        btn.style.boxShadow  = '0 4px 20px rgba(34,134,58,0.4)';
        setTimeout(() => {
          btn.innerHTML = '▶ &nbsp; Sign In';
          btn.style.background = '';
          btn.style.boxShadow  = '';
          btn.disabled = false;
        }, 3000);
      }
    }, 1400);
  }
</script>
</body>
</html>
