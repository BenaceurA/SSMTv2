<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Spontaneous;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class spontaneousAdminController extends Controller
{
    function spontaneousApplicationsIndex(Request $request)
    {

        $data = $request->all();
        if (isset($data["Option"])) {
            $option = array_splice($data, 0, 1);
            if (isset($data["Date_de_naissance"])) {
                $i = array_search("Date_de_naissance", array_keys($data));
                $dob = array_splice($data, $i, 1);
            }
            switch ($option["Option"]) {
                case "AND":
                    $result = DB::table('spontaneous')->where($data);
                    break;

                case "OR":
                    $result = DB::table('spontaneous')->orWhere($data);
                    break;
            }

            if (isset($dob)) {

                switch ($dob["Date_de_naissance"]) {
                    case '18-22':
                        $from = date('Y-m-d', strtotime('now -22 years'));
                        $to = date('Y-m-d', strtotime('now -18 years'));
                        break;

                    case '23-27':
                        $from = date('Y-m-d', strtotime('now -27 years'));
                        $to = date('Y-m-d', strtotime('now -23 years'));
                        break;

                    case '28-32':
                        $from = date('Y-m-d', strtotime('now -32 years'));
                        $to = date('Y-m-d', strtotime('now -28 years'));
                        break;

                    case '33-37':
                        $from = date('Y-m-d', strtotime('now -37 years'));
                        $to = date('Y-m-d', strtotime('now -33 years'));
                        break;

                    case '38-42':
                        $from = date('Y-m-d', strtotime('now -42 years'));
                        $to = date('Y-m-d', strtotime('now -38 years'));
                        break;

                    case '42+':
                        $from = date('Y-m-d', strtotime('now -100 years'));
                        $to = date('Y-m-d', strtotime('now -42 years'));
                        break;
                }
                switch ($option["Option"]) {
                    case "AND":
                        $result = $result->whereBetween('Date_de_naissance', [$from, $to]);
                        break;

                    case "OR":
                        $result = $result->orWhereBetween('Date_de_naissance', [$from, $to]);
                        break;
                }
            }
            $result = $result->get();
        } else {
            $result = DB::table('spontaneous')->where($data)->get();
        }

        return view("/admin/spontaneous", ["view" => "spontaneous", "data" => $result, "username" => adminController::getUsername()]);
    }

    function deleteSpontaneousApplications(Request $request)
    {
        $userId = Auth::id();
        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        foreach ($request->all() as $key => $value) {
            //check if emploi or stage then get permission
            $candidature =  DB::table('spontaneous')->where('id', $value)->get(["Candidature"])->first()->Candidature;
            if ($candidature == "emploi" && $permission->SC_E_CS) {
                $query =  DB::table('spontaneous')->where('id', $value)->get(["CV", "Lettre_motivation"])->first();
                Storage::delete(["public/Jobs/CVs/" . $query->CV, "public/Jobs/Lettres/" . $query->Lettre_motivation]); //delete files
                Spontaneous::destroy($value);
            } elseif ($candidature == "stage" && $permission->SC_S_CS) {
                $query =  DB::table('spontaneous')->where('id', $value)->get(["CV", "Lettre_motivation"])->first();
                Storage::delete(["public/Internships/CVs/" . $query->CV, "public/Internships/Lettres/" . $query->Lettre_motivation]); //delete files
                Spontaneous::destroy($value);
            }
        }
        return 1;
    }
}
