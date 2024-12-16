<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return response()->json($payments);
    }

    public function create()
    {
        // view to show the create form
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string',
        ]);

        $payment = Payment::create($validatedData);
        return response()->json($payment, 201);
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        return response()->json($payment);
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $validatedData = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'amount' => 'sometimes|required|numeric',
            'payment_date' => 'sometimes|required|date',
            'payment_method' => 'sometimes|required|string',
        ]);

        $payment->update($validatedData);
        return response()->json($payment);
    }

    public function delete($id)
    {
        $payment = Payment::findOrFail($id);
        return response()->json($payment);
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return response()->json(['message' => 'Payment deleted successfully']);
    }
}
