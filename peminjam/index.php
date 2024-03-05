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

  <main class="md:px-10 xl:flex xl:items-start xl:gap-[50px] pt-28">
    <img src="../assets/banner.png" alt="banner" class="hidden w-[300px] border border-slate-200 object-contain shadow-lg shadow-slate-200 xl:inline-block">
    <div>
      <div class="mb-[50px] flex w-full flex-col gap-[10px] px-[20px] sm:px-0 lg:flex-row">
        <div class="flex w-full items-center gap-[5px] rounded-lg border border-slate-200 bg-white px-[20px] py-[15px] shadow-md shadow-slate-200">
          <i data-feather="search" class="text-zinc-500"></i>
          <input type="text" class="w-full text-[1.25rem] text-zinc-500 focus:outline-none" placeholder="Cari buku..">
        </div>
        <div class="relative flex flex-col">
          <button onclick="handleKategori()" class="lg:w-[300px] shadow-lg shadow-slate-200 relative flex items-center justify-between rounded-lg border border-slate-200 p-[20px] hover:bg-slate-100">
            <p class="text-[1.15rem] text-zinc-500">Kategori</p>
            <i data-feather="triangle" class="text-zinc-500 w-[16px]" style="transform: rotate(180deg);"></i>
          </button>
          <div id="kategori-list" class="hidden absolute top-[70px] w-full flex-col rounded-b-lg rounded-t-none border border-t-0 border-slate-200 bg-white py-[20px] shadow-lg shadow-slate-100">
            <button class="px-[20px] py-[10px] text-[1.15rem] hover:bg-slate-100 ">Filsafat</button>
            <button class="px-[20px] py-[10px] text-[1.15rem] hover:bg-slate-100 ">Fiksi</button>
            <button class="px-[20px] py-[10px] text-[1.15rem] hover:bg-slate-100 ">Self Development</button>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap items-center  justify-center gap-[50px]">
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
    </div>
  </main>

  <script>
    function handleHamburger() {
      let hamburgerItem = document.getElementById("hamburger-dropdown")

      if (hamburgerItem.classList.contains("flex")) {
        hamburgerItem.classList.remove("flex")
        hamburgerItem.classList.add("hidden")
        return
      }

      hamburgerItem.classList.remove("hidden")
      hamburgerItem.classList.add("flex")
    }

    function handleKategori() {
      let kategoriList = document.getElementById("kategori-list")

      if (kategoriList.classList.contains("flex")) {
        console.log("press")
        kategoriList.classList.remove("flex")
        kategoriList.classList.add("hidden")
        return
      }

      kategoriList.classList.remove("hidden")
      kategoriList.classList.add("flex")
    }

    feather.replace();
  </script>
</body>

</html>