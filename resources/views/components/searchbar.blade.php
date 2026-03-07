<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Animated Search Input</title>
<style>
  /* * { margin: 0; padding: 0; box-sizing: border-box; } */

  /* body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #0f0f0f;
    font-family: 'Segoe UI', sans-serif;
  } */

  @property --angle {
    syntax: '<angle>';
    initial-value: 0deg;
    inherits: false;
  }

  @keyframes spin {
    to { --angle: 360deg; }
  }

  .input-wrapper {
    position: relative;
    width: 320px;
  }

  /* Always spinning — only opacity changes */
  .input-wrapper::before {
    content: '';
    position: absolute;
    inset: -2px;
    border-radius: 9999px;
    background: conic-gradient(
      from var(--angle, 0deg),
      transparent 0deg,
      transparent 60deg,
      #ff2020 90deg,
      #ff6060 120deg,
      #ff2020 150deg,
      transparent 210deg,
      transparent 360deg
    );
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: 0;
    animation: spin 1.8s linear infinite;
  }

  .input-wrapper::after {
    content: '';
    position: absolute;
    inset: -4px;
    border-radius: 9999px;
    background: conic-gradient(
      from var(--angle, 0deg),
      transparent 0deg,
      transparent 60deg,
      rgba(255, 32, 32, 0.3) 90deg,
      rgba(255, 96, 96, 0.15) 130deg,
      transparent 190deg,
      transparent 360deg
    );
    filter: blur(6px);
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: 0;
    animation: spin 1.8s linear infinite;
  }

  /* On focus — just fade in, spin is already going */
  .input-wrapper.focused::before {
    opacity: 1;
  }

  .input-wrapper.focused::after {
    opacity: 1;
  }

  .input-bg {
    position: absolute;
    inset: 2px;
    border-radius: 9999px;
    background: #1a1a1a;
    z-index: 1;
  }

  input {
    position: relative;
    z-index: 2;
    width: 100%;
    padding: 10px 18px;
    padding-right: 40px;
    border-radius: 9999px;
    border: none;
    outline: none;
    background: transparent;
    color: #f0f0f0;
    font-size: 15px;
    letter-spacing: 0.02em;
    caret-color: #ff4040;
  }

  input::placeholder {
    color: #555;
    transition: color 0.3s ease;
  }

  .input-wrapper.focused input::placeholder {
    color: #7a3a3a;
  }

  .search-icon {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 3;
    color: #444;
    transition: color 0.3s ease;
    pointer-events: none;

  }

  .input-wrapper.focused .search-icon {
    color: #ff4040;
  }
</style>
</head>
<body>

<div class="input-wrapper" id="wrapper">
  <div class="input-bg"></div>
  <input type="text" placeholder="Search" id="searchInput" />

    <svg class="search-icon cursor-pointer" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8"/>
        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>

</div>

<script>
  const input = document.getElementById('searchInput');
  const wrapper = document.getElementById('wrapper');
  input.addEventListener('focus', () => wrapper.classList.add('focused'));
  input.addEventListener('blur', () => wrapper.classList.remove('focused'));
</script>

</body>
</html>
