<!-- input -->
<div class="flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
  <label for="" class="text-[1.15rem]">Username</label>
  <input type="text" class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
</div>

<!-- Password -->
<div class="w-full sm:mb-0">
  <p class="text-[1.15rem]">Password</p>
  <div class="flex items-center rounded-lg border border-[#757575] bg-white px-4 py-2">
    <input id="password-input" type="password" class="w-full text-[1.25rem] text-zinc-500 focus:outline-none">
    <i data-feather="eye-off" class="text-zinc-500" onclick="handleShowPassword()"></i>
  </div>
</div>

<!-- File input -->
<div class="flex flex-col gap-[10px] leading-none w-full lg:w-[350px]">
  <label for="" class="text-[1.15rem]">Foto Profil</label>
  <input type="file" accept=".jpg, .JPG, .jpeg, .JPEG, .png, .PNG" class="rounded-md border border-[#757575] text-[1.25rem] file:me-[20px] file:w-[50%] file:cursor-pointer file:rounded-md file:border-none file:bg-neutral-950 file:px-[20px] file:py-[14px] file:text-white lg:w-[350px]">
</div>

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
</script>

<!-- Search -->
<div class="flex w-full items-center gap-[5px] rounded-lg border border-slate-200 bg-white px-[20px] py-[15px] shadow-md shadow-slate-200">
  <i data-feather="search" class="text-zinc-500"></i>
  <input type="text" class="w-full text-[1.25rem] text-zinc-500 focus:outline-none" placeholder="Cari buku..">
</div>

<!-- Button -->
<button class="rounded-md px-[24px] py-[10px] text-center text-[1.25rem] font-medium bg-neutral-950 text-white w-full hover:bg-neutral-900">Masuk</button>

<!-- HeartButton -->
<button class="rounded-md border-2 border-neutral-950 p-[10px] hover:bg-slate-100"><i data-feather="heart"></i></button>

<!-- Navbar -->
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
        <i data-feather="home"></i>
        <i data-feather="heart"></i>
        <i data-feather="user"></i>
      </div>
    </div>
  </nav>
  <div id="hamburger-dropdown" class="hidden me-1 gap-3 self-end rounded-b-lg border bg-white px-5 py-5 shadow-lg md:hidden">
    <i data-feather="home"></i>
    <i data-feather="heart"></i>
    <i data-feather="user"></i>
  </div>
</header>