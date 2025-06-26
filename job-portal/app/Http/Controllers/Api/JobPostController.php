<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    // GET /api/job-posts
    public function index()
    {
        return response()->json(JobPost::with('company')->get());
    }

    // GET /api/job-posts/{id}
    public function show(string $id)
    {
        $post = JobPost::with('company')->find($id);
        return $post ? response()->json($post) : response()->json(['error' => 'Not found'], 404);
    }

    // POST /api/job-posts
    public function store(Request $request)
    {
        $jobPost = JobPost::create($request->all());
        return response()->json($jobPost, 201);
    }

    // PUT /api/job-posts/{id}
    public function update(Request $request, string $id)
    {
        $post = JobPost::findOrFail($id);
        $post->update($request->all());
        return response()->json($post);
    }

    // DELETE /api/job-posts/{id}
    public function destroy(string $id)
    {
        JobPost::destroy($id);
        return response()->json(null, 204);
    }
}
