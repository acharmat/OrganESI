<?php

use App\Conge;
use App\User;
use App\Diplome;



function enseignant_list(){

    return  User::where('active','oui')
        ->select(['id', 'nom', 'prenom','photo'])
        ->get();
}

function unread_conge(){

    return  Conge::join('enseignant', 'conge.id_ensg', '=', 'enseignant.id')
        ->select(['conge.id', 'enseignant.nom', 'enseignant.prenom', 'enseignant.photo', 'conge.Date_debut', 'conge.Date_fin', 'conge.decision', 'conge.Type'])
        ->where('decision','مراجعة')->get();
}

function count_conge(){

    return Conge::where('decision','مراجعة')->count();
}

function count_statu(){
    return   User::where([
        ['statu', '=', 'متربص'],
        ['date_r', '<', date('Y-m-d', strtotime('-1 years'))],
    ])->count();

}
function statu(){
    return User::where([
        ['statu', '=', 'متربص'],
        ['date_r', '<', date('Y-m-d', strtotime('-1 years'))],
    ])->get();

}

function count_sexe($sexe){

    if($sexe=="ذكر"){
        return User::where('sexe','ذكر')->count();
    }else if($sexe=="أنثى"){
        return User::where('sexe','أنثى')->count();
    }


}

function count_spec($diplome){

    if($diplome=="اعلام الي"){
        return Diplome::where('spec','اعلام الي')->count();
    }else if($diplome=="الكترونيك"){
        return Diplome::where('spec','الكترونيك')->count();
    }else if($diplome=="رياضيات"){
        return Diplome::where('spec','رياضيات')->count();
    }else if($diplome=="فيزياء"){
        return Diplome::where('spec','فيزياء')->count();
    }else if($diplome=="لغة انجليزية"){
        return Diplome::where('spec','لغة انجليزية')->count();
    }else if($diplome=="لغة فرنسية"){
        return Diplome::where('spec','لغة فرنسية')->count();
    }
}
