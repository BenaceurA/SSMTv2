<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Job_Offers;

class jobAdminController extends Controller
{
    function jobCreationIndex()
    {
        $result = DB::table('job_offers')->get();
        return view("/admin/create", ["view" => "create", "data" => $result]);
    }

    function jobApplicationsIndex(Request $request)
    {
        $data = $request->all();
        if (isset($data["Option"])) {
            $option = array_splice($data, 0, 1);
            switch ($option["Option"]) {
                case "AND":
                    $result = DB::table('jobs')->where($data)->get();
                    break;

                case "OR":
                    $result = DB::table('jobs')->orWhere($data)->get();
                    break;
            }
        } else {
            $result = DB::table('jobs')->where($data)->get();
        }
        return view("/admin/jobs", ["view" => "jobs", "data" => $result]);
    }

    function createJobOffer(Request $request)
    {
        //id creer offre Direction Département Description Activation
        $job_offer = new Job_Offers();
        $data = $request->input();
        $job_offer->Offre = $data["Offre"];
        $job_offer->Direction = $data["Direction"];
        $job_offer->Département = $data["Département"];
        $job_offer->Description = $data["Description"];
        $job_offer->Activation = $data["Activation"];
        $job_offer->save();

        return redirect("/create");
    }

    function deleteJobApplications(Request $request)
    {
        //delete files
        foreach ($request->all() as $key => $value) {
            $query =  DB::table('jobs')->where('id', $value)->get(["CV", "Lettre_motivation"])->first();
            Storage::delete(["public/CVs/" . $query->CV, "public/Lettres/" . $query->Lettre_motivation]);
        }

        return Job::destroy($request->all());
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
        $data = $request->all();

        return DB::table("job_offers")->whereIn("id", $data)->delete();
    }

    function downloadCVs(Request $request)
    {
        $id = $request->query('id');
        $cvName = DB::table('jobs')->where('id', $id)->first('CV')->CV;
        return Storage::download("public/CVs/" . $cvName);
    }
    function downloadLetters(Request $request)
    {
        $id = $request->query('id');
        $LettreName = DB::table('jobs')->where('id', $id)->first('Lettre_motivation')->Lettre_motivation;
        return Storage::download("public/Lettres/" . $LettreName);
    }
}
