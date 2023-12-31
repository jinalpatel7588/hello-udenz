<?php

namespace App\Http\Controllers;

use App\Mail\MyMail;
use App\Mail\WaitingMail;
use App\Models\WaitingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function ApplyWaitingList(Request $request)
    {
        $waiting = new WaitingList();
        
        $waiting->waitingEmail = $request->waitingEmail;
        $waiting->name = $request->name;
        $waiting->number = $request->number;

        $waiting->save();
        $data = [
            'mail' => $waiting->waitingEmail,
        ];
        // Mail::to($waiting->waitingEmail)->send(new WaitingMail($data));
        return redirect()->route('index')->with('success', "Your email has been submitted successfully");
    }

    public function waitingList(Request $request)
    {

        $waitingList = WaitingList::paginate(25);
        return view('pages.admin.waiting-list.index', compact('waitingList'));
    }

    public function exportCSV()
    {
        $fileName = 'WaitingList.csv';
        $WaitingList = WaitingList::get();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        $columns = array('Name', 'Number', 'waiting Email', 'Created');
        $callback = function () use ($WaitingList, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($WaitingList as $list) {
                $row['Name']  = $list->name;
                $row['Number']    = $list->number;
                $row['waiting Email']    = $list->waitingEmail;
                $row['Created']  = $list->created_at;
                fputcsv($file, array($row['Name'], $row['Number'], $row['waiting Email'], $row['Created']));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);

    }
    public function uniqueEmail(Request $request)
    {
        $uniemail = WaitingList::where('waitingEmail', $request->waitingEmail)->get();
        if (count($uniemail) > 0) {
            echo json_encode(false);
        } else {
            echo json_encode(true);
        }
    }
}