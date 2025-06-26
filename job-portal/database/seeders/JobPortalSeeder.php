<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobPortalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("companies")->insert(
    [
                [
                    'id' => 1,
                    'name' => 'FPT',
                    'address' => '52B QL50, Phong Phú, Bình Chánh',
                    'website' => 'fpt.com.vn',
                    'description' => 'FPT tiếp tục theo đuổi mục tiêu lớn...',
                    'avatar_url' => '',
                    'industry' => 'Công nghệ - thông tin',
                    'city' => 'Hồ Chí Minh',
                    'benefits' => "Mức lương và thu nhập hấp dẫn\nMôi trường làm việc thân thiện"
                ],
                [
                    'id' => 2,
                    'name' => 'VNG',
                    'address' => 'Z06 Số 13, Tân Thuận Đông, Quận 7',
                    'website' => 'vng.com.vn',
                    'description' => 'Được thành lập từ năm 2004...',
                    'avatar_url' => '',
                    'industry' => 'Công nghệ - thông tin',
                    'city' => 'Thành phố Hồ Chí Minh',
                    'benefits' => "Chăm sóc sức khỏe bảo hiểm\nKhông gian làm việc sáng tạo"
                ],
                [
                    'id' => 3,
                    'name' => 'Google',
                    'address' => 'số 09 Phố Duy Tân, P. Dịch Vọng Hậu, Q. ',
                    'website' => 'google.com',
                    'description' => 'Google được thành lập vào năm 1998 bởi Larry Page và Sergey Brin trong khi họ là nghiên cứu sinh đã có bằng tiến sĩ tại Đại học Stanford ở California.',
                    'avatar_url' => '',
                    'industry' => 'Công nghệ - thông tin',
                    'city' => 'Hà Nội',
                    'benefits' => "Mức lương và thu nhập hấp dẫn\r\nMôi trường làm việc sáng tạo"
                ],
            ],
        );

        DB::table("job_posts")->insert(
    [
                [
                    'id' => 1,
                    'company_id' => 1,
                    'title' => 'Lập trình BackEnd',
                    'industry' => 'Công Nghệ Thông Tin',
                    'position' => 'Nhân viên',
                    'salary' => 10000000,
                    'job_type' => 1,
                    'address' => 'Tôn Đức Thắng',
                    'phone' => '0562854976',
                    'email' => 'congty@gmail.com',
                    'description' => 'Công việc lập trình',
                    'skill_tags' => 'php,html,js,java',
                    'deadline' => '2025-06-06',
                    'requirements' => '',
                    'degree_required' => '',
                    'benefits' => '',
                    'quantity' => 1
                ],

                [
                    'id' => 2,
                    'company_id' => 2,
                    'title' => 'Lập trình FrontEnd',
                    'industry' => 'Công Nghệ Thông Tin',
                    'position' => 'Nhân viên',
                    'salary' => 10000000,
                    'job_type' => 1,
                    'address' => 'Tôn Đức Thắng',
                    'phone' => '0562854976',
                    'email' => 'congty@gmail.com',
                    'description' => 'Công việc lập trình',
                    'skill_tags' => 'php,html,js,java',
                    'deadline' => '2025-06-06',
                    'requirements' => '',
                    'degree_required' => '',
                    'benefits' => '',
                    'quantity' => 1
                ],

                [
                    'id' => 3,
                    'company_id' => 3,
                    'title' => 'Lập trình FullStack',
                    'industry' => 'Công Nghệ Thông Tin',
                    'position' => 'Lập trình viên',
                    'salary' => 10000000,
                    'job_type' => 1,
                    'address' => 'Tôn Đức Thắng',
                    'phone' => '0562854976',
                    'email' => 'congty@gmail.com',
                    'description' => 'Công việc lập trình',
                    'skill_tags' => 'php,html,js,java',
                    'deadline' => '2025-06-06',
                    'requirements' => '',
                    'degree_required' => '',
                    'benefits' => '',
                    'quantity' => 1
                ],
            ],
        );

        DB::table('job_seekers')->insert(
    [
                [
                    'id' => 1,
                    'full_name' => 'Đặng Minh Phong',
                    'avatar_url' => '',
                    'desired_job' => 'Lập trình viên',
                    'birth_date' => '2003-10-26',
                    'gender' => 1,
                    'job_type' => 0,
                    'industry' => 'Công nghệ - thông tin',
                    'city' => 'Thành phố Hồ Chí Minh',
                    'address' => 'Tôn Đức Thắng',
                    'career_goal' => 'Lập trình',
                    'education' => '12/12',
                    'skills' => 'Lập trình',
                    'experience' => '2 năm với Java',
                    'profile_summary' => 'Something...',
                    'skill_tags' => 'java,.net,c#,php',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'full_name' => 'Dương Đình Chí Long',
                    'avatar_url' => '',
                    'desired_job' => 'Lập trình viên',
                    'birth_date' => '2003-01-01',
                    'gender' => 1,
                    'job_type' => 1,
                    'industry' => 'Công nghệ - thông tin',
                    'city' => 'Thành phố Hồ Chí Minh',
                    'address' => 'Tôn Đức Thắng',
                    'career_goal' => 'Something...',
                    'education' => 'Something...',
                    'skills' => 'Something...',
                    'experience' => 'Something...',
                    'profile_summary' => 'Something...',
                    'skill_tags' => ',java,php',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ],
        );

        DB::table('job_seeker_accounts')->insert(
    [
                [
                    'job_seeker_id' => 1, 
                    'username' => 'minhphong', 
                    'password' => bcrypt('123456'), 
                    'phone' => '0123456789', 
                    'email' => 'dangminhphong@gmail.com'
                ],
                [
                    'job_seeker_id' => 2, 
                    'username' => 'chilong', 
                    'password' => bcrypt('123456'), 
                    'phone' => '0123456789', 
                    'email' => 'chilong@gmail.com'
                ],

            ],
        );

        DB::table('company_accounts')->insert(
    [
                [
                    'company_id' => 1, 
                    'username' => 'fpt', 
                    'password' => bcrypt('123456'), 
                    'phone' => '0123456789', 
                    'email' => 'fpt@gmail.com'
                ],
                [
                    'company_id' => 2, 
                    'username' => 'vng', 
                    'password' => bcrypt('123456'), 
                    'phone' => '0123456789', 
                    'email' => 'vng@gmail.com'
                ],
                [
                    'company_id' => 3, 
                    'username' => 'google', 
                    'password' => bcrypt('123456'), 
                    'phone' => '0123456789', 
                    'email' => 'google@gmail.com'
                ],
            ]
        );
    }
}
