<html>
    <head></head>

    <body>
        <form action="preview.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>


            <label for="recipient">Destinatario:</label>
            <input type="text" id="recipient" name="recipient" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <select id="topic" name="topic" required>
                <option value="laurea">laurea</option>
                <option value="compleanno">compleanno</option>
                <option value="matrimonio">matrimonio</option>
            </select>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <input type="submit" value="Preview">
        </form>
    </body>
</html>
