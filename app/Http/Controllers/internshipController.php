<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class internshipController extends Controller
{
    function InternshipForm($id)
    {
        $internship_offer = DB::table('internship_offers')->where('id', $id)->first();
        return view("form")->with(['offer' => $internship_offer, "type" => "stage"]);
    }

    function postStage(Request $request)
    {
        $internship = new Internship;
        $data = $request->input();
        $internship->Poste = $data["Poste"];
        $internship->Direction = $data["Direction"];
        $internship->Département = $data["Département"];
        $internship->Nom_Prenom = $data['Nom_Prenom'];
        $internship->Adresse_mail = $data["Adresse_mail"];
        $internship->Téléphone = $data["Téléphone"];
        $internship->Adresse = $data["Adresse"];
        $internship->Ville = $data["Ville"];
        $internship->Sexe = $data["Sexe"];
        $internship->Date_de_naissance = $data["Date_de_naissance"];
        $internship->Niveau_étude = $data["Niveau_d'étude"];
        $internship->Etablissement_de_formation = $data["Etablissement_de_formation"];
        $internship->Années_expérience = $data["Années_d'expérience"];
        $internship->Motivation = $data["Motivation"];

        if ($request->hasFile('CV')) { // TODO : CHECK IF DOC/PDF
            $filenameWithExt = $request->file('CV')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('CV')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('CV')->storeAs('public/CVs', $filenameToStore);
            $internship->CV = $filenameToStore;
        } else {
            return back();
        }
        if ($request->hasFile('lettre')) { // TODO : CHECK IF DOC/PDF
            $filenameWithExt = $request->file('lettre')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('lettre')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('lettre')->storeAs('public/Lettres', $filenameToStore);
            $internship->Lettre_motivation = $filenameToStore;
        }

        $internship->save();

        return redirect("/");
    }
}
