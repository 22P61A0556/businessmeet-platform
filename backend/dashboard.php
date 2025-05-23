<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_name'])) {
    header("Location: ../login.html");
    exit;
}

// Store name in a local variable for display
$userName = htmlspecialchars($_SESSION['user_name']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BusinessMeet</title>
  <style>
    /* Reset */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    html, body {
  height: 100%;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: url("https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80") no-repeat center center fixed;
  background-size: cover;
  color: #333;
  line-height: 1.6;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

    /* Header */
     header {
      background-color: #12486e;
      color: white;
      padding: 30px 10px;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .header-title {
  color: white;
  font-family: 'Playfair Display', serif;
  font-size: 3.2rem;
  font-weight: 700;
  margin-bottom: 8px;
  letter-spacing: 1.2px;
}
    .header-caption {
      font-size: 1.2rem;
      font-weight: 300;
      opacity: 0.9;
    }
    /* Navigation */
    nav {
      background-color: #ffffff;
      padding: 15px 30px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    nav a {
      margin: 0 15px;
      text-decoration: none;
      color: #12486e;
      font-weight: bold;
      transition: color 0.3s;
    }
    nav a:hover {
      color: #1da1f2;
    }
    /* Main Container */
    .container {
      max-width: 600px;
      margin: 30px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    /* Textarea */
    textarea {
      width: 100%;
      height: 120px;
      border-radius: 8px;
      padding: 12px;
      border: 1px solid #ccc;
      font-size: 1rem;
      transition: border-color 0.3s;
    }
    textarea:focus {
      border-color: #1da1f2;
      outline: none;
    }
    /* Post Button */
    .post-button {
      background-color: #12486e;
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 25px;
      margin-top: 10px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s;
    }
    .post-button:hover {
      background-color: #1da1f2;
    }
    /* Post Card */
    .post-card {
      background: #fff;
      border: 1px solid #ddd;
      padding: 15px;
      border-radius: 8px;
      margin-top: 20px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .post-author {
      font-weight: bold;
      color: #12486e;
    }
    .post-time {
      color: gray;
      font-size: 0.9em;
    }
    /* Footer */
    footer {
      background: #182848;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 0.9rem;
      user-select: none;
    }
    footer p {
      margin-bottom: 10px;
    }
    .social-icons {
      display: flex;
      justify-content: center;
      gap: 1.5rem;
      font-size: 1.5rem;
    }
    .social-icons a {
      color: white;
      transition: color 0.3s ease;
      text-decoration: none;
    }
    .social-icons a:hover {
      color: #ff416c;
    }
    /* Responsive */
    @media (max-width: 600px) {
      .container {
        padding: 20px;
      }
      .header-title {
        font-size: 2.5rem;
      }
      .header-caption {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>
  <header>
    <h1 class="header-title">BusinessMeet</h1>
    <p class="header-caption">Where Entrepreneurs and Investors Meet</p>
     <p>Hello, <strong><?php echo $userName; ?></strong>!</p>
  </header>

  <nav>
    <div>
      <a href="index.html">Home</a>
      <a href="profile.html">Profile</a>
      <a href="chat.html">Messages</a>
    </div>
  </nav>

  <div class="container">
    <div class="greeting" id="userGreeting"></div>

    <h2>Share Your Business Idea or Suggestion</h2>
    <form action="post_message.php" method="POST">
      <textarea name="message" placeholder="What's your business idea?" required></textarea><br>
      <button type="submit" class="post-button">Post</button>
    </form>

    <!-- Sample Post -->
    <div class="post-card">
      <div class="post-author">John Doe <span class="post-time">- 2 hours ago</span></div>
      <p>Looking for an investor for my EdTech startup. DM me!</p>
    </div>

    <div class="post-card">
      <div class="post-author">Investor Jane <span class="post-time">- 4 hours ago</span></div>
      <p>Open to funding scalable logistics projects. Let’s connect.</p>
    </div>
  </div>

  <footer>
    <p>© 2025 BusinessMeet. All rights reserved.</p>
    <div class="social-icons" aria-label="Social Media Links">
      <a href="#" aria-label="Facebook" target="_blank" rel="noopener noreferrer">📘</a>
      <a href="#" aria-label="Twitter" target="_blank" rel="noopener noreferrer">🐦</a>
      <a href="#" aria-label="Instagram" target="_blank" rel="noopener noreferrer">📸</a>
      <a href="#" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">💼</a>
    </div>
  </footer>

  <script>
    // Display hello message if user name is stored in session/localStorage
    const userName = localStorage.getItem('userName');
    if (userName) {
      document.getElementById('userGreeting').textContent = `Hello, ${userName}!`;
    }
  </script>
</body>
</html>
