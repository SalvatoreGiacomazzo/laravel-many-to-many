<?php

namespace App\Http\Controllers;

use App\Models\Wanted;
use App\Models\Device;
use App\Models\Felony;

use Illuminate\Http\Request;

class WantedController extends Controller
{
    public function __construct()
    {

        $this->middleware("auth");
    }

    public function index()
    {


        $wantedList = Wanted::with('felonies')->paginate(10);

        return view('wanted.home', ['wantedList' => $wantedList]);
    }
    public function show($id)
    {

        $wanted = Wanted::findOrFail($id);


        return view('wanted.show', compact('wanted'));
    }

    public function create()
    {

        $felonies = [
            'Scam',
            'DDos Attack',
            'Identity Theft',
            'Malware Distribution',
            'Phishing',
            'Security Breaching',
            'Copyright Violation',
            'Espionage'
        ];

        $felonies = Felony::all();

        $devices = Device::all();
        return view('wanted.create', compact('devices', 'felonies'));
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:50',
            'felony' => 'required|array|max:4',
            'felony.*' => 'exists:felonies,id',
            'device_id' => 'required|integer|exists:devices,id',
        ]);


        $wanted = Wanted::create([
            'name' => $validatedData['name'],
            'last_name' => $validatedData['last_name'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'nationality' => $validatedData['nationality'],
            'device_id' => $validatedData['device_id'],
        ]);


        $wanted->felonies()->attach($validatedData['felony']);


        return redirect()->route('admin.wanted.home')->with('success');
    }


    public function destroy($id)
    {
        $wanted = Wanted::findOrFail($id);

        $wanted->felonies()->detach();

        $wanted->delete();

        return redirect()->route('admin.wanted.home')->with('success');
    }
}
