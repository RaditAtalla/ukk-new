<?php
require('../functions/database.php');

if (!isset($_SESSION["id_user"])) {
  header("Location: ./login.php");
  exit;
}

if(isset($_POST['verify'])) {
  $id = $_SESSION["id_user"];
  $password = $_POST["password"];

  $query = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $data = mysqli_fetch_assoc($query);

  if(password_verify($password, $data["password"])){
    $_SESSION['verify_edit'] = true;
    $_SESSION['real_pass'] = $password;
    header("Location: ./editProfil.php");
    exit();
  } else{
    echo "<script>alert('password salah!')</script>";
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
  <header class="fixed z-50 flex w-full flex-col">
    <nav class="flex items-center justify-between bg-white px-[20px] py-2 shadow-md shadow-slate-200 md:px-10">
      <div class="flex items-center gap-2">
        <img src="../assets/logo.png" width="55" />
        <div>
          <p class="font-roboto-slab text-[2rem] font-bold leading-none">
            BUKS
          </p>
          <p class="font-roboto-slab text-[1.15rem] font-light leading-none">
            Perpustakaan Digital
          </p>
        </div>
      </div>
      <div>
        <div class="rounded-lg p-3 shadow-md hover:bg-slate-100 md:hidden" onClick="handleHamburger()">
          <i id="hamburger" data-feather="menu"></i>
        </div>
        <div class="hidden gap-5 md:flex">
          <a href="index.php"><i data-feather="home"></i></a>
          <a href="koleksi.php"><i data-feather="heart"></i></a>
          <a href="profil.php"><i data-feather="user"></i></a>
        </div>
      </div>
    </nav>
    <div id="hamburger-dropdown" class="hidden me-1 gap-3 self-end rounded-b-lg border bg-white px-5 py-5 shadow-lg md:hidden">
      <a href="index.php"><i data-feather="home"></i></a>
      <a href="koleksi.php"><i data-feather="heart"></i></a>
      <a href="profil.php"><i data-feather="user"></i></a>
    </div>
  </header>
  <main class="pt-28">
    <form method="post" class="mx-auto mt-[50px] max-w-[482px] rounded-lg border border-slate-200 px-[66px] pb-[100px] pt-[45px] shadow-lg shadow-slate-200">
      <div class="mb-[30px]">
        <h1 class="text-[3rem] font-medium">Verifikasi</h1>
        <p class="text-[1.25rem] text-zinc-500">
          Harap masukkan password sebelum mengubah data
        </p>
      </div>
      <div class="w-full mb-[50px]">
        <p class="text-[1.15rem]">Password</p>
        <div class="flex items-center rounded-lg border border-[#757575] bg-white px-4 py-2">
          <input id="password-input" name="password" type="password" class="w-full text-[1.25rem] text-zinc-500 focus:outline-none">
          <i data-feather="eye-off" class="text-zinc-500" onclick="handleShowPassword()"></i>
        </div>
      </div>
      <button name="verify" type="submit" class="block rounded-md px-[24px] py-[10px] text-center text-[1.25rem] font-medium bg-neutral-950 text-white w-full hover:bg-neutral-900">Masuk</button>
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