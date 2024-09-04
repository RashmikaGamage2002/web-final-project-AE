<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Niwahana</title>
    <link rel="stylesheet" href="Login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>

  <header class="header" data-header>

    <div class="overlay" data-overlay></div>

    <div class="header-top">
    &nbsp; </div>

    <div class="header-bottom">
      <div class="container">

        <a href="index.php" class="logo">
          <img src="images/logo.png" alt="NIWAHANA logo">
        </a>

        <nav class="navbar" data-navbar>

          <div class="navbar-top">

            <a href="#" class="logo">
              <img src="images/logo.png" alt="NIWAHANA logo">
            </a>

            <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>

          <div class="navbar-bottom">
            <ul class="navbar-list">

              <li>
                <a href="index.php" class="navbar-link" data-nav-link>Home</a>
              </li>

              <li>
                <a href="#contact" class="navbar-link" data-nav-link>Contact</a>
              </li>

            </ul>
          </div>

        </nav>

    </div>

  </header>



    <main>
      <article>
        <section class="sign-up">
          <div class="Login">
            <form action="">
              <h1>Login</h1>
              <div class="input-box">
                <input type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
              </div>
              <div class="input-box">
                <input type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt' ></i>
              </div>
              <div class="remember-forgot">
                <label><input type="checkbox"><b>Remember Me</b></label>
                <a><b>Forgot Password</b></a>
              </div>
              <button type="submit" class="btn"><b><a href="BUY.php">Login</a></b></button>
              
            </form>
          </div>
        </section>
        
      

   

  <!-- 
        - #CTA
      -->

      <section class="cta">
        <div class="container">

          <div class="cta-card">
            <div class="card-content">
              <h2 class="h2 card-title">Looking for a dream home?</h2>

              <p class="card-text">We can help you realize your dream of a new home</p>
            </div>

          </div>

        </div>
      </section>

    </article>
  </main>

   <!-- 
    - #FOOTER
  -->

  <footer class="footer" id="contact">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <div   class="logo">
            <img src="images/logo-light.png" alt="NIWAHANA logo">
          </div>

          <p class="section-text">
          Choose Niwahana constructions for your house construction needs and experience the excellence that has earned us the reputation of being the best house building contractor in Sri Lanka
          </p>

          <ul class="contact-list">

            <li>
                <ion-icon name="location-outline"></ion-icon>
                <address>505/A, Makumbura,Homagama,Sri Lanka</address>
              </a>
            </li>

            <li>
                <ion-icon name="call-outline"></ion-icon>
                <span>+94771234567</span>
              </a>
            </li>

            <li>
              <a href="mailto:niwahanaconstruction@gmail.com" class="contact-link">
                <ion-icon name="mail-outline"></ion-icon>
                <span>niwahanaconstruction@gmail.com</span>
              </a>
            </li>

          </ul>

  
        </div>

        

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          2024 Group AE. All Rights Reserved
        </p>

      </div>
    </div>

  </footer>
  
</body>

</html>
