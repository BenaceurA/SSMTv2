<?php

namespace App\Http\Controllers;

use App\Models\Spontaneous;
use Illuminate\Http\Request;

class spontaneousController extends Controller
{
    function SpontaneousJobForm()
    {
        return view("form")->with(["type" => "spontaneous", "type2" => "job"]);
    }
    function SpontaneousInternshipForm()
    {
        return view("form")->with(["type" => "spontaneous", "type2" => "internship"]);
    }
    function postSpontaneous(Request $request)
    {
        $si = new spontaneous;
        $data = $request->input();
        $si->Candidature = $data["Candidature"];

        if ($data["Candidature"] == "stage") {
            $si->Type_de_stage = $data["Type_de_stage"];
            $si->Period_start = $data["Period_start"];
            $si->Period_end = $data["Period_end"];
        }

        if ($data["Candidature"] == "emploi") {
            $si->Poste = $data["Poste"];
            $si->Années_expérience = $data["Années_d'expérience"];
        }

        $si->Département = $data["Département"];
        $si->Nom_Prenom = $data['Nom_Prenom'];
        $si->Adresse_mail = $data["Adresse_mail"];
        $si->Téléphone = $data["Téléphone"];
        $si->Adresse = $data["Adresse"];
        $si->Ville = $data["Ville"];
        $si->Sexe = $data["Sexe"];
        $si->Date_de_naissance = $data["Date_de_naissance"];
        $si->Niveau_étude = $data["Niveau_d'étude"];
        $si->Etablissement_de_formation = $data["Etablissement_de_formation"];
        $si->Motivation = $data["Motivation"];

        if ($request->hasFile('CV')) { // TODO : CHECK IF DOC/PDF
            $filenameWithExt = $request->file('CV')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('CV')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('CV')->storeAs('public/Jobs/CVs', $filenameToStore);
            $si->CV = $filenameToStore;
        } else {
            return back();
        }
        if ($request->hasFile('lettre')) { // TODO : CHECK IF DOC/PDF
            $filenameWithExt = $request->file('lettre')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('lettre')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('lettre')->storeAs('public/Jobs/Lettres', $filenameToStore);
            $si->Lettre_motivation = $filenameToStore;
        }

        $si->save();

        return redirect("/");
    }
}
