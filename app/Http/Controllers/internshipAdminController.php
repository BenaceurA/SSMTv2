<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Internship_Offers;
use App\Models\Internship;

class internshipAdminController extends Controller
{
    function internshipCreationIndex()
    {
        $result = DB::table('internship_offers')->get();
        return view("/admin/create", [
            "view" => "createInternships",
            "userID" => Auth::id(),
            "data" => $result,
            "username" => adminController::getUsername()
        ]);
    }

    function internshipApplicationsIndex(Request $request)
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

        if (isset($data["Option"])) {
            $option = array_splice($data, 0, 1);
            if (isset($data["Date_de_naissance"])) {
                $i = array_search("Date_de_naissance", array_keys($data));
                $dob = array_splice($data, $i, 1);
            }
            switch ($option["Option"]) {
                case "AND":
                    $result = DB::table('internships')->where($data);
                    break;

                case "OR":
                    $result = DB::table('internships')->orWhere($data);
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
                ->appends($query_cache);
        } else {
            $result = DB::table('internships')
                ->where($data)
                ->paginate(15, ['*'], 'page', $page);
        }

        return view("/admin/BD", [
            "view" => "internships",
            "userID" => Auth::id(),
            "data" => $result,
            "username" => adminController::getUsername()
        ]);
    }

    function createInternshipOffer(Request $request)
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

        if ($permission->AO_S) {
            $internship_offer = new Internship_Offers();

            $internship_offer->Offre = $data["Offre"];
            $internship_offer->Direction = $data["Direction"];
            $internship_offer->Département = $data["Département"];
            $internship_offer->Description = $data["Description"];
            $internship_offer->Activation = $data["Activation"];
            $internship_offer->save();
        } else {
            return response("", 405);
        }
        return response("ok", 200);
    }

    function updateInternshipOffer(Request $request)
    {
        $userId = $request["userID"];
        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        if ($permission->MO_S) {
            $data = $request->input();
            $internship_offer = Internship_Offers::find($data["id"]);
            $internship_offer->Offre = $data["Offre"];
            $internship_offer->Direction = $data["Direction"];
            $internship_offer->Département = $data["Département"];
            $internship_offer->Description = $data["Description"];
            $internship_offer->Activation = $data["Activation"];
            $internship_offer->save();
            // DB::table('internship_offers')->where("id", $data["id"])->update([
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

    function deleteInternshipApplications(Request $request)
    {
        $userId = $request["userID"];
        $data = $request["ids"];
        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        if ($permission->SC_S) {
            foreach ($data as $key => $value) {
                $candidature =  DB::table('internships')->where('id', $value)->first();
                if ($candidature != null) {
                    $query =  DB::table('internships')->where('id', $value)->get(["CV"])->first();
                    Storage::delete(["public/Internships/CVs/" . $query->CV]); //delete files
                    Internship::destroy($value);
                }
            }
            return response("", 200);
        } else {
            return response("", 403);
        }
    }

    function activateInternshipOffers(Request $request)
    {
        $array = $request->all();
        $activation = $array[0];
        $data = $array[1];

        DB::table("internship_offers")->whereIn("id", $data)->update(['Activation' => $activation]);

        return response("ok", 200);
    }

    function deleteInternshipOffers(Request $request)
    {
        $data = $request["ids"];
        $userId = $request["userID"];

        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        if ($permission->SO_S) {
            return DB::table("internship_offers")->whereIn("id", $data)->delete();
        } else {
            return response("", 405);
        }
    }

    function downloadCVs(Request $request)
    {
        $userId = $request->query("userID");
        $permission = DB::table("user_permissions")->where('user_id', $userId)->first();

        if ($permission->TC_S) {
            $id = $request->query('id');
            $cvName = DB::table('internships')->where('id', $id)->first('CV')->CV;
            return Storage::download("public/Internships/CVs/" . $cvName);
        }
    }

    function internshipDescription(Request $request)
    {
        $description = DB::table('internship_offers')->where('id', $request->all()["id"])->first()->Description;
        return $description;
    }

    function applicationExists($id)
    {
        if ((DB::table('internships')->where('id', $id)->first()) == null) {
            return response("not found", 404);
        }
        return response("ok", 200);
    }

    function offerExists($id)
    {
        if ((DB::table('internship_offers')->where('id', $id)->first()) == null) {
            return response("not found", 404);
        }
        return response("ok", 200);
    }
}
