<?php
session_start();

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
}

?>

<html lang="fr">
    <head>
        <title>BDE DDOS - Enigme</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
        <!-- Classes scheme: position / color / font / other -->
        <link rel="stylesheet" href="./css/transition-helper.css">
    </head>
    <body>
        <?php if (isset($name)) { ?>
            <div class="fixed pin-t pin-r mt-3 mr-5">
                <span class="py-1 px-4 rounded-full border-2 border-grey-darker bg-white text-grey-darker hover:border-blue hover:bg-blue hover:text-white text-sm font-semibold uppercase tr-c-eio">
                    <?= $name ?>
                </span>
                &nbsp;
                <a href="#"
                   class="py-1 px-4 rounded-full border-2 border-grey-darker bg-white text-grey-darker hover:border-red hover:bg-red hover:text-white text-sm font-semibold uppercase no-underline leading-loose tr-c-eio">
                    Logout
                </a>
            </div>
        <?php } else { ?>
            <a href="#"
               class="fixed pin-t pin-r py-1 px-4 mt-3 mr-5 rounded-full border-2 border-grey-darker bg-white text-grey-darker hover:border-blue hover:bg-blue hover:text-white text-sm font-semibold uppercase no-underline leading-loose tr-c-eio">
                Login
            </a>
        <?php } ?>

        <div class="flex items-center h-screen">
            <div class="w-1/3 ml-auto mr-auto h-64">
                <form action="submit_main.php" class="text-xl text-center">
                    <input type="text" placeholder="Enter code here"
                           class="w-full px-2 border-b-2 border-gray focus:border-blue hover:border-blue leading-loose outline-none tr-bc-eio"
                           required>
                    <br><br>
                    <input type="submit" value="Submit"
                           class="py-2 px-10 rounded-full border-2 border-grey-darker bg-white text-grey-darker hover:border-blue hover:bg-blue hover:text-white cursor-pointer tr-c-eio">
                </form>
            </div>
        </div>
    </body>
</html>