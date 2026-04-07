📚 Course Management System
Hệ thống quản lý khóa học trực tuyến xây dựng bằng Laravel 10, áp dụng Eloquent ORM, Form Request Validation, Soft Delete và Blade Template.

🧱 Yêu cầu hệ thống
Công cụPhiên bản tối thiểuPHP>= 8.1Composer>= 2.xLaravel10.xMySQL>= 8.0Node.js>= 18.x (cho Vite)

⚙️ Hướng dẫn cài đặt

1. Clone dự án
   bashgit clone https://github.com/your-username/course-management.git
   cd course-management
2. Cài đặt PHP dependencies
   bashcomposer install
3. Cài đặt Node dependencies
   bashnpm install
4. Tạo file môi trường
   bashcp .env.example .env
   php artisan key:generate
5. Cấu hình database trong .env
   envDB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=course_management
   DB_USERNAME=root
   DB_PASSWORD=your_password
6. Tạo database
   sqlCREATE DATABASE course_management CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
7. Chạy Migration & Seeder
   bashphp artisan migrate
   php artisan db:seed
8. Tạo symbolic link cho storage (upload ảnh)
   bashphp artisan storage:link
9. Build assets
   bashnpm run dev

# hoặc production:

npm run build 10. Khởi động server
bashphp artisan serve
Truy cập: http://localhost:8000

📁 Cấu trúc dự án
app/
├── Http/
│ ├── Controllers/
│ │ ├── CourseController.php
│ │ ├── LessonController.php
│ │ └── EnrollmentController.php
│ └── Requests/
│ ├── CourseRequest.php
│ └── EnrollmentRequest.php
├── Models/
│ ├── Course.php
│ ├── Lesson.php
│ ├── Student.php
│ └── Enrollment.php
database/
├── migrations/
│ ├── create_courses_table.php
│ ├── create_lessons_table.php
│ ├── create_students_table.php
│ └── create_enrollments_table.php
└── seeders/
└── DatabaseSeeder.php
resources/
└── views/
├── layouts/
│ └── master.blade.php
├── components/
│ ├── alert.blade.php
│ ├── badge.blade.php
│ └── course-card.blade.php
├── courses/
│ ├── index.blade.php
│ ├── create.blade.php
│ ├── edit.blade.php
│ └── show.blade.php
├── lessons/
│ ├── index.blade.php
│ ├── create.blade.php
│ └── edit.blade.php
└── enrollments/
├── index.blade.php
└── create.blade.php
routes/
└── web.php
storage/
└── app/public/courses/ ← ảnh upload

🗃️ Sơ đồ quan hệ dữ liệu (ERD)
courses lessons students enrollments

---

id (PK) 1──< id (PK) id (PK) 1──< id (PK)
title course_id (FK) name course_id (FK)
slug title email student_id (FK)
price content enrolled_at
description video_url
image order
status
deleted_at
Quan hệ:

Course hasMany Lesson
Course hasMany Enrollment
Student hasMany Enrollment
Course belongsToMany Student (qua bảng enrollments)

🚀 Các chức năng chính
Quản lý Khóa học
Chức năngRouteMethodDanh sách/coursesGETThêm mới/courses/createGETLưu mới/coursesPOSTChi tiết/courses/{id}GETChỉnh sửa/courses/{id}/editGETCập nhật/courses/{id}PUTXóa mềm/courses/{id}DELETEKhôi phục/courses/{id}/restorePOST
Quản lý Bài học
Chức năngRouteMethodDanh sách theo khóa/courses/{course}/lessonsGETThêm bài học/courses/{course}/lessons/createGETLưu bài học/courses/{course}/lessonsPOSTCập nhật/courses/{course}/lessons/{lesson}PUTXóa/courses/{course}/lessons/{lesson}DELETE
Quản lý Đăng ký
Chức năngRouteMethodDanh sách/enrollmentsGETForm đăng ký/enrollments/createGETLưu đăng ký/enrollmentsPOST

🔧 Lệnh Artisan hữu ích
bash# Tạo Form Request
php artisan make:request CourseRequest

# Tạo Model + Migration + Controller cùng lúc

php artisan make:model Course -mcr

# Xem danh sách routes

php artisan route:list

# Xóa cache

php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Chạy lại migration từ đầu (reset toàn bộ data)

php artisan migrate:fresh --seed

🔍 Tính năng nâng cao
Tìm kiếm & Lọc
Truy cập /courses?search=laravel&status=published&sort=price_asc để tìm kiếm theo tên, lọc theo trạng thái và sắp xếp theo giá.
Query Scope
Model Course có sẵn hai scope:

scopePublished() — chỉ lấy khóa học đang published
scopePriceBetween($min, $max) — lọc theo khoảng giá

Tối ưu N+1 Query
Toàn bộ danh sách khóa học đều sử dụng Eager Loading:
phpCourse::with(['lessons', 'enrollments.student'])->paginate(10);

📸 Ảnh chụp màn hình

Thêm ảnh vào thư mục /docs/screenshots/ sau khi chạy dự án.

dashboard.png — Trang tổng quan thống kê
courses-index.png — Danh sách khóa học
courses-create.png — Form thêm khóa học
lessons-index.png — Danh sách bài học
enrollments.png — Danh sách học viên

👤 Tác giả

Sinh viên: Nghiêm Xuân Mạnh
MSSV: 20221316
Môn học: Chuyên đề 1
Giảng viên: Lưu Thảo
