<?php
require('../functions/database.php');

if (isset($_POST['daftar'])) {

  $nama_lengkap = $_POST['nama_lengkap'];
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $akses = "peminjam";

  $check_query = mysqli_query($conn, "SELECT * FROM user WHERE username='$nama_pengguna' OR email='$email'");
  if (mysqli_num_rows($check_query) > 0) {
    echo "<script>alert('Username atau email sudah dipakai!'); window.location.href='./register.php';</script>";
    exit();
  } else {
    $register_query = mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password', '$email', '$nama_lengkap', '$alamat', '$akses', 'blank_profile', 'png')");

    if ($register_query) {
      echo "<script>window.location.href='./login.php';</script>";
      exit();
    } else {
      echo "<script>alert('Regsistrasi gagal'); window.location.href='./register.php';</script>";
      exit();
    }
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
            "roboto": ["Roboto"],
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
  <main class=" px-[20px] mt-[50px] sm:mx-auto sm:block sm:w-[850px] sm:border sm:border-slate-200 sm:px-[66px] sm:py-[45px] sm:shadow-lg sm:shadow-slate-200">
    <h1 class="mb-[60px] text-[3rem] font-medium">Daftar</h1>
    <form action="" method="post" class="flex flex-wrap items-center sm:gap-[15px]">
      <div class="flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
        <label for="" class="text-[1.15rem]">Username</label>
        <input type="text" name="username" class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
      </div>
      <div class="w-full sm:mb-0 mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
        <p class="text-[1.15rem]">Password</p>
        <div class="flex items-center rounded-lg border border-[#757575] bg-white px-4 py-2">
          <input id="password-input" name="password" type="password" class="w-full text-[1.25rem] text-zinc-500 focus:outline-none">
          <i data-feather="eye-off" class="text-zinc-500" onclick="handleShowPassword()"></i>
        </div>
      </div>
      <div class="flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
        <label for="" class="text-[1.15rem]">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
      </div>
      <div class="flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
        <label for="" class="text-[1.15rem]">Alamat</label>
        <input type="text" name="alamat" class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
      </div>
      <div class="flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
        <label for="" class="text-[1.15rem]">Email</label>
        <input type="email" name="email" class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
      </div>
      <button name="daftar" type="submit" class="mt-[20px] rounded-md px-[24px] py-[10px] text-center text-[1.25rem] font-medium bg-neutral-950 text-white w-full hover:bg-neutral-900">Masuk</button>
      <p class="text-[1.25rem] text-zinc-500">Sudah punya akun? <a href="login.php" class="underline">Login</a></p>
    </form>
  </main>
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