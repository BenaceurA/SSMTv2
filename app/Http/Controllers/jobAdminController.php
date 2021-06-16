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
        return view("/admin/create", ["view" => "create"]);
    }

    function jobApplicationsIndex(Request $request)
    {
        $data = $request->all();
        $option = array_splice($data, 0, 1);
        switch ($option["Option"]) {
            case "AND":
                $result = DB::table('jobs')->where($data)->get();
                break;

            case "OR":

                break;
        }
        return view("/admin/jobs", ["view" => "jobs", "data" => $result]);
    }

    function createJobOffer(Request $request)
    {
        $job_offer = new Job_Offers();
        $data = $request->input();
        $job_offer->Offre = $data["Offre"];
        $job_offer->Direction = $data["Direction"];
        $job_offer->Département = $data["Département"];
        $job_offer->Description = $data["Description"];
        $job_offer->Activation = $data["Activation"];
        $job_offer->save();

        return redirect("/");
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

    function filter(Request $request)
    {
        echo $request->all();
        //sexe- ville- niveau d’étude- stage ou offre d’emploi- année d’expérience – âge

        // $query = DB::table('jobs')->where();
        // return view("/admin/jobs", ["view" => "jobs", "data" => $result]);

    }

    function downloadCV(Request $request)
    {
    }
}
