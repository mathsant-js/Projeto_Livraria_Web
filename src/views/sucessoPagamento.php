<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Book</title>
    <link rel="stylesheet" href="../assets/scss/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body class="background-dark-light">
    <script>
        function mensagem() {
            Toastify({
                text: "Compra Aprovada!",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    background: "#ef4444",
                },
            }).showToast();
        }
    </script>
    <?php require_once '../components/header.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col justify-content-center text-center mt-5">
                <h1 onload="mensagem()" class="text-warning">Pagamento feito com sucesso!</h1>
            </div>
        </div>
    </div>
    <div class="w-100 mt-5 pt-5">
        <?php require_once '../components/footer.php'; ?>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>