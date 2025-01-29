<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CrmCustomer;
use Illuminate\Http\Request;

class CrmCustomerApiController extends Controller
{

    public function store(Request $request)
    {
        // Validate data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'status_id' => 'required|exists:crm_statuses,id',
            'email' => 'required|email|unique:crm_customers,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'skype' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create the customer in the database
        $crmCustomer = CrmCustomer::create($validatedData);

        // Return a JSON response
        return response()->json([
            'message' => 'Customer created successfully!',
            'customer' => $crmCustomer
        ], 201);
    }

}