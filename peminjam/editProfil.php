<?php
require('../functions/database.php');

if (!isset($_SESSION["id_user"]) && !isset($_SESSION["verify_edit"])) {
  header("Location: ./login.php");
  exit;
}

$id = $_SESSION["id_user"];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id = $id ");
$data = mysqli_fetch_assoc($query);

if (isset($_POST["edit"])) {
  $username = $_POST["username"];
  $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
  $nama_lengkap = $_POST["nama_lengkap"];
  $alamat = $_POST["alamat"];
  $email = $_POST["email"];

  $target_dir = "../assets/uploads/";
  $file_basename = basename($_FILES['cover']['name']);
  $target_file = $target_dir . $file_basename;
  $uploadOK = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["cover"]["tmp_name"]);
  if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  if ($_FILES["cover"]["size"] > 2097152) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["cover"]["name"])) . " has been uploaded.";
      $update = mysqli_query($conn, "UPDATE user SET username = '$username', password = '$password', nama_lengkap = '$nama_lengkap', alamat = '$alamat', email = '$email', cover = '$file_basename', coverExt = '$imageFileType' WHERE id = $id");
      if ($update) {
        echo "<script>alert('data diubah'); window.location.href = './profil.php'</script>";
      } else {
        echo "<script>alert('ubah data gagal')</script>";
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
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
    <div class="px-[20px] sm:mx-auto sm:block sm:w-[850px] sm:border sm:border-slate-200 sm:px-[66px] sm:py-[45px] sm:shadow-lg sm:shadow-slate-200">
      <h1 class="mb-[60px] text-[3rem] font-medium">Edit akun</h1>
      <form action="" method="post" enctype="multipart/form-data" class="flex flex-wrap items-center sm:gap-[15px]">
        <div class="flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
          <label for="" class="text-[1.15rem]">Username</label>
          <input type="text" name="username" value=<?= $data["username"] ?> class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
        </div>
        <div class="w-full sm:mb-0 mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
          <p class="text-[1.15rem]">Password</p>
          <div class="flex items-center rounded-lg border border-[#757575] bg-white px-4 py-2">
            <input id="password-input" name="password" value=<?= $_SESSION["real_pass"] ?> type="password" class="w-full text-[1.25rem] text-zinc-500 focus:outline-none">
            <i data-feather="eye-off" class="text-zinc-500" onclick="handleShowPassword()"></i>
          </div>
        </div>
        <div class="flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
          <label for="" class="text-[1.15rem]">Nama Lengkap</label>
          <input type="text" name="nama_lengkap" value=<?= $data["nama_lengkap"] ?> class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
        </div>
        <div class="flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
          <label for="" class="text-[1.15rem]">Alamat</label>
          <input type="text" name="alamat" value=<?= $data["alamat"] ?> class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
        </div>
        <div class="flex flex-col gap-[10px] leading-none mb-[20px] w-full sm:mb-0 sm:max-w-[350px]">
          <label for="" class="text-[1.15rem]">Email</label>
          <input type="email" name="email" value=<?= $data["email"] ?> class="w-full rounded-lg border border-[#757575] px-4 py-2 text-[1.25rem] text-zinc-500 focus:outline-none">
        </div>
        <div class="flex flex-col gap-[10px] leading-none w-full lg:w-[350px]">
          <label for="" class="text-[1.15rem]">Foto Profil</label>
          <input type="file" name="cover" required accept=".jpg, .JPG, .jpeg, .JPEG, .png, .PNG" class="rounded-md border border-[#757575] text-[1.25rem] file:me-[20px] file:w-[50%] file:cursor-pointer file:rounded-md file:border-none file:bg-neutral-950 file:px-[20px] file:py-[14px] file:text-white lg:w-[350px]">
        </div>
        <button name="edit" type="post" class="lg:w-[350px] mt-[20px] rounded-md px-[24px] py-[10px] text-center text-[1.25rem] font-medium bg-neutral-950 text-white w-full hover:bg-neutral-900">Simpan</button>
      </form>
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