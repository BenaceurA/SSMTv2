<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Job_Offers;
use Illuminate\Support\Facades\Auth;

class jobAdminController extends Controller
{
    function jobCreationIndex()
    {
        $result = DB::table('job_offers')->get();
        return view("/admin/create", ["view" => "create", "data" => $result, "username" => adminController::getUsername()]);
    }

    function jobApplicationsIndex(Request $request)
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
                    $result = DB::table('jobs')->where($data);
                    break;

                case "OR":
                    $result = DB::table('jobs')->orWhere($data);
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
            $result = DB::table('jobs')->where($data)->get();
        }

        return view("/admin/jobs", ["view" => "jobs", "data" => $result, "username" => adminController::getUsername()]);
    }

    function createJobOffer(Request $request)
    {
        // get the authenticated user then check if AO_E is true;
        $data = $request->validate([
            'Offre' => 'required',
            'Direction' => 'required',
            'Département' => 'required',
            'Description' => 'required',
            'Activation' => 'required',
        ]);
        $userId = Auth::id();
        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        if ($permission->AO_E) {
            $job_offer = new Job_Offers();

            $job_offer->Offre = $data["Offre"];
            $job_offer->Direction = $data["Direction"];
            $job_offer->Département = $data["Département"];
            $job_offer->Description = $data["Description"];
            $job_offer->Activation = $data["Activation"];
            $job_offer->save();
        } else {
            return response("", 405);
        }
        return response("ok", 200);
    }

    function updateJobOffer(Request $request)
    {

        $userId = Auth::id();
        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        if ($permission->MO_E) {
            $data = $request->input();
            DB::table('job_offers')->where("id", $data["id"])->update([
                "Offre" => $data["Offre"],
                "Direction" => $data["Direction"],
                "Département" => $data["Département"],
                "Description" => $data["Description"],
                "Activation" => $data["Activation"]
            ]);
        } else {
            return response("", 405);
        }

        return response("ok", 200);
    }

    function deleteJobApplications(Request $request)
    {
        $userId = Auth::id();
        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();
        if ($permission->SC_E) {
            foreach ($request->all() as $key => $value) {
                $query =  DB::table('jobs')->where('id', $value)->get(["CV", "Lettre_motivation"])->first();
                Storage::delete(["public/CVs/" . $query->CV, "public/Lettres/" . $query->Lettre_motivation]); //delete files
            }
            return Job::destroy($request->all());
        } else {
            return response("", 405);
        }
    }

    function activateJobOffers(Request $request)
    {
        $array = $request->all();
        $activation = $array[0];
        $data = $array[1];

        return DB::table("job_offers")->whereIn("id", $data)->update(['Activation' => $activation]);
    }

    function deleteJobOffers(Request $request)
    {
        $userId = Auth::id();
        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        if ($permission->SO_E) {
            $data = $request->all();
            return DB::table("job_offers")->whereIn("id", $data)->delete();
        } else {
            return response("", 405);
        }
    }

    function downloadCVs(Request $request)
    {
        $userId = Auth::id();
        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        if ($permission->TC_E) {
            $id = $request->query('id');
            $cvName = DB::table('jobs')->where('id', $id)->first('CV')->CV;
            return Storage::download("public/CVs/" . $cvName);
        }
    }

    function downloadLetters(Request $request)
    {
        $userId = Auth::id();
        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        if ($permission->TL_E) {
            $id = $request->query('id');
            $LettreName = DB::table('jobs')->where('id', $id)->first('Lettre_motivation')->Lettre_motivation;
            if ($LettreName) {
                return Storage::download("public/Lettres/" . $LettreName);
            }
        }
    }
}
