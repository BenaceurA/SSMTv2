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
        return view("/admin/create", [
            "view" => "createJobs",
            "userID" => Auth::id(),
            "data" => $result,
            "username" => adminController::getUsername()
        ]);
    }

    function jobApplicationsIndex(Request $request)
    {
        $data = $request->all();
        $query_cache = $data; //save original query to append it later to pagination

        //get the page number and remove it from $data
        $page = 1;
        if (isset($data["page"])) {
            $i = array_search("page", array_keys($data));
            $page = array_splice($data, $i, 1);
            $page = $page["page"];
        }

        //if this is true then the filter was set
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
            $result = $result
                ->paginate(15, ['*'], 'page', $page)
                ->appends($query_cache); //append the query cached to the pagination links
        } else {
            //filter is not set
            $result = DB::table('jobs')
                ->where($data)
                ->paginate(15, ['*'], 'page', $page);
        }

        $offers = DB::table("jobs")->get(["Poste"])->unique();

        return view("/admin/BD", [
            "view" => "jobs",
            "userID" => Auth::id(),
            "data" => $result,
            "offers" => $offers,
            "username" => adminController::getUsername()
        ]);
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
        $userId = $request["userID"];
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
        $userId = $request["userID"];
        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        if ($permission->MO_E) {
            $data = $request->input();
            $job_offer = Job_Offers::find($data["id"]);
            $job_offer->Offre = $data["Offre"];
            $job_offer->Direction = $data["Direction"];
            $job_offer->Département = $data["Département"];
            $job_offer->Description = $data["Description"];
            $job_offer->Activation = $data["Activation"];
            $job_offer->save();
            // DB::table('job_offers')->where("id", $data["id"])->update([
            //     "Offre" => $data["Offre"],
            //     "Direction" => $data["Direction"],
            //     "Département" => $data["Département"],
            //     "Description" => $data["Description"],
            //     "Activation" => $data["Activation"]
            // ]);
        } else {
            return response("", 405);
        }

        return response("ok", 200);
    }

    function deleteJobApplications(Request $request)
    {
        $userId = $request["userID"];
        $data = $request["ids"];
        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        if ($permission->SC_E) {
            foreach ($data as $key => $value) {
                $candidature =  DB::table('jobs')->where('id', $value)->first();
                if ($candidature != null) {
                    $query =  DB::table('jobs')->where('id', $value)->get(["CV", "Lettre_motivation"])->first();
                    Storage::delete(["public/Jobs/CVs/" . $query->CV, "public/Internships/Lettres/" . $query->Lettre_motivation]); //delete files
                    Job::destroy($value);
                }
            }
            return response("", 200);
        } else {
            return response("", 403);
        }
    }

    function activateJobOffers(Request $request)
    {
        $array = $request->all();
        $activation = $array[0];
        $data = $array[1];

        DB::table("job_offers")->whereIn("id", $data)->update(['Activation' => $activation]);

        return response("ok", 200);
    }

    function deleteJobOffers(Request $request)
    {
        $data = $request["ids"];
        $userId = $request["userID"];

        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        if ($permission->SO_E) {
            DB::table("job_offers")->whereIn("id", $data)->delete();
            return response("ok", 200);
        } else {
            return response("", 405);
        }
    }

    function downloadCVs(Request $request)
    {
        $userId = $request->query("userID");
        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        if ($permission->TC_E) {
            $id = $request->query('id');
            $cvName = DB::table('jobs')->where('id', $id)->first('CV')->CV;
            return Storage::download("public/Jobs/CVs/" . $cvName);
        }
    }

    function downloadLetters(Request $request)
    {
        $userId = $request->query("userID");
        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        if ($permission->TL_E) {
            $id = $request->query('id');
            $LettreName = DB::table('jobs')->where('id', $id)->first('Lettre_motivation')->Lettre_motivation;
            if ($LettreName) {
                return Storage::download("public/Jobs/Lettres/" . $LettreName);
            }
        }
    }

    function jobDescription(Request $request)
    {
        $description = DB::table('job_offers')->where('id', $request->all()["id"])->first()->Description;
        return $description;
    }

    function applicationExists($id)
    {
        if ((DB::table('jobs')->where('id', $id)->first()) == null) {
            return response("not found", 404);
        }
        return response("ok", 200);
    }

    function offerExists($id)
    {
        if ((DB::table('job_offers')->where('id', $id)->first()) == null) {
            return response("not found", 404);
        }
        return response("ok", 200);
    }

    function jobApplicationMotivation($id)
    {
        $motivation = DB::table('jobs')->where('id', $id)->first()->Motivation;
        return $motivation;
    }
}
