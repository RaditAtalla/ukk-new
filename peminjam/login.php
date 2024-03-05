<?php
require('../functions/database.php');

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

  if (mysqli_num_rows($query) == 1) {
      $user_data = mysqli_fetch_assoc($query);
      echo "<script>console.log($user_data)</script>";

      if (password_verify($password, $user_data['password'])) {
          session_start();
          $_SESSION['id_user'] = $user_data['id'];
          $_SESSION['username'] = $user_data['username'];
          $_SESSION['akses'] = $user_data['akses'];
          
          if ($user_data['akses'] == 'admin') {  
              header("Location:../admin/laporan.php");
              exit();
          } elseif ($user_data['akses'] == 'petugas') { 
              header("Location:../petugas/laporan.php");
              exit();
          } else {
              header("Location:./index.php");
              exit();
          }
      } else {
          echo "<script>alert('Password salah'); window.location.href='./login.php';</script>";
          exit();
      }
  } else {
      echo "<script>alert('Username tidak ditemukan'); window.location.href='./login.php';</script>";
      exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Roboto font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <!-- Roboto slab font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            "roboto-slab": ["Roboto Slab"],
            roboto: ["Roboto"],
          },
          colors: {
            black: "#0E0E0E",
          },
        },
      },
    }
  </script>
  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  <title>Buks</title>
</head>

<body class="font-roboto">
  <form action="" method="post" class="px-[20px] mt-[50px] sm:mx-auto sm:block sm:w-[500px] sm:self-center sm:rounded-lg sm:border sm:border-slate-200 sm:px-[66px] sm:py-[45px] sm:shadow-lg sm:shadow-slate-200">
    <h1 class="mb-[60px] text-[3rem] font-medium">Masuk</h1>
    <div class="mb-[50px]">
      <div class="flex flex-col gap-[10px] leading-none">
        <label for="" class="text-[1.15rem]">Username</label>
        <input type="text" name="username" class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
      </div>
      <div class="w-full sm:mb-0">
        <p class="text-[1.15rem]">Password</p>
        <div class="flex items-center rounded-lg border border-[#757575] bg-white px-4 py-2">
          <input id="password-input" name="password" type="password" class="w-full text-[1.25rem] text-zinc-500 focus:outline-none">
          <i data-feather="eye-off" class="text-zinc-500" onclick="handleShowPassword()"></i>
        </div>
      </div>
      <p class="text-[1.25rem] text-zinc-500">Belum punya akun? <a href="register.php" class="underline">Daftar</a></p>
    </div>
    <div>
      <button name="login" class="block rounded-md px-[24px] py-[10px] text-center text-[1.25rem] font-medium bg-neutral-950 text-white w-full hover:bg-neutral-900">Masuk</button>
    </div>
  </form>
  <script>
    function handleShowPassword() {
      let passwordInput = document.getElementById("password-input")

      if (passwordInput.getAttribute("type") == "text") {
        passwordInput.setAttribute("type", "password")
        return
      }

      passwordInput.setAttribute("type", "text")
      console.log("ok")
    }

    feather.replace();
  </script>
</body>

</html>