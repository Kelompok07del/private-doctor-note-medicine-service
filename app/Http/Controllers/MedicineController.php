<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{

    // get all medicines data
    public function getAllMedicines() {
        $data = Medicine::all();
        return response()->json($data, 200);
    }

    // create medicine data
    public function createMedicine(Request $request) {
        $newMedicine = Medicine::create([
            "code" => $request->input("code"),
            "name" => $request->input("name"),
            "information" => $request->input("information")
        ]);

        return response()->json($newMedicine, 201);
    }

    // update medicine data
    public function updateMedicine(Request $request, $id) {
        $medicine = Medicine::find($id);
        $medicine->update($request->all());
        return response()->json($medicine, 200);
    }

    // get medicine by id
    public function getMedicineById($id) {
        $medicine = Medicine::find($id);
        return response()->json($medicine, 200);
    }

    // delete medicine data
    public function deleteMedicine($id) {
        $medicine = Medicine::find($id);
        $medicine->delete();
        return response()->json([
            "message" => "medicine deleted successfully"
        ], 200);
    }

}
