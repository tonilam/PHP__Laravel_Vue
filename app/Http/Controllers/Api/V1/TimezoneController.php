<?php

namespace App\Http\Controllers\Api\V1;

use App\Timezone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimezoneController extends Controller
{
    /**
     * Display a listing of the resource.
     * If the timezone resource is not found in the database,
     * the system will get the timezone information from timezonedb.com
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Timezone::orderBy('gmtOffset','ASC')->orderBy('ZoneName','ASC')->get();
        if (sizeof($result) > 0) {
            return $result;
        } else {
            $url = 'http://api.timezonedb.com/v2/list-time-zone?key=JQZSP8UL7LKN&format=json';
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($curl);
            curl_close($curl);
            $decoded = json_decode($result);
            $zones = [];
            foreach ($decoded->zones as $item) {
                array_push($zones, array(
                    'countryCode' => $item->countryCode,
                    'countryName' => $item->countryName,
                    'zoneName' => $item->zoneName,
                    'gmtOffset' => $item->gmtOffset
                    ));
            }
            Timezone::insert($zones);
            return Timezone::orderBy('gmtOffset','ASC')->orderBy('ZoneName','ASC')->get();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
