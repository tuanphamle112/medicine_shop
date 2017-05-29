<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prescription;
use Response;
use Auth;

class PrescriptionController extends Controller
{

    protected $prescription;

    public function __construct(Prescription $prescription)
    {
        $this->prescription = $prescription;
    }

    public function index()
    {
        return view('frontend.prescription.prescriptions-list');
    }

    public function getJsonList()
    {
        $prescription = $this->prescription->with('getUser', 'getAllItemPrescriptions')
            ->getPrescriptionsByUser(Auth::user()->id)
            ->orderBy('id', 'desc')->paginate(10);
            
        return  Response::json($prescription);
    }

    public function editPrescription($id)
    {

    }
    
    public function addNewPrescription()
    {

    }
}
