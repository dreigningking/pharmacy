<?php

namespace App\Http\Controllers;

use App\Models\LoanApplication;
use App\Models\Reapplication;

class PagesController extends Controller
{

  public function all_customers()
  {
    if (!isset($_GET['month'])) $date = date_parse(now());
    else $date = date_parse($_GET['month']);

    $applications = $this->application()
      ->whereMonth('date_created', $date['month'])
      ->whereYear('date_created', $date['year'])->get();
    $reapplications = $this->reapplication()
      ->whereMonth('date_created', $date['month'])
      ->whereYear('date_created', $date['year'])->get();

    $month = ($date['month'] < 10) ? '0' . $date['month'] : $date['month'];
    $date = $date['year'] . '-' . $month;
    return view('all_customers', compact('applications', 'reapplications', 'date'));
  }

  public function performance()
  {
    if (!isset($_GET['month'])) $date = date_parse(now());
    else $date = date_parse($_GET['month']);

    $applications = $this->application()
      ->whereMonth('date_created', $date['month'])
      ->whereYear('date_created', $date['year'])->get();
    $reapplications = $this->reapplication()
      ->whereMonth('date_created', $date['month'])
      ->whereYear('date_created', $date['year'])->get();

    $month = ($date['month'] < 10) ? '0' . $date['month'] : $date['month'];
    $date = $date['year'] . '-' . $month;
    return view('performance', compact('applications', 'reapplications', 'date'));
  }

  public function rejected_applications()
  {
    if (!isset($_GET['month'])) $date = date_parse(now());
    else $date = date_parse($_GET['month']);

    $applications = LoanApplication::with('reapplication')->where('user_unique_id', Auth()->user()->unique_id)
        ->where('loan_status', 'Rejected')
        ->whereMonth('date_created', $date['month'])
        ->whereYear('date_created', $date['year'])->get();
    $reapplications = Reapplication::with('application')
        ->where('user_unique_id', Auth()->user()->unique_id)
        ->where('status', 'Rejected')
        ->whereMonth('date_created', $date['month'])
        ->whereYear('date_created', $date['year'])->get();

    $month = ($date['month'] < 10) ? '0' . $date['month'] : $date['month'];
    $date = $date['year'] . '-' . $month;
    return view('rejected_applications', compact('applications', 'reapplications', 'date'));
  }
}
