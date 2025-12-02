
<?php require "vendor/autoload.php"; ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Invia una cartolina</title>

        <!-- Bootstrap CSS -->
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        <div class="container">
            <h1>POSTCARD SERVICE</h1>

            <h2>Invia una cartolina via e-mail</h2>

            <form action="preview.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Il tuo nome</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="recipient" class="form-label">Il nome del destinatario</label>
                    <input type="text" class="form-control" id="recipient" name="recipient">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Indirizzo e-mail del destinatario</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Il messaggio da inviare</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <select name="topic" class="form-select" aria-label="Che tipo di cartolina vuoi inviare?">
                        <option selected>Che tipo di cartolina vuoi inviare?</option>

                        <option value="laurea">Laurea</option>
                        <option value="compleanno">Compleanno</option>
                        <option value="matrimonio">Matrimonio</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Guarda la preview</button>

            </form>

            <!-- Bootstrap JS and dependencies (Optional) -->
            <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        </div>

    </body>
</html>
