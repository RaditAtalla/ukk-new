<?php
session_start();

if ($_SESSION['akses'] != 'admin') {
  echo "<script>alert('Anda bukan admin!'); window.location.href = '../peminjam/login.php'</script>";
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
  <header>
    <!-- small sidebar -->
    <div class="fixed block w-full xl:hidden">
      <div class="flex items-center justify-between bg-black px-[20px] py-2">
        <div class="flex items-center gap-2">
          <img src="../assets/logo-white.png" alt="Logo" width="55" />
          <div>
            <p class="font-roboto-slab text-[2rem] font-bold leading-none text-white">
              BUKS
            </p>
            <p class="font-roboto-slab text-[1.15rem] font-light leading-none text-white">
              Perpustakaan Digital
            </p>
          </div>
        </div>
        <button onclick="handleHamburger()" class="rounded-lg border-2 border-neutral-800 bg-neutral-900 p-3 hover:border-neutral-700">
          <i data-feather="menu" class="text-white"></i>
        </button>
      </div>
      <div id="hamburger-list" class="hidden flex-col gap-[10px] divide-y divide-neutral-800 rounded-b-lg bg-neutral-900 py-[10px] transition-all">
        <p class="mb-[20px] px-[20px] text-[1.5rem] font-semibold text-white">Admin</p>
        <a href="./laporan.php" class="text-white font-[1.15rem] py-[10px] px-[20px] transition-all cursor-pointer flex gap-2 hover:bg-neutral-800"><i data-feather="grid"></i> Laporan</a>
        <a href="./buku.php" class="text-white font-[1.15rem] py-[10px] px-[20px] transition-all cursor-pointer flex gap-2 hover:bg-neutral-800"><i data-feather="book"></i> Buku</a>
        <a href="./pengguna.php" class="text-white font-[1.15rem] py-[10px] px-[20px] transition-all cursor-pointer flex gap-2 hover:bg-neutral-800"><i data-feather="user"></i> Pengguna</a>
        <a href="./peminjaman.php" class="text-white font-[1.15rem] py-[10px] px-[20px] transition-all cursor-pointer flex gap-2 hover:bg-neutral-800"><i data-feather="log-out" style="transform: rotate(270deg);"></i> Peminjaman</a>
        <a href="./pengembalian.php" class="text-white font-[1.15rem] py-[10px] px-[20px] transition-all cursor-pointer flex gap-2 hover:bg-neutral-800"><i data-feather="log-in" style="transform: rotate(90deg);"></i> Pengembalian</a>
        <a href="../functions/logout.php" class="text-white font-[1.15rem] py-[10px] px-[20px] transition-all cursor-pointer flex gap-2 hover:bg-neutral-800"><i data-feather="log-out"></i> Keluar</a>
      </div>
    </div>

    <!-- XL sidebar -->
    <div class="hidden xl:fixed xl:flex xl:h-screen xl:flex-col xl:bg-black xl:px-[30px] xl:py-[50px]">
      <div class="flex items-center gap-2">
        <img src="../assets/logo-white.png" alt="Logo" width="55" />
        <div>
          <p class="font-roboto-slab text-[2rem] font-bold leading-none text-white">
            BUKS
          </p>
          <p class="font-roboto-slab text-[1.15rem] font-light leading-none text-white">
            Perpustakaan Digital
          </p>
        </div>
      </div>
      <div class="mt-[50px] flex h-screen flex-col justify-between">
        <div class="flex flex-col gap-[20px]">
          <p class="text-[1.5rem] font-semibold text-white">Admin</p>
          <a href="./laporan.php" class="text-white flex gap-2 items-center text-[1.15rem] px-[20px] py-[18px] bg-neutral-800 border border-neutral-700 rounded-lg w-[260px] hover:border-white transition"><i data-feather="grid"></i> Laporan</a>
          <a href="./buku.php" class="text-white flex gap-2 items-center text-[1.15rem] px-[20px] py-[18px] bg-neutral-800 border border-neutral-700 rounded-lg w-[260px] hover:border-white transition"><i data-feather="book"></i> Buku</a>
          <a href="./pengguna.php" class="text-white flex gap-2 items-center text-[1.15rem] px-[20px] py-[18px] bg-neutral-800 border border-neutral-700 rounded-lg w-[260px] hover:border-white transition"><i data-feather="user"></i> Pengguna</a>
          <a href="./peminjaman.php" class="text-white flex gap-2 items-center text-[1.15rem] px-[20px] py-[18px] bg-neutral-800 border border-neutral-700 rounded-lg w-[260px] hover:border-white transition"><i data-feather="log-out" style="transform: rotate(270deg);"></i> Peminjaman</a>
          <a href="./pengembalian.php" class="text-white flex gap-2 items-center text-[1.15rem] px-[20px] py-[18px] bg-neutral-800 border border-neutral-700 rounded-lg w-[260px] hover:border-white transition"><i data-feather="log-in" style="transform: rotate(90deg);"></i> Pengembalian</a>
        </div>
        <a href="../functions/logout.php" class="text-white flex gap-2 items-center text-[1.15rem] px-[20px] py-[18px] bg-neutral-800 border border-neutral-700 rounded-lg w-[260px] hover:border-white transition"><i data-feather="log-out"></i> Keluar</a>
      </div>
    </div>
  </header>

  <main class="pt-[100px] px-[20px] xl:ps-[350px] xl:pt-[50px] flex flex-col items-center gap-[50px] px-[37px] lg:flex-row lg:items-center lg:justify-center">
    <img src="../assets/profil.png" alt="profil" class="w-[400px] px-[20px]">
    <div class="flex w-full flex-col lg:max-w-[911px] lg:rounded-lg lg:border lg:border-slate-200 lg:px-[90px] lg:py-[45px] lg:shadow-lg lg:shadow-slate-200">
      <h1 class="text-[3rem] mb-[50px] font-medium">Data akun</h1>
      <div class="mb-[20px] flex flex-col gap-[20px] lg:flex-row lg:flex-wrap">
        <div class="lg:w-[350px] flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
          <label for="" class="text-[1.15rem]">Username</label>
          <input type="text" class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
        </div>
        <div class="lg:w-[350px] w-full sm:mb-0">
          <p class="text-[1.15rem]">Password</p>
          <div class="flex items-center rounded-lg border border-[#757575] bg-white px-4 py-2">
            <input id="password-input" type="password" class="w-full text-[1.25rem] text-zinc-500 focus:outline-none">
            <i data-feather="eye-off" class="text-zinc-500" onclick="handleShowPassword()"></i>
          </div>
        </div>
        <div class="lg:w-[350px] flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
          <label for="" class="text-[1.15rem]">Nama Lengkap</label>
          <input type="text" class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
        </div>
        <div class="lg:w-[350px] flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
          <label for="" class="text-[1.15rem]">Alamat</label>
          <input type="text" class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
        </div>
        <div class="lg:w-[350px] flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
          <label for="" class="text-[1.15rem]">Email</label>
          <input type="text" class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
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