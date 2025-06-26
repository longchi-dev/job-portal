<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;
use App\Models\CompanyAccount;
use App\Models\JobSeeker;
use App\Models\JobSeekerAccount;

class AuthController extends Controller
{
    // POST /api/auth/login
    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'user_type' => 'required|in:job_seeker,company',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');
        $type = $request->input('user_type');

        if($type === 'job_seeker') {
            $account = JobSeekerAccount::where('username', $username)->first();
            if ($account && Hash::check($password, $account->password)) {
                return response()->json([
                    'user_type' => 'job_seeker',
                    'user_id' => $account->job_seeker_id,
                    'username' => $account->username,
                ]);
            }
        } elseif($type === 'company') {
            $account = CompanyAccount::where('username', $username)->first();
            if ($account && Hash::check($password, $account->password)) {
                return response()->json([
                    'user_type' => 'company',
                    'user_id' => $account->company_id,
                    'username' => $account->username,
                ]);
            }
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    // POST /api/auth/register
    public function register(Request $request) {
        $request->validate([
            'username'=> 'required',
            'password'=> 'required',
            'email'=> 'required|email',
            'phone' => 'required',
            'user_type' => 'required|in:job_seeker,company',
        ]);

        $type = $request->input('user_type');
        $username = $request->input('username');
        $email = $request->input('email');

        if($type === 'job_seeker') {
            if(JobSeekerAccount::where('username', $username)->orWhere('email', $email)->exists()) {
                return response()->json(['error' => 'Username or email already exists'], 409);
            }

            $jobSeeker = JobSeeker::create([
                'full_name' => $request->input('full_name', 'Name'),
                'avatar_url' => $request->input('avatar_url', 'default.jpg'),
                'desired_job' => $request->input('desired_job', 'Developer'),
                'birth_date' => $request->input('birth_date', '2000-01-01'),
                'gender' => $request->input('gender', 1),
                'job_type' => $request->input('job_type', 1),
                'industry' => $request->input('industry', 'IT'),
                'city' => $request->input('city', 'Hanoi'),
                'address' => $request->input('address', '123 Street'),
                'career_goal' => $request->input('career_goal', 'Become a senior developer'),
                'education' => $request->input('education', 'Bachelor'),
                'skills' => $request->input('skills', 'PHP, Laravel'),
                'experience' => $request->input('experience', '1 year intern'),
                'profile_summary' => $request->input('profile_summary', 'Hard-working...'),
                'skill_tags' => $request->input('skill_tags', 'PHP,Laravel,MySQL'),
            ]);

            JobSeekerAccount::create([
                'job_seeker_id' => $jobSeeker->id,
                'username' => $username,
                'password' => bcrypt($request->input('password')),
                'phone' => $request->input('phone'),
                'email' => $email,
            ]);

            return response()->json(['message' => 'Job seeker registered successfully'], 201);
        }

        if($type === 'company') {
            if (CompanyAccount::where('username', $username)->orWhere('email', $email)->exists()) {
                return response()->json(['error' => 'Username or email already exists'], 409);
            }

            $company = Company::create([
                'name' => $request->input('company_name', 'Company Name'),
                'address' => $request->input('address', 'District 1, HCMC'),
                'website' => $request->input('website', 'https://company.com'),
                'description' => $request->input('description', 'Company description'),
                'avatar_url' => $request->input('avatar_url', 'default-company.jpg'),
                'industry' => $request->input('industry', 'IT'),
                'city' => $request->input('city', 'HCMC'),
                'benefits' => $request->input('benefits', 'So many benefits'),
            ]);

            CompanyAccount::create([
                'company_id' => $company->id,
                'username' => $username,
                'password' => bcrypt($request->input('password')),
                'phone' => $request->input('phone'),
                'email' => $email,
            ]);

            return response()->json(['message' => 'Company registered successfully'], 201);
        }
        return response()->json(['error' => 'Invalid user_type'], 400);
    }
}
