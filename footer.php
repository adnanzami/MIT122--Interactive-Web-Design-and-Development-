<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>SafePaws — Footer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Embedded CSS -->
  <style>
    :root{
      --purple:#C8A2C8;
      --pink:#F8C8DC;
      --yellow:#FFF5BA;
      --blue:#B5EAEA;
      --bg:#FFFEFB;
      --text:#4B4453;
      --white:#fff;
      --radius:20px;
      --shadow:0 10px 24px rgba(0,0,0,.05);
    }

    * { box-sizing: border-box; }
    body{
      margin:0;
      font-family:Poppins, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      color:var(--text);
      background:var(--bg);
    }
    .container{ max-width:1100px; margin:0 auto; padding:0 22px; }

    .site-footer{
      background: var(--yellow);
      margin-top: 0;
      padding: 0;
    }
    .site-footer .container{ padding: 26px 22px; }

    .footer-grid{
      display:grid;
      grid-template-columns: 1.4fr 1fr 1fr 1.2fr;
      gap:24px;
    }

    .footer-col h4{ margin:0 0 10px; font-size:1.05rem; }
    .footer-list{ list-style:none; padding:0; margin:0; }
    .footer-list li{ margin:6px 0; }
    .footer-list a{ color:var(--text); text-decoration:none; }
    .footer-list a:hover{ text-decoration:underline; }

    .footer-brand{
      display:flex; align-items:center; gap:8px;
      font-weight:700; font-size:1.4rem; margin-bottom:6px;
    }
    .footer-brand .name{ color:var(--text); }
    .footer-brand .highlight{ color:var(--yellow); }
    .footer-about{ margin:6px 0 12px; }

    .footer-social a{
      display:inline-flex; align-items:center; justify-content:center;
      width:38px; height:38px; margin-right:8px; border-radius:50%;
      background:var(--blue);
      box-shadow:var(--shadow);
      font-size:18px; text-decoration:none;
    }

    .footer-subscribe{
      display:grid; grid-template-columns:1fr auto; gap:10px; margin-top:6px;
    }
    .footer-subscribe input{
      width:100%; padding:10px 12px; border:1px solid #ddd; border-radius:12px;
      font:inherit; outline:none; background:#fff;
    }
    .footer-subscribe input:focus{
      border-color:var(--purple);
      box-shadow:0 0 0 3px rgba(200,162,200,.25);
    }
    .footer-subscribe button{
      padding:10px 16px; border:0; border-radius:12px;
      background:#fff; color:var(--text); font-weight:700; cursor:pointer;
      box-shadow:0 8px 18px rgba(0,0,0,.06);
      transition:transform .02s ease;
    }
    .footer-subscribe button:active{ transform:translateY(1px); }

    .footer-bottom{
      background:var(--purple);
      color:#fff;
      padding:12px 16px;
      display:flex;
      align-items:center;
      justify-content:center;
      gap:16px;
      flex-wrap:wrap;
      text-align:center;
      margin-left: calc(50% - 50vw);
      margin-right: calc(50% - 50vw);
    }
    .footer-bottom p{ margin:0; }
    .footer-bottom a{ color:#fff; text-decoration:none; }
    .footer-bottom a:hover{ text-decoration:underline; }
    .legal{ display:inline-flex; align-items:center; justify-content:center; gap:12px; }

    @media (max-width: 900px){
      .footer-grid{ grid-template-columns:1fr 1fr; }
    }
    @media (max-width: 560px){
      .footer-grid{ grid-template-columns:1fr; }
      .footer-subscribe{ grid-template-columns:1fr; }
      .footer-bottom{ flex-direction:column; gap:6px; }
    }
  </style>
</head>

<body>
  <!-- Footer content -->
  <footer class="site-footer" role="contentinfo">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-col">
          <div class="footer-brand">
            <span class="paw">🐾</span>
            <span class="name">Safe <span class="highlight">Paws</span></span>
          </div>
          <p class="footer-about">
            SafePaws connects pet owners with caring, trusted sitters.
            Simple bookings, verified reviews, and friendly support.
          </p>
          <div class="footer-social">
            <a href="#">📸</a>
            <a href="#">👍</a>
            <a href="mailto:support@safepaws.com">✉️</a>
          </div>
        </div>

        <nav class="footer-col">
          <h4>Quick Links</h4>
          <ul class="footer-list">
            <li><a href="index.html">Home</a></li>
            <li><a href="about_us.html">About Us</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="sitters.html">View Sitters</a></li>
            <li><a href="register_sitter.html">Become a Sitter</a></li>
            <li><a href="contact_us.html">Contact Us</a></li>
            <li><a href="login.html">Login</a></li>
          </ul>
        </nav>

        <div class="footer-col">
          <h4>Contact</h4>
          <ul class="footer-list">
            <li>Email: <a href="mailto:support@safepaws.com">support@safepaws.com</a></li>
            <li>Canberra, ACT, Australia</li>
            <li>Mon–Fri · 9:00–17:00</li>
          </ul>
        </div>        
      </div>

      <div class="footer-bottom">
        <p>© <span id="year"></span> SafePaws. All rights reserved.</p>
        <nav class="legal">
          <a href="#">Privacy</a>
          <span>·</span>
          <a href="#">Terms</a>
        </nav>
      </div>
    </div>
  </footer>

  <script>
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
</body>
</html>
