<?php
$pageTitle = "แบบบันทึกการบำเพ็ญประโยชน์ - MyWebsite";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<style>
    @media print {
        nav, footer, .no-print { display: none !important; }
        body { background: #ffffff !important; }
        main { padding: 0 !important; max-width: 100% !important; }
        .print-sheet {
            box-shadow: none !important;
            border: none !important;
            padding: 0 !important;
        }
    }
</style>

<main class="flex-grow w-full max-w-4xl mx-auto px-4 py-8 sm:py-12" x-data="volunteerForm()">

    <!-- ส่วนหัวหน้าเว็บ -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4 no-print">
        <div>
            <h2 class="text-3xl font-bold text-slate-900">แบบบันทึกการบำเพ็ญประโยชน์</h2>
            <p class="text-secondary mt-1">กรอกข้อมูลการทำกิจกรรมและแนบภาพถ่ายหลักฐาน</p>
        </div>
        <div class="bg-white px-4 py-2 rounded-lg border border-slate-200 shadow-sm text-sm">
            <span class="font-semibold text-slate-900">รวมเวลา:</span>
            <span class="text-indigo-600 font-semibold" x-text="(totalHours || '0') + ' ชั่วโมง'"></span>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- ส่วนที่ 1: ฟอร์มกรอกข้อมูล -->
    <!-- ========================================== -->
    <form
        x-show="!submitted"
        @submit.prevent="handleSubmit"
        novalidate
        class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-slate-100 space-y-8"
    >
        <!-- หมวดที่ 1: ข้อมูลนักศึกษา -->
        <section class="space-y-4">
            <h3 class="text-base font-semibold text-slate-900 border-b border-slate-100 pb-2">1. ข้อมูลนักศึกษา</h3>

            <div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
                <!-- คำนำหน้า -->
                <div class="sm:col-span-3 group">
                    <label for="prefix" class="block text-sm font-medium text-slate-700 mb-1">คำนำหน้า</label>
                    <select
                        id="prefix"
                        x-model="form.prefix"
                        x-validation.required="form.prefix"
                        class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 focus:outline-none focus:border-indigo-600 data-[validation-valid=true]:border-green-500 data-[validation-valid=false]:border-red-500"
                    >
                        <option value="นาย">นาย</option>
                        <option value="นางสาว">นางสาว</option>
                        <option value="นาง">นาง</option>
                    </select>
                    <small class="text-red-600 text-xs mt-1 hidden group-has-[[data-validation-valid=false]]:block">
                        กรุณาเลือกคำนำหน้า
                    </small>
                </div>

                <!-- ชื่อ-นามสกุล -->
                <div class="sm:col-span-5 group">
                    <label for="fullname" class="block text-sm font-medium text-slate-700 mb-1">ชื่อ - นามสกุล</label>
                    <input
                        id="fullname"
                        type="text"
                        x-model="form.fullname"
                        x-validation.required.min:length.3="form.fullname"
                        placeholder="เช่น กิตติวินท์ นามวงษ์"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:outline-none focus:border-indigo-600 data-[validation-valid=true]:border-green-500 data-[validation-valid=false]:border-red-500"
                    />
                    <small class="text-red-600 text-xs mt-1 hidden group-has-[[data-validation-valid=false]]:block">
                        กรุณากรอกชื่อ-นามสกุลให้ถูกต้อง
                    </small>
                </div>

                <!-- รหัสนักศึกษา -->
                <div class="sm:col-span-4 group">
                    <label for="sid" class="block text-sm font-medium text-slate-700 mb-1">รหัสนักศึกษา</label>
                    <input
                        id="sid"
                        type="text"
                        inputmode="numeric"
                        maxlength="10"
                        x-model="form.sid"
                        @input="form.sid = form.sid.replace(/\D/g, '')"
                        x-validation.required.min:length.10.max:length.10="form.sid"
                        placeholder="เช่น 6814421010"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:outline-none focus:border-indigo-600 data-[validation-valid=true]:border-green-500 data-[validation-valid=false]:border-red-500"
                    />
                    <small class="text-red-600 text-xs mt-1 hidden group-has-[[data-validation-valid=false]]:block">
                        กรุณากรอกรหัสนักศึกษา (ตัวเลข 10 หลัก)
                    </small>
                </div>

                <!-- คณะ -->
                <div class="sm:col-span-5 group">
                    <label for="faculty" class="block text-sm font-medium text-slate-700 mb-1">คณะ</label>
                    <select
                        id="faculty"
                        x-model="form.faculty"
                        x-validation.required="form.faculty"
                        class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 focus:outline-none focus:border-indigo-600 data-[validation-valid=true]:border-green-500 data-[validation-valid=false]:border-red-500"
                    >
                        <option value="">-- เลือกคณะ --</option>
                        <option value="คณะครุศาสตร์">คณะครุศาสตร์</option>
                        <option value="คณะมนุษยศาสตร์และสังคมศาสตร์">คณะมนุษยศาสตร์และสังคมศาสตร์</option>
                        <option value="คณะวิทยาศาสตร์และเทคโนโลยี">คณะวิทยาศาสตร์และเทคโนโลยี</option>
                        <option value="คณะวิทยาการจัดการ">คณะวิทยาการจัดการ</option>
                        <option value="คณะวิศวกรรมศาสตร์และเทคโนโลยีอุตสาหกรรม">คณะวิศวกรรมศาสตร์และเทคโนโลยีอุตสาหกรรม</option>
                        <option value="คณะเทคโนโลยีการเกษตร">คณะเทคโนโลยีการเกษตร</option>
                        <option value="คณะนิติศาสตร์">คณะนิติศาสตร์</option>
                        <option value="คณะวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ">คณะวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ</option>
                        <option value="คณะนิเทศศาสตร์">คณะนิเทศศาสตร์</option>
                        <option value="คณะพยาบาลศาสตร์">คณะพยาบาลศาสตร์</option>
                    </select>
                    <small class="text-red-600 text-xs mt-1 hidden group-has-[[data-validation-valid=false]]:block">
                        กรุณาเลือกคณะ
                    </small>
                </div>

                <!-- สาขาวิชา -->
                <div class="sm:col-span-4 group">
                    <label for="major" class="block text-sm font-medium text-slate-700 mb-1">สาขาวิชา</label>
                    <input
                        id="major"
                        type="text"
                        x-model="form.major"
                        x-validation.required="form.major"
                        placeholder="เช่น เทคโนโลยีสารสนเทศ"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:outline-none focus:border-indigo-600 data-[validation-valid=true]:border-green-500 data-[validation-valid=false]:border-red-500"
                    />
                    <small class="text-red-600 text-xs mt-1 hidden group-has-[[data-validation-valid=false]]:block">
                        กรุณากรอกสาขาวิชา
                    </small>
                </div>

                <!-- โทรศัพท์มือถือ -->
                <div class="sm:col-span-3 group">
                    <label for="phone" class="block text-sm font-medium text-slate-700 mb-1">โทรศัพท์มือถือ</label>
                    <input
                        id="phone"
                        type="tel"
                        inputmode="numeric"
                        maxlength="10"
                        x-model="form.phone"
                        @input="form.phone = form.phone.replace(/\D/g, '')"
                        x-validation.required.min:length.10.max:length.10="form.phone"
                        placeholder="08xxxxxxxx"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:outline-none focus:border-indigo-600 data-[validation-valid=true]:border-green-500 data-[validation-valid=false]:border-red-500"
                    />
                    <small class="text-red-600 text-xs mt-1 hidden group-has-[[data-validation-valid=false]]:block">
                        กรุณากรอกเบอร์โทรศัพท์มือถือ 10 หลัก
                    </small>
                </div>
            </div>
        </section>

        <!-- หมวดที่ 2: รายละเอียดการบำเพ็ญประโยชน์ -->
        <section class="space-y-4">
            <h3 class="text-base font-semibold text-slate-900 border-b border-slate-100 pb-2">2. รายละเอียดการบำเพ็ญประโยชน์</h3>

            <div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
                <!-- สถานที่ -->
                <div class="sm:col-span-12 group">
                    <label for="location" class="block text-sm font-medium text-slate-700 mb-1">ได้บำเพ็ญประโยชน์ ณ (สถานที่)</label>
                    <input
                        id="location"
                        type="text"
                        x-model="form.location"
                        x-validation.required="form.location"
                        placeholder="ระบุชื่อสถานที่ หน่วยงาน วัด โรงเรียน หรือชุมชน"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:outline-none focus:border-indigo-600 data-[validation-valid=true]:border-green-500 data-[validation-valid=false]:border-red-500"
                    />
                    <small class="text-red-600 text-xs mt-1 hidden group-has-[[data-validation-valid=false]]:block">
                        กรุณาระบุสถานที่บำเพ็ญประโยชน์
                    </small>
                </div>

                <!-- วันที่ -->
                <div class="sm:col-span-4 group">
                    <label for="activityDate" class="block text-sm font-medium text-slate-700 mb-1">ในวันที่</label>
                    <input
                        id="activityDate"
                        type="date"
                        x-model="form.date"
                        x-validation.required="form.date"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:outline-none focus:border-indigo-600 data-[validation-valid=true]:border-green-500 data-[validation-valid=false]:border-red-500"
                    />
                    <small class="text-red-600 text-xs mt-1 hidden group-has-[[data-validation-valid=false]]:block">
                        กรุณาเลือกวันที่ทำกิจกรรม
                    </small>
                </div>

                <!-- เวลาเริ่มต้น -->
                <div class="sm:col-span-3 group">
                    <label for="startTime" class="block text-sm font-medium text-slate-700 mb-1">ตั้งแต่เวลา</label>
                    <input
                        id="startTime"
                        type="time"
                        x-model="form.startTime"
                        x-validation.required="form.startTime"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:outline-none focus:border-indigo-600 data-[validation-valid=true]:border-green-500 data-[validation-valid=false]:border-red-500"
                    />
                    <small class="text-red-600 text-xs mt-1 hidden group-has-[[data-validation-valid=false]]:block">
                        ระบุเวลาเริ่ม
                    </small>
                </div>

                <!-- เวลาสิ้นสุด -->
                <div class="sm:col-span-3 group">
                    <label for="endTime" class="block text-sm font-medium text-slate-700 mb-1">ถึงเวลา</label>
                    <input
                        id="endTime"
                        type="time"
                        x-model="form.endTime"
                        x-validation.required="form.endTime"
                        :class="timeRangeError ? '!border-red-500' : ''"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:outline-none focus:border-indigo-600 data-[validation-valid=true]:border-green-500 data-[validation-valid=false]:border-red-500"
                    />
                    <small class="text-red-600 text-xs mt-1 hidden group-has-[[data-validation-valid=false]]:block">
                        ระบุเวลาสิ้นสุด
                    </small>
                    <small x-show="timeRangeError" x-text="timeRangeError" class="text-red-600 text-xs mt-1 block"></small>
                </div>

                <!-- รวมเป็น (ชั่วโมง) -->
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1">รวมเป็น (ชม.)</label>
                    <input
                        type="text"
                        readonly
                        :value="totalHours || '-'"
                        class="w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-center font-semibold text-indigo-600 cursor-default"
                    />
                </div>
            </div>

            <!-- ลักษณะกิจกรรม (๑) (๒) (๓) -->
            <div class="space-y-3 pt-2">
                <label class="block text-sm font-medium text-slate-700">ลักษณะกิจกรรม / งานที่ได้รับมอบหมายให้ปฏิบัติ</label>

                <div class="group">
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-slate-500 w-7 shrink-0">(๑)</span>
                        <input
                            type="text"
                            x-model="form.task1"
                            x-validation.required="form.task1"
                            placeholder="ระบุลักษณะงานที่ปฏิบัติข้อที่ 1 (จำเป็น)"
                            class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:outline-none focus:border-indigo-600 data-[validation-valid=true]:border-green-500 data-[validation-valid=false]:border-red-500"
                        />
                    </div>
                    <small class="text-red-600 text-xs mt-1 pl-9 hidden group-has-[[data-validation-valid=false]]:block">
                        กรุณากรอกลักษณะกิจกรรมอย่างน้อย 1 รายการ
                    </small>
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-sm text-slate-500 w-7 shrink-0">(๒)</span>
                    <input
                        type="text"
                        x-model="form.task2"
                        placeholder="ระบุลักษณะงานที่ปฏิบัติข้อที่ 2 (ถ้ามี)"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:outline-none focus:border-indigo-600"
                    />
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-sm text-slate-500 w-7 shrink-0">(๓)</span>
                    <input
                        type="text"
                        x-model="form.task3"
                        placeholder="ระบุลักษณะงานที่ปฏิบัติข้อที่ 3 (ถ้ามี)"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 focus:outline-none focus:border-indigo-600"
                    />
                </div>
            </div>
        </section>

        <!-- หมวดที่ 3: หลักฐานภาพถ่าย -->
        <section class="space-y-4">
            <h3 class="text-base font-semibold text-slate-900 border-b border-slate-100 pb-2">3. แนบหลักฐานเป็นภาพถ่าย</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- ภาพที่ ๑ -->
                <div>
                    <span class="block text-sm font-medium text-slate-700 mb-1.5">ภาพที่ ๑</span>
                    <label
                        :class="photoErrors.photo1 ? 'border-red-500 bg-red-50/30' : (form.photo1 ? 'border-green-500' : 'border-slate-300 hover:border-indigo-400')"
                        class="relative flex flex-col items-center justify-center h-48 rounded-xl border-2 border-dashed bg-slate-50 cursor-pointer overflow-hidden transition"
                    >
                        <input type="file" accept="image/*" class="sr-only" @change="handleFile($event, 'photo1')">
                        <template x-if="!form.photo1">
                            <div class="text-center px-4">
                                <p class="text-sm font-medium text-slate-600">+ เลือกรูปภาพที่ ๑</p>
                                <p class="text-xs text-slate-400 mt-1">JPG, PNG (ไม่เกิน 5MB)</p>
                            </div>
                        </template>
                        <template x-if="form.photo1">
                            <div class="w-full h-full relative group">
                                <img :src="form.photo1" alt="ภาพที่ 1" class="w-full h-full object-cover">
                                <button
                                    type="button"
                                    @click.prevent="form.photo1 = null"
                                    class="absolute top-2 right-2 bg-slate-900/75 text-white text-xs px-2.5 py-1 rounded-md hover:bg-red-600"
                                >
                                    ลบรูป
                                </button>
                            </div>
                        </template>
                    </label>
                    <small x-show="photoErrors.photo1" x-text="photoErrors.photo1" class="text-red-600 text-xs mt-1 block"></small>
                </div>

                <!-- ภาพที่ ๒ -->
                <div>
                    <span class="block text-sm font-medium text-slate-700 mb-1.5">ภาพที่ ๒</span>
                    <label
                        :class="photoErrors.photo2 ? 'border-red-500 bg-red-50/30' : (form.photo2 ? 'border-green-500' : 'border-slate-300 hover:border-indigo-400')"
                        class="relative flex flex-col items-center justify-center h-48 rounded-xl border-2 border-dashed bg-slate-50 cursor-pointer overflow-hidden transition"
                    >
                        <input type="file" accept="image/*" class="sr-only" @change="handleFile($event, 'photo2')">
                        <template x-if="!form.photo2">
                            <div class="text-center px-4">
                                <p class="text-sm font-medium text-slate-600">+ เลือกรูปภาพที่ ๒</p>
                                <p class="text-xs text-slate-400 mt-1">JPG, PNG (ไม่เกิน 5MB)</p>
                            </div>
                        </template>
                        <template x-if="form.photo2">
                            <div class="w-full h-full relative group">
                                <img :src="form.photo2" alt="ภาพที่ 2" class="w-full h-full object-cover">
                                <button
                                    type="button"
                                    @click.prevent="form.photo2 = null"
                                    class="absolute top-2 right-2 bg-slate-900/75 text-white text-xs px-2.5 py-1 rounded-md hover:bg-red-600"
                                >
                                    ลบรูป
                                </button>
                            </div>
                        </template>
                    </label>
                    <small x-show="photoErrors.photo2" x-text="photoErrors.photo2" class="text-red-600 text-xs mt-1 block"></small>
                </div>
            </div>
        </section>

        <!-- ปุ่มดำเนินการ -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
            <button
                type="button"
                @click="resetForm()"
                class="px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 transition"
            >
                ล้างข้อมูล
            </button>
            <button
                type="submit"
                class="px-6 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium shadow-sm transition"
            >
                ตรวจสอบและสร้างแบบฟอร์ม
            </button>
        </div>
    </form>

    <!-- ========================================== -->
    <!-- ส่วนที่ 2: ตัวอย่างเอกสารแบบฟอร์มพร้อมพิมพ์ -->
    <!-- ========================================== -->
    <div x-show="submitted" x-cloak class="space-y-4">
        <div class="flex items-center justify-between bg-white px-5 py-3 rounded-xl border border-slate-200 shadow-sm no-print">
            <button
                type="button"
                @click="submitted = false"
                class="text-sm font-medium text-slate-600 hover:text-slate-900"
            >
                ← กลับไปแก้ไขข้อมูล
            </button>
            <button
                type="button"
                @click="window.print()"
                class="px-5 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium shadow-sm transition"
            >
                พิมพ์เอกสาร / บันทึก PDF
            </button>
        </div>

        <!-- กระดาษแบบฟอร์มตามต้นฉบับ -->
        <div class="print-sheet bg-white rounded-2xl p-8 sm:p-12 shadow-sm border border-slate-200 text-slate-900 text-[15px] leading-9">
            <p class="indent-10">
                ด้วย ข้าพเจ้า (<span :class="form.prefix === 'นาย' ? 'underline font-semibold' : ''">นาย</span>,<span :class="form.prefix === 'นาง' ? 'underline font-semibold' : ''">นาง</span>,<span :class="form.prefix === 'นางสาว' ? 'underline font-semibold' : ''">นางสาว</span>)
                <span class="inline-block border-b border-dotted border-slate-600 px-3 min-w-[200px] text-center font-medium" x-text="form.fullname"></span>
                รหัสนักศึกษา
                <span class="inline-block border-b border-dotted border-slate-600 px-3 min-w-[140px] text-center font-medium" x-text="form.sid"></span>
            </p>

            <p>
                คณะ <span class="inline-block border-b border-dotted border-slate-600 px-3 min-w-[190px] text-center font-medium" x-text="form.faculty.replace(/^คณะ/, '')"></span>
                สาขาวิชา <span class="inline-block border-b border-dotted border-slate-600 px-3 min-w-[165px] text-center font-medium" x-text="form.major"></span>
                โทรศัพท์มือถือ <span class="inline-block border-b border-dotted border-slate-600 px-3 min-w-[120px] text-center font-medium" x-text="form.phone"></span>
            </p>

            <p>
                ได้บำเพ็ญประโยชน์ ณ (สถานที่)
                <span class="inline-block border-b border-dotted border-slate-600 px-3 min-w-[430px] font-medium" x-text="form.location"></span>
            </p>

            <p>
                ในวันที่ <span class="inline-block border-b border-dotted border-slate-600 px-3 min-w-[145px] text-center font-medium" x-text="thaiDate"></span>
                ตั้งแต่เวลา <span class="inline-block border-b border-dotted border-slate-600 px-3 min-w-[95px] text-center font-medium" x-text="form.startTime + ' - ' + form.endTime"></span>
                รวมเป็น <span class="inline-block border-b border-dotted border-slate-600 px-3 min-w-[55px] text-center font-medium" x-text="totalHours"></span>
                ชม. ซึ่งมีลักษณะกิจกรรม/งานที่ได้รับมอบหมายให้ปฏิบัติ
            </p>

            <div class="pl-6">
                <p>
                    (๑) <span class="inline-block border-b border-dotted border-slate-600 px-2 min-w-[260px] font-medium" x-text="form.task1"></span>
                    (๒) <span class="inline-block border-b border-dotted border-slate-600 px-2 min-w-[260px] font-medium" x-text="form.task2 || '-'"></span>
                </p>
                <p>
                    (๓) <span class="inline-block border-b border-dotted border-slate-600 px-2 min-w-[260px] font-medium" x-text="form.task3 || '-'"></span>
                    ทั้งนี้ ข้าพเจ้าได้แนบหลักฐานเป็นภาพถ่าย ดังภาพ
                </p>
            </div>

            <!-- ตารางภาพถ่าย 2 ช่อง -->
            <div class="mt-4 grid grid-cols-2 border border-slate-900">
                <div class="border-r border-slate-900 p-3 flex flex-col">
                    <span class="text-sm mb-2">ภาพที่ ๑</span>
                    <div class="h-60 flex items-center justify-center overflow-hidden">
                        <img :src="form.photo1" alt="ภาพที่ ๑" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
                <div class="p-3 flex flex-col">
                    <span class="text-sm mb-2">ภาพที่ ๒</span>
                    <div class="h-60 flex items-center justify-center overflow-hidden">
                        <img :src="form.photo2" alt="ภาพที่ ๒" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<script>
    function volunteerForm() {
        return {
            submitted: false,
            timeRangeError: '',
            photoErrors: { photo1: '', photo2: '' },
            form: {
                prefix: 'นาย',
                fullname: '',
                sid: '',
                faculty: '',
                major: '',
                phone: '',
                location: '',
                date: '',
                startTime: '',
                endTime: '',
                task1: '',
                task2: '',
                task3: '',
                photo1: null,
                photo2: null
            },

            get totalHours() {
                this.timeRangeError = '';
                if (!this.form.startTime || !this.form.endTime) return '';
                const [sh, sm] = this.form.startTime.split(':').map(Number);
                const [eh, em] = this.form.endTime.split(':').map(Number);
                const diff = (eh * 60 + em) - (sh * 60 + sm);
                if (diff <= 0) {
                    this.timeRangeError = 'เวลาสิ้นสุดต้องมากกว่าเวลาเริ่มต้น';
                    return '';
                }
                return Number((diff / 60).toFixed(2));
            },

            get thaiDate() {
                if (!this.form.date) return '';
                const months = [
                    'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
                    'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
                ];
                const [y, m, d] = this.form.date.split('-').map(Number);
                return `${d} ${months[m - 1]} ${y + 543}`;
            },

            handleFile(event, key) {
                const file = event.target.files[0];
                this.photoErrors[key] = '';
                if (!file) return;

                if (!file.type.startsWith('image/')) {
                    this.photoErrors[key] = 'กรุณาเลือกไฟล์รูปภาพเท่านั้น';
                    return;
                }
                if (file.size > 5 * 1024 * 1024) {
                    this.photoErrors[key] = 'ขนาดรูปภาพต้องไม่เกิน 5MB';
                    return;
                }

                const reader = new FileReader();
                reader.onload = (e) => { this.form[key] = e.target.result; };
                reader.readAsDataURL(file);
            },

            handleSubmit() {
                // สั่งให้ Alpine JS Form Validation (x-validation) ตรวจสอบทุกช่อง
                this.$dispatch('validate');

                // ตรวจสอบรูปภาพทั้ง 2 ภาพ
                this.photoErrors.photo1 = this.form.photo1 ? '' : 'กรุณาแนบภาพถ่ายที่ ๑';
                this.photoErrors.photo2 = this.form.photo2 ? '' : 'กรุณาแนบภาพถ่ายที่ ๒';

                this.$nextTick(() => {
                    const firstInvalid = this.$el.querySelector('[data-validation-valid="false"]');
                    if (firstInvalid) {
                        firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstInvalid.focus();
                        return;
                    }
                    if (this.timeRangeError || !this.totalHours || this.photoErrors.photo1 || this.photoErrors.photo2) {
                        return;
                    }
                    this.submitted = true;
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            },

            resetForm() {
                this.form = {
                    prefix: 'นาย', fullname: '', sid: '', faculty: '', major: '', phone: '',
                    location: '', date: '', startTime: '', endTime: '',
                    task1: '', task2: '', task3: '', photo1: null, photo2: null
                };
                this.timeRangeError = '';
                this.photoErrors = { photo1: '', photo2: '' };
            }
        }
    }
</script>

<?php
include 'includes/footer.php';
?>
</body>
</html>