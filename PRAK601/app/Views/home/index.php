<?= $this->extend('show') ?>
<?= $this->section('content') ?>

<div class="flex-row justify-center mt-6 p-4 bg-gradient-to-r from-cyan-900 to-cyan-600 bg-clip-text text-transparent w-[400px] mx-auto">
    <h1 class="text-5xl font-bold text-center mt-8">Welcome</h1>
    <h2 class="text-3xl font-bold text-center mt-4 mb-6">to Novi's Profile Website</h2>
</div>

<div>
    <div class="mt-4">
        <img src="<?= base_url('images/' . $gambar) ?>" alt="Foto Profil" class="mx-auto rounded-full w-60 h-60 object-cover">
    </div>
    <p class="text-2xl font-semibold mt-4 text-cyan-950"><?= $nama ?></p>
    <p class="text-xl mt-2 text-cyan-950"><?= $nim ?></p>
</div>
<footer class="text-center mt-14 mb-10">
    <a href="<?= base_url('/profile') ?>"
        class="inline-block text-xl font-bold bg-cyan-800 text-white px-6 py-3 rounded-full transition duration-300
            hover:bg-transparent hover:text-cyan-800 hover:border hover:border-3 hover:border-cyan-800 hover:scale-102">
        Go to next page?
    </a>
</footer>

<?= $this->endSection() ?>