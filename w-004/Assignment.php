<?php
$pageTitle = "หน้าแรก - MyWebsite";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการงาน - My Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Kanit', 'sans-serif'], }, colors: { primary: '#4f46e5', secondary: '#64748b', } } }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">

    <main class="flex-grow w-full max-w-6xl mx-auto px-4 py-8 sm:py-12">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-10 gap-4">
            <div>
                <h2 class="text-3xl font-bold text-slate-900">รายการงาน (Assignments)</h2>
                <p class="text-secondary mt-2">รวบรวมชิ้นงานทั้งหมดในรายวิชา</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- งานที่ 1 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow group">
                <div class="flex justify-between items-start mb-4">
                    <span class="text-xs text-slate-400 font-medium">งานชิ้นที่ 1</span>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-primary transition-colors">ออกแบบโครงสร้างเว็บ</h3>
                <p class="text-slate-600 text-sm mb-4">ออกแบบโครงสร้างเลย์เอาท์หน้าเว็บ และใช้ Tailwindcss ในการจัดรูปแบบหน้าเว็บ โดยเนื้อหาของเว็บประกอบด้วยเนื้อหา 3 หน้า1. โฮมเพจ (Home)2. ประวัติ (Bio)3. รายการงาน (Assignment)</p>
                <a href="https://github.com/Tonklaaaa/learm-github.git" class="inline-flex items-center text-primary text-sm font-medium hover:underline">ดูผลงาน →</a>
            </div>

            <!-- งานที่ 2 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow group">
                <div class="flex justify-between items-start mb-4">
                    <span class="text-xs text-slate-400 font-medium">งานชิ้นที่ 2</span>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-primary transition-colors">ทำระบบหลายหน้า</h3>
                <p class="text-slate-600 text-sm mb-4">สร้างหน้าเว็บประกอบด้วย home, bio, assignment โดยใช้ PengiumUI ในการจัดรูปแบบหน้าเว็บ โดยให้ส่งงานดังนี้</p>
                <a href="https://github.com/Tonklaaaa/w-002.git" class="inline-flex items-center text-primary text-sm font-medium hover:underline">ดูผลงาน →</a>
            </div>

            <!-- งานที่ 3 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow relative overflow-hidden">
                <div class="flex justify-between items-start mb-4">
                    <span class="text-xs text-slate-400 font-medium">งานชิ้นที่ 3</span>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">ส้รางฟอร์ม</h3>
                <p class="text-slate-600 text-sm mb-4">สร้างฟอร์มและเขียนคำสั่งเพื่อตรวจสอบความถูกต้องของข้อมูลจากฟอร์ม</p>
                <a href="https://github.com/Tonklaaaa/W-003.git" class="inline-flex items-center text-primary text-sm font-medium hover:underline">ดูผลงาน →</a>
            </div>
        </div>
    </main>

<?php
include 'includes/footer.php';
?>

</body>
</html>