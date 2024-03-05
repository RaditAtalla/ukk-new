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
  <div id="modal" class="hidden absolute h-screen w-full bg-black bg-opacity-25 flex justify-center items-center z-50">
    <form action="" class="bg-white rounded-lg px-[20px] py-[20px]">
      <i data-feather="x" id="close-button" onclick="handleCloseModal()" class="cursor-pointer"></i>
      <h2 class="mb-[12px] text-[3rem] font-medium">Tersedia di:</h2>
      <div class="mb-[12px] flex items-center justify-between leading-none gap-[30px]">
        <label for="telkom" class="text-[1.5rem]">
          Perpustakaan Telkom
        </label>
        <input type="radio" id="telkom" name="location" class="accent-black" />
      </div>
      <div class="mb-[12px] flex items-center justify-between leading-none gap-[30px]">
        <label for="telkom" class="text-[1.5rem]">
          Perpustakaan Unimed
        </label>
        <input type="radio" id="telkom" name="location" class="accent-black" />
      </div>
      <div class="mb-[12px] flex items-center justify-between leading-none gap-[30px]">
        <label for="telkom" class="text-[1.5rem]">
          Perpustakaan Gadjah Mada
        </label>
        <input type="radio" id="telkom" name="location" class="accent-black" />
      </div>
      <button class="mt-[20px] rounded-md px-[24px] py-[10px] text-center text-[1.25rem] font-medium bg-neutral-950 text-white w-full hover:bg-neutral-900">Reservasi</button>
    </form>
  </div>
  <header class="fixed z-40 flex w-full flex-col">
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

  <main class="flex flex-col px-[20px] pt-[100px] lg:px-[100px]">
    <div class="lg:flex lg:gap-[50px]">
      <div class="mb-[10px] w-full py-[20px] lg:m-0 lg:w-auto lg:p-0">
        <div class="flex h-[400px] justify-center rounded-lg lg:h-[421px] lg:w-[421px]">
          <img src="../assets/cover.jpg" alt="cover">
        </div>
        <p class="hidden text-[1.15rem] font-medium leading-none lg:mt-[20px] lg:block">1.502 orang menyukai buku ini</p>
        <div class="mb-[40px] mt-[20px] hidden lg:flex lg:items-center lg:gap-[10px]">
          <button onclick="handleModal()" class="rounded-md px-[24px] py-[10px] text-center text-[1.25rem] font-medium bg-neutral-950 text-white w-full hover:bg-neutral-900">Pinjam</button>
          <button class="rounded-md border-2 border-neutral-950 p-[10px] hover:bg-slate-100"><i data-feather="heart"></i></button>
        </div>
        <div class="mb-[40px] mt-[20px] hidden gap-[20px] lg:flex">
          <div class="flex flex-col gap-[20px]">
            <div class="flex flex-col gap-[5px]">
              <p class="text-[1.15rem] leading-none text-zinc-500">
                Penerbit
              </p>
              <p class="text-[1.15rem] leading-none">
                Kompas Penerbit Buku
              </p>
            </div>
            <div class="flex flex-col gap-[5px]">
              <p class="text-[1.15rem] leading-none text-zinc-500">
                Tahun Terbit
              </p>
              <p class="text-[1.15rem] leading-none">
                2022
              </p>
            </div>
            <div class="flex flex-col gap-[5px]">
              <p class="text-[1.15rem] leading-none text-zinc-500">
                Jumlah halaman
              </p>
              <p class="text-[1.15rem] leading-none">
                100 Lembar
              </p>
            </div>
          </div>
          <div class="flex flex-col gap-[20px]">
            <div class="flex flex-col gap-[5px]">
              <p class="text-[1.15rem] leading-none text-zinc-500">
                Bahasa
              </p>
              <p class="text-[1.15rem] leading-none">Indonesia</p>
            </div>
            <div class="flex flex-col gap-[5px]">
              <p class="text-[1.15rem] leading-none text-zinc-500">
                Kategori
              </p>
              <p class="text-[1.15rem] leading-none">Filsafat</p>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="mb-[20px] flex justify-between lg:mb-[10px]">
          <p class="text-[1.15rem] font-medium lg:hidden">
            1.502 orang menyukai buku ini
          </p>
          <div class="flex items-center">
            <i data-feather="star"></i>
            <i data-feather="star"></i>
            <i data-feather="star"></i>
            <i data-feather="star"></i>
            <i data-feather="star"></i>
            <p class="ms-[10px] text-[1.15rem]">5</p>
          </div>
        </div>
        <h1 class="text-[3rem] font-semibold leading-none">
          Filosofi Teras
        </h1>
        <p class="text-[1.5rem] text-zinc-500 lg:mb-[20px]">
          Henry Manampiring
        </p>
        <div class="mb-[40px] mt-[20px] flex items-center gap-[10px] lg:hidden">
          <button onclick="handleModal()" class="rounded-md px-[24px] py-[10px] text-center text-[1.25rem] font-medium bg-neutral-950 text-white w-full hover:bg-neutral-900">Pinjam</button>
          <button class="rounded-md border-2 border-neutral-950 p-[10px] hover:bg-slate-100"><i data-feather="heart"></i></button>
        </div>
        <p class="my-[20px] text-[1.15rem] leading-relaxed text-zinc-500">
          Lebih dari 2.000 tahun lalu, sebuah mazhab filsafat menemukan akar
          masalah dan juga solusi dari banyak emosi negatif. Stoisisme, atau
          Filosofi Teras, adalah filsafat Yunani-Romawi kuno yang bisa
          membantu kita mengatasi emosi negatif dan menghasilkan mental yang
          tangguh dalam menghadapi naik-turunnya kehidupan. Jauh dari kesan
          filsafat sebagai topik berat dan mengawang-awang, Filosofi Teras
          justru bersifat praktis dan relevan dengan kehidupan Generasi
          Milenial dan Gen-Z masa kini.
        </p>
        <div class="mb-[40px] mt-[20px] flex gap-[20px] lg:hidden">
          <div class="flex flex-col gap-[20px]">
            <div class="flex flex-col gap-[5px]">
              <p class="text-[1.15rem] leading-none text-zinc-500">
                Penerbit
              </p>
              <p class="text-[1.15rem] leading-none">
                Kompas Penerbit Buku
              </p>
            </div>
            <div class="flex flex-col gap-[5px]">
              <p class="text-[1.15rem] leading-none text-zinc-500">
                Tanggal Terbit
              </p>
              <p class="text-[1.15rem] leading-none">18 Desember 2018</p>
            </div>
            <div class="flex flex-col gap-[5px]">
              <p class="text-[1.15rem] leading-none text-zinc-500">
                Jumlah Halaman
              </p>
              <p class="text-[1.15rem] leading-none">346 Lembar</p>
            </div>
          </div>
          <div class="flex flex-col gap-[20px]">
            <div class="flex flex-col gap-[5px]">
              <p class="text-[1.15rem] leading-none text-zinc-500">
                Bahasa
              </p>
              <p class="text-[1.15rem] leading-none">Indonesia</p>
            </div>
            <div class="flex flex-col gap-[5px]">
              <p class="text-[1.15rem] leading-none text-zinc-500">
                Kategori
              </p>
              <p class="text-[1.15rem] leading-none">Filsafat</p>
            </div>
          </div>
        </div>
        <div>
          <h2 class="text-[1.5rem] font-semibold">Ulasan</h2>
          <div>
            <button onclick="handleReview()" class="mb-[20px] flex max-w-[216px] items-center gap-[10px] rounded-lg border border-slate-100 p-[20px] shadow-lg shadow-slate-100 transition-all">
              <i data-feather="plus" class="text-zinc-500" id="plus"></i>
              <p class="text-[1.15rem] leading-none text-zinc-500" id="text">Tambah Ulasan</p>
            </button>
            <div id="text-area" class="hidden">
              <textarea placeholder="Tambah Ulasan.." class="mb-[10px] h-[260px] w-full rounded-lg border border-zinc-500 bg-zinc-200 p-[30px] text-[1.15rem] text-zinc-500"></textarea>
              <div class="flex items-start justify-between">
                <div>
                  <button id="star-button" onclick="handleDropdown()" class="flex items-center gap-[5px] divide-x divide-zinc-500 rounded-lg border border-zinc-500 bg-zinc-100 p-[10px]">
                    <div class="flex items-center gap-[5px]">
                      <p class="text-[1.15rem] text-zinc-500">5</p>
                      <i data-feather="star" class="text-zinc-500"></i>
                    </div>
                    <i data-feather="chevron-down" class="text-zinc-500"></i>
                  </button>
                  <div id="star-dropdown" class="hidden">
                    <button id="star-button" class="flex items-center gap-[5px] divide-x divide-zinc-500 rounded-lg border border-zinc-500 bg-zinc-100 p-[10px]">
                      <div class="flex items-center gap-[5px]">
                        <p class="text-[1.15rem] text-zinc-500">5</p>
                        <i data-feather="star" class="text-zinc-500"></i>
                      </div>
                    </button>
                    <button id="star-button" class="flex items-center gap-[5px] divide-x divide-zinc-500 rounded-lg border border-zinc-500 bg-zinc-100 p-[10px]">
                      <div class="flex items-center gap-[5px]">
                        <p class="text-[1.15rem] text-zinc-500">4</p>
                        <i data-feather="star" class="text-zinc-500"></i>
                      </div>
                    </button>
                    <button id="star-button" class="flex items-center gap-[5px] divide-x divide-zinc-500 rounded-lg border border-zinc-500 bg-zinc-100 p-[10px]">
                      <div class="flex items-center gap-[5px]">
                        <p class="text-[1.15rem] text-zinc-500">3</p>
                        <i data-feather="star" class="text-zinc-500"></i>
                      </div>
                    </button>
                    <button id="star-button" class="flex items-center gap-[5px] divide-x divide-zinc-500 rounded-lg border border-zinc-500 bg-zinc-100 p-[10px]">
                      <div class="flex items-center gap-[5px]">
                        <p class="text-[1.15rem] text-zinc-500">2</p>
                        <i data-feather="star" class="text-zinc-500"></i>
                      </div>
                    </button>
                    <button id="star-button" class="flex items-center gap-[5px] divide-x divide-zinc-500 rounded-lg border border-zinc-500 bg-zinc-100 p-[10px]">
                      <div class="flex items-center gap-[5px]">
                        <p class="text-[1.15rem] text-zinc-500">1</p>
                        <i data-feather="star" class="text-zinc-500"></i>
                      </div>
                    </button>
                  </div>
                </div>
                <button class="rounded-md px-[24px] py-[10px] text-center text-[1.25rem] font-medium bg-neutral-950 text-white hover:bg-neutral-900">Tambah</button>
              </div>
            </div>
          </div>
          <div class="my-[20px] flex flex-col gap-[20px]">
            <div class="flex flex-col gap-[20px] rounded-lg border border-slate-100 px-[20px] py-[30px] shadow-lg shadow-slate-100">
              <div class="flex items-start justify-between">
                <div class="flex items-center gap-[10px]">
                  <img src="../assets/profil.png" alt="profil" width="50" />
                  <div class="flex flex-col gap-2 leading-none">
                    <p class="text-[1.15rem] font-medium">Raditya A. Rachmadie</p>
                    <p class="text-[1.15rem] text-zinc-500">radit.rchmd</p>
                  </div>
                </div>
                <div class="flex items-center gap-1">
                  <p class="text-[1.15rem] font-medium">5</p>
                  <i data-feather="star"></i>
                </div>
              </div>
              <p class="text-zinc-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum, sunt. Natus cumque delectus nulla. Magni ut non ipsum qui voluptas unde explicabo asperiores totam magnam.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
    function handleReview() {
      let plusIcon = document.getElementById("plus")
      let text = document.getElementById("text")
      let textArea = document.getElementById("text-area")

      if (text.classList.contains("hidden")) {
        text.classList.remove("hidden")
        plusIcon.style.transform = "rotate(90deg)"
        textArea.classList.add("hidden")
        return
      }

      text.classList.add("hidden")
      plusIcon.style.transform = "rotate(45deg)"
      textArea.classList.remove("hidden")

    }

    function handleDropdown() {
      let startBtn = document.getElementById("star-button")
      let starDropdown = document.getElementById("star-dropdown")

      if (!starDropdown.classList.contains("hidden")) {
        starDropdown.classList.add("hidden")
        return
      }

      starDropdown.classList.remove("hidden")
    }

    function handleModal() {
      let modal = document.getElementById("modal")

      if (!modal.classList.contains("hidden")) {
        modal.classList.add("hidden")
        return
      }

      modal.classList.remove("hidden")
    }

    function handleCloseModal() {
      let modal = document.getElementById("modal")

      modal.classList.add("hidden")
    }

    feather.replace();
  </script>
</body>

</html>