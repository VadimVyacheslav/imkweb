<?php
session_start();
include 'konek.php'; // Koneksi ke database

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.html"); // Redirect ke halaman login
    exit();
}

// Ambil data pengguna dari database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($query);
$user = $result->fetch_assoc();
?>

<html>
<head>
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="css/profil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/sidebar.css">
</head>

<body>
    
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Burger Icon with Bookroom text -->
    <i class="fa-solid fa-angles-right burger-icon">
      <span class="bookroom-text">
        <span class="letter1">B</span>
        <span class="letter2">O</span>
        <span class="letter3">O</span>
        <span class="letter4">K</span>
        <span class="letter1">R</span>
        <span class="letter2">O</span>
        <span class="letter3">O</span>
        <span class="letter4">M</span>
        <!--<i class="fa-solid fa-angles-left"></i>-->
      </span>
      
    </i>

    <ul class="menu">
      <a href="home.html" class="link"><li><i class="fas fa-home"></i> <span>Home</span></li></a>
      <a href="category.html" class="link"><li><i class="fa-solid fa-book"></i> <span>Category</span></li></a>
      <a href="search.html" class="link"><li><i class="fas fa-search"></i><span>Search</span></li></a>
    </ul>
    <ul class="menu bottom-menu">
      <a href="profil.html" class="link"><li class="profile-menu"><i class="fas fa-user"></i> <span>Profile</span></li></a>
      <a href="signin.html" class="link"><li class="login-menu"><i class="fas fa-sign-in-alt"></i> <span>Login</span></li></a>
    </ul>
  </div>

  <!-- main content -->

<main class="main-content">
            <header class="header">
                <div class="header-left">
                    <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
                    <p>Tue, 07 April 2024</p>
                </div>
                <div class="header-right">
                    <i class="fas fa-search search-right"><input  type="text" placeholder="Search"></i>
                    <div class="notif"><i class="fa-regular fa-bell isi-notif"></i></div>
                    <div class="profil"><img class="profile-pic" src="img/logo-universitas-gunadarma.png" alt="Profile Picture"></div>
                </div>
            </header>

            <section class="profile">

              <div class="jeda">
                <img class="gap-pic" src="img/gap.png" alt="gap">
              </div>

                <div class="profile-header">
                  <div class="profile-kiri">
                    <img class="profile-avatar" src="img/logo-universitas-gunadarma.png" alt="Avatar">
                    <div class="profile-info">
                      <h2><?php echo htmlspecialchars($user['name']); ?></h2>
                      <p><?php echo htmlspecialchars($user['email']); ?></p>
                    </div>
                  </div> 
                </div>
                <form class="profile-form" action="edit.php" method="POST">
                    <div class="form-row">
                        <label>Nama</label>
                        <input type="text" name="name" placeholder="Nama">
                    </div>
                    <div class="form-row">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="<?php echo htmlspecialchars($user['email']); ?>">
                    </div>
                    <div class="form-row">
                        <label>Password</label>
                        <input type="text" name="password" placeholder="********">
                    </div>
                    <div class="button-edit">
                    <button type="submit">Edit</button>
                    </div>
                </form>

                <h3>My Email Address</h3>
                <div class="email-section">
                    <div>
                      <i class="fa-solid fa-envelope envelope-icon"></i>
                    </div>
                    <div class="email">
                        <p class="email-address"><?php echo htmlspecialchars($user['email']); ?></p>
                        <p class="email-time">1 month ago</p>
                    </div>
                </div>
                <div class="button-edit">
                    <a href="logout.php"><button type="submit">LOGOUT</button></a>
                </div>
        </main>

    <script src="js/sidebar.js"></script>
</body>


</html>
