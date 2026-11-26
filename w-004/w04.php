<?php
$pageTitle = "หน้าแรก - MyWebsite";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแรก - My Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Kanit', 'sans-serif'], }, colors: { primary: '#4f46e5', secondary: '#64748b', } } }
        }
    </script>
</head>
<body class="bg-slate-200 text-slate-800 flex flex-col min-h-screen">
    <div class="flex flex-col">
        <h1>w04</h1>
        <?php
            echo "User Agent ".$_SERVER["HTTP_USER_AGENT"]."<br>";
            echo "Host ".$_SERVER["HTTP_HOST"]."<br>";
            echo "Server Sofware ".$_SERVER["SERVER_SOFTWARE"]."<br>";
        ?>
    </div>        
<?php
include 'includes/footer.php';
?>

</body>
</html>