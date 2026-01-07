<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= base_url('assets2/img/kasir.png') ?>">
    <title>Login - SPH Ekstrakurikuler</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <style>
        body {
            background: linear-gradient(to bottom, #FFF8E1, #ffffff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Montserrat', sans-serif;
        }

        #auth {
            max-width: 400px;
            width: 100%;
            background: rgba(255, 255, 255, 0.98);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 0px 20px rgba(255, 235, 156, 0.4);
            border: 1px solid #FFE082;
        }

        .auth-logo img {
            max-width: 150px;
            height: auto;
            display: block;
            margin: 0 auto 20px;
            object-fit: contain;
        }

        .form-control {
            border-radius: 30px;
            border: 1px solid #F9D15B;
        }

        .form-control:focus {
            border-color: #F4B400;
            box-shadow: 0 0 5px rgba(244, 180, 0, 0.4);
        }

        .form-control-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #F4B400;
        }

        .btn-primary {
            border-radius: 30px;
            background-color: #F9D15B;
            border: none;
            color: #5D4037;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #FBC02D;
            color: #3E2723;
        }

        .text-gray-600 a {
            color: #F4B400;
            font-weight: 600;
            text-decoration: underline;
        }

        #math-captcha {
            padding: 10px;
            background-color: #FFF9C4;
            border-radius: 8px;
            border: 1px solid #FFF176;
        }

        .btn-primary {
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:active {
            transform: scale(0.96);
        }

        .alert-danger {
            border-color: #FFEE58;
            background-color: #FFF9C4;
            color: #F57F17;
        }

        @media (max-width: 768px) {
            #auth {
                margin: 1rem;
                padding: 30px 20px;
            }
            .auth-logo img {
                max-width: 120px;
            }
        }
    </style>

</head>

<body>
    <div id="auth">
        <h5 class="auth-logo">
            <img src="<?= base_url('assets2/img/kasir.png') ?>" alt="Posyandu Logo">
        </h5>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form id="login-form" action="<?= base_url('login/aksi_login') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="correct_answer" id="correct-answer">
            <input type="hidden" name="math_answer" id="user-answer">

            <div class="form-group position-relative mb-3">
                <input type="email" name="email" class="form-control form-control-lg ps-5" placeholder="Email" required autocomplete="email">
                <i class="bi bi-envelope form-control-icon"></i>
            </div>
            <div class="form-group position-relative mb-3">
                <input type="password" name="pswd" class="form-control form-control-lg ps-5" placeholder="Password" required autocomplete="current-password">
                <i class="bi bi-shield-lock form-control-icon"></i>
            </div>
            <!-- <div class="text-end mt-2">
                <p class="text-gray-600">
                    <a href="<?= base_url('home/resetp') ?>" class="text-decoration-none">Lupa sandi?</a>
                </p>
            </div> -->

            <div class="g-recaptcha mb-3" data-sitekey="6LdWfJErAAAAAKEGQ9kUi0eF2Y3RxPPXoqu8ytdT"></div>

            <div id="math-captcha" class="mt-3" style="display: none;">
                <label id="math-question" class="form-label fw-bold"></label>
                <input type="number" id="math-answer" class="form-control" placeholder="Jawaban Anda">
            </div>

            <button type="button" onclick="validateCaptcha()" class="btn btn-primary btn-block btn-lg shadow-lg mt-4 w-100">Log in</button>
        </form>

        <!-- <div class="text-center mt-4 text-lg fs-6">
            <p class="text-gray-600">Belum memiliki akun? <a href="<?= base_url('register') ?>">Daftar</a></p>
        </div> -->
    </div>

    <script>
        function validateCaptcha() {
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                alert("Please complete the CAPTCHA before submitting.");
            } else {
                document.getElementById('login-form').submit();
            }
        }
    </script>
    <script>
    let correctAnswer;

    function generateMathCaptcha() {
        const a = Math.floor(Math.random() * 10);
        const b = Math.floor(Math.random() * 10);
        const ops = ['+', '-'];
        const op = ops[Math.floor(Math.random() * ops.length)];
        const question = `Berapa hasil dari ${a} ${op} ${b}?`;
        document.getElementById('math-question').innerText = question;
        correctAnswer = op === '+' ? a + b : a - b;
        document.getElementById('correct-answer').value = correctAnswer;
    }

    function validateCaptcha() {
        if (!navigator.onLine) {
            const userAnswer = parseInt(document.getElementById('math-answer').value);
            document.getElementById('user-answer').value = userAnswer;

            if (isNaN(userAnswer) || userAnswer !== correctAnswer) {
                alert("Jawaban soal matematika salah. Silakan coba lagi.");
                generateMathCaptcha();
            } else {
                document.getElementById('login-form').submit();
            }
        } else {
            const response = grecaptcha.getResponse();
            if (response.length === 0) {
                alert("Please complete the CAPTCHA before submitting.");
            } else {
                document.getElementById('login-form').submit();
            }
        }
    }

    window.addEventListener('load', function () {
        if (!navigator.onLine) {
            document.getElementById('math-captcha').style.display = 'block';
            generateMathCaptcha();
        }
    });
</script>

</body>
</html>
