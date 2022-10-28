<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
        <link rel="stylesheet" href="styles.css"
    </head>
    <body>
        <header>
        <nav>
            <!-- Votre menu de navigation ici -->
        </nav>
        </header>
        <main>
            <?php require __DIR__ . "/{$cheminVueBody}";?>
        </main>
        <footer>
        </footer>
    </body>
</html>