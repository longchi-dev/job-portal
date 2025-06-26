<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobSeekerController;
use App\Http\Controllers\Api\UserInfoController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\JobPostController;
use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InviteController;

Route::apiResource('job-seekers', JobSeekerController::class);
Route::apiResource('companies', CompanyController::class);
Route::apiResource('job-posts', JobPostController::class);

// AUTH
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);


// USER INFO
Route::get('users', [UserInfoController::class, 'getAllUsers']);
Route::get('users/{id}/basic-info', [UserInfoController::class, 'getBasicInfo']);
Route::get('users/{id}/full-info', [UserInfoController::class, 'getUserFullInfo']);

// JOB
Route::get('/jobs/unapplied', [JobController::class, 'getUnappliedJobs']);
Route::get('/jobs/{id}', [JobController::class, 'getJobDetail']);
Route::get('/companies/{companyId}/jobs', [JobController::class, 'getJobsByCompany']);

// APPLY
Route::post('/applications', [ApplicationController::class, 'apply']);
Route::get('/applications/{job_id}', [ApplicationController::class, 'getApplicants']);
Route::post('/applications/accept', [ApplicationController::class, 'accept']);
Route::post('/applications/reject', [ApplicationController::class, 'reject']);

// INVITE
Route::post('/invitations', [InviteController::class, 'invite']);
Route::get('/invitations/{job_seeker_id}', [InviteController::class, 'getInvitations']);
Route::post('/invitations/accept', [InviteController::class, 'accept']);
Route::post('/invitations/reject', [InviteController::class, 'reject']);

