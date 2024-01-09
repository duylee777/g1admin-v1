<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataView = [];
        $agencies = Agency::orderBy('id', 'ASC')->paginate(10);
        $dataView['agencies'] = $agencies;
        return view('admin.agency.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.agency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(count(Agency::get()) == 0){
            $idNewAgency = 1;
        }
        else {
            $idLastAgency = Agency::latest()->first()->id;
            $idNewAgency =  $idLastAgency + 1;
        }
        
        $logoName = time().'_'.$request->file('logo')->getClientOriginalName();
        $linkStorage = "public/agencies/".$idNewAgency."/";
        $request->logo->storeAs($linkStorage, $logoName);

        $newAgencyData = [
            "slug" => $request->slug,
            "name" => $request->name,
            "logo" => $logoName,
            "phone" => $request->phone,
            "email" => $request->email,
            "address" => $request->address,
            "city" => $request->city,
            "map_link" => json_encode($request->map_link),
            "product_link" => json_encode($request->product_link),
        ];
        Agency::create($newAgencyData);
        return redirect()->route('agency.index')->with(['msg' => 'Đã thêm đại lý mới !']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('agency.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataView = [];
        $agency = Agency::find($id);
        $dataView['agency'] = $agency;
        return view('admin.agency.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $agency = Agency::find($id);

        $updateAgencyData = [
            "slug" => $request->slug,
            "name" => $request->name,
            "phone" => $request->phone,
            "email" => $request->email,
            "address" => $request->address,
            "city" => $request->city,
            "map_link" => json_encode($request->map_link),
            "product_link" => json_encode($request->product_link),
        ];

        if($request->file('logo') != null) {
            $logoName = time().'_'.$request->file('logo')->getClientOriginalName();
            if($logoName != $agency->logo) {
                $linkStorage = "public/agencies/".$id."/";
                $request->logo->storeAs($linkStorage, $logoName);
                $updateAgencyData["logo"] = $logoName;
            }
        }

        Agency::where('id', $id)->update($updateAgencyData);
        return redirect()->route('agency.index')->with(['msg' => 'Cập nhật đại lý thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        $agency->delete();
        return redirect()->route('agency.index')->with(['msg' => 'Đã xóa đại lý !']);
    }
}
