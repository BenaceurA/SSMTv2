<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Mail\ApplicationReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class internshipController extends Controller
{
    function InternshipForm($id)
    {
        $internship_offer = DB::table('internship_offers')->where('id', $id)->first();
        return view("form")->with(['offer' => $internship_offer, "type" => "stage"]);
    }

    function postStage(Request $request)
    {
        $request->validate([
            'CV' => 'mimes:docx,doc,pdf',
            'lettre' => 'mimes:docx,doc,pdf',
        ]);

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
        $internship->Type_de_stage = $data["Type_de_stage"];
        if ($request->hasFile('CV')) {
            $filenameWithExt = $request->file('CV')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('CV')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('CV')->storeAs('public/Internships/CVs', $filenameToStore);
            $internship->CV = $filenameToStore;
        } else {
            return back();
        }

        $internship->save();

        if (isset($data["Adresse_mail"])) {
            Mail::to($data["Adresse_mail"])->send(new ApplicationReceived("Merci de votre candidature : $data[Poste]", $data['Nom_Prenom'], $data["Sexe"]));
        }

        return redirect("/");
    }
}
