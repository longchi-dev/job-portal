<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // GET /api/companies
    public function index()
    {
        return response()->json(Company::with('account')->get());
    }

    // GET /api/companies/{id}
    public function show(string $id)
    {
        $company = Company::with('account')->find($id);
        return $company ? response()->json($company) : response()->json(['error' => 'Not found'], 404);
    }

    // POST /api/companies
    public function store(Request $request)
    {
        $company = Company::create($request->all());
        return response()->json($company, 201);
    }

    // PUT /api/companies/{id}
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());
        return response()->json($company, 200);
    }

    // DELETE /api/companies/{id}
    public function destroy(string $id)
    {
        Company::destroy($id);
        return response()->json(null, 204);
    }
}
