<?php
$pageTitle = "หน้าแรก - MyWebsite";
include 'includes/header.php';
include 'includes/navbar.php';
$user = "Kittiwin Namwong";
$program = "Information Technology";
$myURL = 
$expected_grade = array(
    array('code' => '9022062-65', 'grade' => 'A'),
    array('code' => '9023021-54', 'grade' => 'A'),
    array('code' => '0265011-65', 'grade' => 'A'),
    array('code' => '0165007-65', 'grade' => 'A'),
    array('code' => '9022132-65', 'grade' => 'A'),
    array('code' => '9023121-55', 'grade' => 'A')
);
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
        <h2>Program : <?php echo "$program"; ?></h2>
        <strong><?php echo "$user"; ?></strong>
        <a href="<?php echo "$myURL"; ?>">My Site</a>
        <hr>
        <figcaption>Expected Grade 2596-2</figcaption>
        <table class="table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Grade</th>
                </th>
            </thead>
            <tbody>
                <?php
                    foreach($expected_grade as $exg){
                        echo "\n<tr>";
                        echo "\n\t<th>".$exg['code'].'</th>';
                        if($exg['grade'] == 'A'){
                            echo "\n\t<th class=\"bg-green-400\">".$exg['grade'].'</th>';
                        }else if($exg['grade'] == 'D'){
                            echo "\n\t<th class=\"bg-red-400\">".$exg['grade'].'</th>';
                        }else{
                            echo "\n\t<th>".$exg['grade'].'</th>';
                        }
                        echo "\n</tr>";                
                    }
                ?>    
            </tbody>
        </table>
    </div>        





<?php
include 'includes/footer.php';
?>

</body>
</html>