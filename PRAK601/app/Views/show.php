<!DOCTYPE html>
<html class="scroll-smooth">
<head>
    <title>Novi's Profile Website</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-cyan-50 fade-in">
    <nav class="bg-cyan-900 pt-6 pr-6 pl-10 pb-6 text-cyan-50">
        <div class="text-lg font-bold">
            <a href="<?= base_url('/') ?>"
                class="mr-10 <?= (uri_string() == '' || uri_string() == 'home') ? 'underline decoration-3 underline-offset-8 decoration-cyan-50' : '' ?>">Home
            </a>

            <a href="<?= base_url('profile') ?>"
                class="<?= uri_string() == 'profile' ? 'underline decoration-3 underline-offset-8 decoration-cyan-50' : '' ?>">Profile
            </a>
        </div>
    </nav>
    <div class="text-center mt-8 p2 mb-10">
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>