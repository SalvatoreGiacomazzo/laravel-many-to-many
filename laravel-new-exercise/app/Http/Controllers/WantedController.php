<?php

namespace App\Http\Controllers;

use App\Models\Wanted;
use App\Models\Device;

use Illuminate\Http\Request;

class WantedController extends Controller
{
    public function __construct()
    {

        $this->middleware("auth");
    }

    public function index()
    {


        $wantedList = Wanted::paginate(10);

        return view('wanted.home', ['wantedList' => $wantedList]);
    }
    public function show($id)
    {

        $wanted = Wanted::findOrFail($id);


        return view('wanted.show', compact('wanted'));
    }

    public function create()
    {

        $devices = Device::all();
        return view('wanted.create', compact('devices'));
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:50',
            'felony' => 'required|string|max:255',
            'device_id' => 'required|integer|exists:devices,id',
        ]);


        $wanted = new Wanted();
        $wanted->name = $validatedData['name'];
        $wanted->last_name = $validatedData['last_name'];
        $wanted->date_of_birth = $validatedData['date_of_birth'];
        $wanted->nationality = $validatedData['nationality'];
        $wanted->felony = $validatedData['felony'];
        $wanted->device_id = $validatedData['device_id'];


        $wanted->save();


        return redirect()->route('admin.wanted.home')->with('success', 'Wanted criminal created successfully!');
    }
}