<?php
require('../functions/database.php');

if (!isset($_SESSION["id_user"])) {
  header("Location: ./login.php");
  exit;
}
$id = $_SESSION["id_user"];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
$data = mysqli_fetch_assoc($query);

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

  <main class="pt-[100px] flex flex-col items-center gap-[50px] px-[37px] lg:flex-row lg:items-center lg:justify-center">
    <img src="../assets/<?= $data['cover'] ?>" alt="profil" class="w-[400px] px-[20px]">
    <div class="flex w-full flex-col lg:max-w-[911px] lg:rounded-lg lg:border lg:border-slate-200 lg:px-[90px] lg:py-[45px] lg:shadow-lg lg:shadow-slate-200">
      <div class="mb-[50px] flex flex-col lg:flex-row-reverse lg:items-center lg:justify-between">
        <a href="../functions/logout.php" class="flex items-center gap-[10px]">
          <i data-feather="log-in" style="transform: rotate(180deg);" class="text-zinc-500"></i>
          <p>Log out</p>
        </a>
        <h1 class="text-[3rem] font-medium">Data akun</h1>
      </div>
      <div class="mb-[20px] flex flex-col gap-[20px] lg:flex-row lg:flex-wrap">
        <div class="lg:w-[350px] flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
          <label for="" class="text-[1.15rem]">Username</label>
          <input type="text" value=<?= $data["username"] ?> disabled class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
        </div>
        <div class="lg:w-[350px] w-full sm:mb-0">
          <p class="text-[1.15rem]">Password</p>
          <div class="flex items-center rounded-lg border border-[#757575] bg-white px-4 py-2">
            <input id="password-input" value="********" disabled type="password" class="w-full text-[1.25rem] text-zinc-500 focus:outline-none">
          </div>
        </div>
        <div class="lg:w-[350px] flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
          <label for="" class="text-[1.15rem]">Nama Lengkap</label>
          <input type="text" value=<?= $data["nama_lengkap"] ?> disabled class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
        </div>
        <div class="lg:w-[350px] flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
          <label for="" class="text-[1.15rem]">Alamat</label>
          <input type="text" value=<?= $data["alamat"] ?> disabled class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
        </div>
        <div class="lg:w-[350px] flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
          <label for="" class="text-[1.15rem]">Email</label>
          <input type="text" value=<?= $data["email"] ?> disabled class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
        </div>
        <div class="lg:w-[350px] lg:self-end">
          <a href="verifikasi.php" class="block rounded-md px-[24px] py-[10px] text-center text-[1.25rem] font-medium bg-neutral-950 text-white w-full hover:bg-neutral-900">Edit</a>
        </div>
      </div>
    </div>
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