<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function showForm()
    {
        return view('date_form');
    }

    public function calculateYears(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $start = new \DateTime($request->start_date);
        $end = new \DateTime($request->end_date);
        $years = [];

        $i = 1;
        while ($start < $end) {
            $next = (clone $start)->modify('+1 year -1 day');
            if ($next > $end) {
                $next = $end;
            }
            $years[] = "Year $i: " . $start->format('d-m-Y') . " to " . $next->format('d-m-Y');
            $start = $next->modify('+1 day');
            $i++;
        }

        return view('date_form', compact('years'));
    }
}
