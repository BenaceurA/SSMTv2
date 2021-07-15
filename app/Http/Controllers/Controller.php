<?php

namespace App\Http\Controllers;

use App\Models\Job_Offers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function main()
    {
        return view("main");
    }

    function search(Request $request)
    {
        $data = $request->input();

        switch ($data["select1"]) {
            case "Offre d'emploi":

                if ($data["select2"] != null) {
                    $query = DB::table('job_offers')->where(['Département' => $data["select2"], 'Activation' => 1]);
                } else {
                    $query = DB::table('job_offers')->where(['Activation' => 1]);
                }
                $result = $query->get();
                return view("offres")->with(["result" => $result, "type" => "emploi"]);
                break;

            case "Offre de stage":

                if ($data["select2"] != null) {
                    $query = DB::table('internship_offers')->where(['Département' => $data["select2"], 'Activation' => 1]);
                } else {
                    $query = DB::table('internship_offers')->where(['Activation' => 1]);
                }
                $result = $query->get();
                return view("offres")->with(["result" => $result, "type" => "stage"]);
                break;

            case "Candidature spontanée":
                return redirect("/cs/$data[select2]");
                break;
        }
    }
}
