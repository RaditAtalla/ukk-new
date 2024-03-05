<?php
session_start();

if (!isset($_SESSION["id_user"])) {
  header("Location: ./login.php");
  exit;
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

  <main class="px-[20px] md:px-[37px] pt-[100px]">
    <h2 class="mb-[20px] text-[3rem] font-medium">Sedang dipinjam</h2>
    <div class="flex w-full items-center gap-[5px] rounded-lg border border-slate-200 bg-white px-[20px] py-[15px] shadow-md shadow-slate-200">
      <i data-feather="search" class="text-zinc-500"></i>
      <input type="text" class="w-full text-[1.25rem] text-zinc-500 focus:outline-none" placeholder="Cari buku..">
    </div>
    <div class="mt-[30px] flex flex-wrap items-center justify-center gap-[50px] md:justify-start">
      <div class="w-[300px] rounded-lg border border-slate-200 shadow-md shadow-slate-200">
        <img src="../assets/cover.jpg" alt="cover" class="w-full h-[226px] object-contain">
        <div class="flex flex-col gap-[50px] p-[20px]">
          <div>
            <h2 class="line-clamp-1 text-[1.5rem] font-medium leading-none">Filosofi Terasi</h2>
            <p class="line-clamp-1 text-[1.15rem] text-zinc-500">Henry Manampiring</p>
          </div>
          <div class="flex gap-[8px]">
            <a href="lihatBuku.php" class="rounded-md px-[24px] py-[10px] text-center text-[1.25rem] font-medium bg-neutral-950 text-white w-full hover:bg-neutral-900">Lihat</a>
            <button class="rounded-md border-2 border-neutral-950 p-[10px] hover:bg-slate-100"><i data-feather="heart"></i></button>
          </div>
        </div>
      </div>
    </div>
    <h2 class="mb-[20px] mt-[50px] text-[3rem] font-medium">Disukai</h2>
    <div class="flex w-full items-center gap-[5px] rounded-lg border border-slate-200 bg-white px-[20px] py-[15px] shadow-md shadow-slate-200">
      <i data-feather="search" class="text-zinc-500"></i>
      <input type="text" class="w-full text-[1.25rem] text-zinc-500 focus:outline-none" placeholder="Cari buku..">
    </div>
    <div class="mt-[30px] flex flex-wrap items-center justify-center gap-[50px] md:justify-start">
      <div class="w-[300px] rounded-lg border border-slate-200 shadow-md shadow-slate-200">
        <img src="../assets/cover.jpg" alt="cover" class="w-full h-[226px] object-contain">
        <div class="flex flex-col gap-[50px] p-[20px]">
          <div>
            <h2 class="line-clamp-1 text-[1.5rem] font-medium leading-none">Filosofi Terasi</h2>
            <p class="line-clamp-1 text-[1.15rem] text-zinc-500">Henry Manampiring</p>
          </div>
          <div class="flex gap-[8px]">
            <a href="lihatBuku.php" class="rounded-md px-[24px] py-[10px] text-center text-[1.25rem] font-medium bg-neutral-950 text-white w-full hover:bg-neutral-900">Lihat</a>
            <button class="rounded-md border-2 border-neutral-950 p-[10px] hover:bg-slate-100"><i data-feather="heart"></i></button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
    feather.replace();
  </script>
</body>

</html>