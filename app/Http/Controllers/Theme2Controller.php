<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Theme2Controller extends Controller
{
    public function datenschutzerklarung()
    {
        return view('theme2/datenschutzerklarung');
    }

    public function datenschutzerklarungIndex(){
        return view('theme2/datenschutzerklarung/index');
    }

    public function datenschutzerklarungKunden(){
        return view('theme2/datenschutzerklarung/kunden');
    }

    public function datenschutzerklarungLieferanten()
    {
        return view('theme2/datenschutzerklarung/lieferanten-drittanbieter');
    }

    public function faq()
    {
        return view('theme2/faq');
    }

    public function agb()
    {
        return view('theme2/agb/index');
    }

    public function agbKunden()
    {
        return view('theme2/agb/kunden');
    }

    public function agbLieferanten()
    {
        return view('theme2/agb/lieferanten');
    }
    public function agbLieferantenKunden()
    {
        return view('theme2/agb/kunden-lieferanten');
    }
}
