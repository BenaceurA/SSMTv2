<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jobController extends Controller
{

    function JobForm($id)
    {
        $job_offer = DB::table('job_offers')->where('id', $id)->first();
        return view("formemploi")->with('offer', $job_offer);
    }

    function postEmploi(Request $request)
    {
        $job = new Job;
        $data = $request->input();
        $job->Poste = $data["Poste"];
        $job->Direction = $data["Direction"];
        $job->Département = $data["Département"];
        $job->Nom_Prenom = $data['Nom_Prenom'];
        $job->Adresse_mail = $data["Adresse_mail"];
        $job->Téléphone = $data["Téléphone"];
        $job->Adresse = $data["Adresse"];
        $job->Ville = $data["Ville"];
        $job->Sexe = $data["Sexe"];
        $job->Date_de_naissance = $data["Date_de_naissance"];
        $job->Niveau_étude = $data["Niveau_d'étude"];
        $job->Etablissement_de_formation = $data["Etablissement_de_formation"];
        $job->Années_expérience = $data["Années_d'expérience"];
        $job->Motivation = $data["Motivation"];

        if ($request->hasFile('CV')) { // TODO : CHECK IF DOC/PDF
            $filenameWithExt = $request->file('CV')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('CV')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('CV')->storeAs('public/CVs', $filenameToStore);
            $job->CV = $filenameToStore;
        } else {
            return back();
        }
        if ($request->hasFile('lettre')) { // TODO : CHECK IF DOC/PDF
            $filenameWithExt = $request->file('lettre')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('lettre')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('lettre')->storeAs('public/Lettres', $filenameToStore);
            $job->Lettre_motivation = $filenameToStore;
        }

        $job->save();

        return redirect("/");
    }
}
