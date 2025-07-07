<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ikhwan Ashshafa | Profil</title>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Outfit', sans-serif;
    }

    body {
      background: linear-gradient(to right, #1f1c2c, #928dab);
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 80px;
    }

    .card {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.2);
      border-radius: 20px;
      padding: 40px;
      max-width: 450px;
      width: 100%;
      text-align: center;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      animation: fadeIn 1.2s ease;
    }

    .card img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #fff;
      margin-bottom: 20px;
    }

    h1 {
      font-size: 2rem;
      margin-bottom: 10px;
    }

    p {
      font-size: 1.1rem;
      margin-bottom: 6px;
      opacity: 0.9;
    }

    .social-links {
      margin-top: 20px;
    }

    .social-links a {
      color: white;
      margin: 0 10px;
      text-decoration: none;
      font-size: 1.3rem;
      transition: color 0.3s;
    }

    .social-links a:hover {
      color: #f9c80e;
    }

    footer {
      margin-top: 40px;
      font-size: 0.85rem;
      color: #e0e0e0;
      opacity: 0.7;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 480px) {
      .card {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
  <div class="card">
    <img src="https://i.pravatar.cc/150?u=ikhwanashshafa" alt="Foto Profil Ikhwan Ashshafa">
    <h1>Ikhwan Ashshafa</h1>
    <p><strong>NIM:</strong> 23050748</p>
    <p>Mahasiswa Ilmu Komputer</p>
    <p>Universitas Yatsi Madani</p>

    <div class="social-links">
      <a href="https://wa.me/6281234567890" target="_blank" title="WhatsApp">📱</a>
      <a href="mailto:ikhwan@example.com" title="Email">📧</a>
      <a href="https://instagram.com/ikhwan_ashshafa" target="_blank" title="Instagram">📸</a>
    </div>
  </div>

  <footer>
    © 2025 Ikhwan Ashshafa | All rights reserved.
  </footer>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\blajar_laravel\resources\views/profil.blade.php ENDPATH**/ ?>