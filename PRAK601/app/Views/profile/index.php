<?= $this->extend('show') ?>
<?= $this->section('content') ?>
<div class="flex-row justify-center mt-6 p-4 bg-gradient-to-r from-cyan-900 to-cyan-600 bg-clip-text text-transparent w-[400px] mx-auto">
    <h2 class="text-4xl font-bold text-center m-4">About me</h2>
</div>
<img src="<?= base_url('images/' . $gambar2) ?>" alt="Gambar Profil" width="200" class="mx-auto rounded-full w-50 h-50 object-cover mb-4 p-2">

<div class="flex justify-center px-4 py-2 mb-6 font-medium">
    <table class="text-left text-lg w-fit ml-16">
        <tbody>
            <tr>
                <td class="pr-4 py-1 text-cyan-950">Nama</td>
                <td class="py-1 text-cyan-950">: <?= $nama ?></td>
            </tr>
            <tr>
                <td class="pr-4 py-1 text-cyan-950">NIM</td>
                <td class="py-1 text-cyan-950">: <?= $nim ?></td>
            </tr>
            <tr>
                <td class="pr-4 py-1 text-cyan-950">Prodi</td>
                <td class="py-1 text-cyan-950">: <?= $prodi ?></td>
            </tr>
            <tr>
                <td class="pr-4 py-1 text-cyan-950">Hobi</td>
                <td class="py-1 text-cyan-950">: <?= $hobi ?></td>
            </tr>
            <tr>
                <td class="pr-4 py-1 text-cyan-950">Skill</td>
                <td class="py-1 text-cyan-950">: <?= $skill ?></td>
            </tr>
            <tr>
                <td class="pr-4 py-1 text-cyan-950">Sosmed</td>
                <td class="py-1 text-cyan-950">: <?= $sosmed ?></td>
            </tr>
            <tr>
                <td class="pr-4 py-1 text-cyan-950">UID HSR</td>
                <td class="py-1 text-cyan-950">: <?= $uid ?></td>
            </tr>
            <tr>
                <td class="pr-4 py-1 text-cyan-950">Fav character</td>
                <td class="py-1 text-cyan-950">: <?= $favorite ?></td>
            </tr>
            <tr>
                <td class="pr-4 py-1 text-cyan-950">Makanan fav</td>
                <td class="py-1 text-cyan-950">: <?= $makanan ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div>
    <div class="mt-8">
        <p class="text-2xl font-bold bg-gradient-to-r from-cyan-600 to-cyan-800 bg-clip-text text-transparent w-[400px] mx-auto">My gallery</p>
        <div class="grid grid-cols-3 gap-4 p-8">
            <img src="<?= base_url('images/foto1.jpg') ?>" alt="Foto 1" class="w-full h-60 object-cover rounded-lg shadow transition-transform duration-300 transform hover:scale-102">
            <img src="<?= base_url('images/foto2.jpg') ?>" alt="Foto 2" class="w-full h-60 object-cover rounded-lg shadow transition-transform duration-300 transform hover:scale-102">
            <img src="<?= base_url('images/foto3.jpg') ?>" alt="Foto 3" class="w-full h-60 object-cover rounded-lg shadow transition-transform duration-300 transform hover:scale-102">

            <img src="<?= base_url('images/foto4.jpg') ?>" alt="Foto 4" class="w-full h-60 object-cover rounded-lg shadow transition-transform duration-300 transform hover:scale-102">
            <img src="<?= base_url('images/foto5.jpg') ?>" alt="Foto 5" class="w-full h-60 object-cover rounded-lg shadow transition-transform duration-300 transform hover:scale-102">
            <img src="<?= base_url('images/foto6.jpg') ?>" alt="Foto 6" class="w-full h-60 object-cover rounded-lg shadow transition-transform duration-300 transform hover:scale-102">
        </div>
    </div>
<footer class="text-center mt-8 mb-10">
    <a href="<?= base_url('/home') ?>"
        class="inline-block text-xl font-bold bg-cyan-800 text-white px-6 py-3 rounded-full transition duration-300
            hover:bg-transparent hover:text-cyan-800 hover:border hover:border-3 hover:border-cyan-800 hover:scale-102">
        Back to home?
    </a>
</footer>
<?= $this->endSection() ?>