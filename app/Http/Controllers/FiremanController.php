<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUpdateProfileFireman;
use App\Models\Notification;
use App\Models\Report;
use App\Models\ReportMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FiremanController extends Controller
{
    public function geoLocationView()
    {
        if (!Auth::user()->isNullLatLong()) {
            return \redirect()->route('fireman.home');
        }
        return view("app.dashboard.fireman.add-locations");
    }

    public function geoLocationViewNew()
    {
        if (!Auth::user()->isNullLatLong()) {
            return \redirect()->route('fireman.home');
        }
        return view("new_app.dashboard.fireman.add-locations");
    }

    public function reportStatus($status)
    {
        $user = Auth::user();

        $getReport = Report::with("fireman")
            ->where("fireman_id", $user->id);

        if ($status != "all") {
            $getReport->where("report_status", $status)
                ->orderBy("id", "DESC");
        } else {
            $getReport->orderBy("id", "ASC");
        }

        $getReport =  $getReport->get();
        $response["data"] = $getReport;
        return \response()->json($response);
    }

    public function detailReport($id)
    {
        $user = Auth::user();
        $report = Report::with(["user", "fireman"])
            ->where("id", $id)
            ->where("fireman_id", $user->id)
            ->first();
        if (!$report) {
            \abort(404);
        }

        return view("app.dashboard.fireman.detail-report", \compact("report"));
    }

    public function reportView()
    {
        return view("app.dashboard.fireman.report");
    }

    public function geoLocationPost(Request $request)
    {
        $rules = [
            "latitude" => ["required"],
            "longitude" => ["required"],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return \redirect()->back()->with("errors", "Silahkan tentukan lokasi unit kebakaran lebih dahulu!");
        }
        $latitude = (float)$request->latitude;
        $longitude = (float)$request->longitude;
        $user = Auth::user();
        $user->longitude = $longitude;
        $user->latitude = $latitude;
        $user->update();
        return \redirect()->route("fireman.home")->with('success', "berhasil simpan data titik lokasi");
    }

    public function sendMessage(Request $request, $reportId)
    {
        $message = $request->message;
        $newMessage = new ReportMessage();
        $newMessage->report_id = $reportId;
        $newMessage->user_id = Auth::user()->id;
        $newMessage->message = $message;
        $newMessage->save();
        $findReport = Report::with("user")->find($reportId);
        Notification::newNotif($findReport->user_id, "Hallo, kamu ada pesan baru yang belum dibaca nih, yuk dicheck :')", route('user.detail.report',$findReport->id));
        $messages = ReportMessage::where("report_id", $reportId)
            ->orderBy("id", "ASC")
            ->get();
        $response["total_message"] = count($messages);
        return \response()->json($response);
    }

    public function getMessage($reportId)
    {

        $messages = ReportMessage::with("user")
            ->where("report_id", $reportId)
            ->orderBy("id", "ASC")
            ->get();
        $response["data"] = $messages;
        return \response()->json($response);
    }

    public function updateReport($reportId, $status)
    {
        $response = [
            "status" => true,
        ];
        $findReport = Report::with(["user","fireman"])->find($reportId);
        if (!$findReport)
            \abort(500);

        switch ($status) {
            case 'dibatalkan':
            case 'selesai':
            case 'ditolak':
            case 'diproses':
                break;
            default:
                \abort(500);
                break;
        }
        Notification::newNotif($findReport->user_id, "Hallo, {$findReport->user->name}. laporan kamu ke {$findReport->fireman->name} telah {$status}", route('user.detail.report',$findReport->id));
        $findReport->report_status = $status;
        $findReport->update();
        $response["data"] = $findReport;
        return \response()->json($response);
    }

    public function homeView()
    {
        $user = Auth::user();
        $reportActive = Report::with("fireman")
            ->where("fireman_id", $user->id)
            ->where("report_status", "diproses")
            ->first();
        $queryLaporan = "count(*) AS total_laporan,
                        count(CASE WHEN report_status = 'selesai' THEN 1 END) AS jumlah_selesai";
        $dataLaporan = DB::table("reports")->select(DB::raw($queryLaporan))->where("fireman_id", Auth::user()->id)->first();
        $levelCaseQuery = "count(CASE WHEN type_report = '1' THEN 1 END) AS level1,
                        count(CASE WHEN type_report = '2' THEN 1 END) AS level2,
                        count(CASE WHEN type_report = '3' THEN 1 END) AS level3";
        $caseLevel = DB::table("reports")->select(DB::raw($levelCaseQuery))->where("fireman_id", Auth::user()->id)->first();
        $querySum = "sum(rating) AS total";
        $sum = DB::table("reports")
            ->select(DB::raw($querySum))
            ->where("fireman_id", $user->id)
            ->where("rating","!=", null)
            ->first();
        $countData = DB::table("reports")
            ->select(DB::raw("count(*)"))
            ->where("fireman_id", $user->id)
            ->where("rating","!=", null)
            ->first();
        $rating =  $sum->total == 0 || $countData->count == 0 ? 0 : $sum->total / $countData->count;
        $data[] = "reportActive";
        $data[] = "rating";
        $data[] = "dataLaporan";
        $data[] = "caseLevel";
        return view("app.dashboard.fireman.home", \compact($data));
    }

    public function profileView()
    {
        return view("app.dashboard.fireman.profil");
    }

    public function profilePost(RequestUpdateProfileFireman $request)
    {
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        $user->address = $request->address;
        $user->latitude = $latitude;
        $user->longitude = $longitude;
        $user->update();

        return \redirect()->back()->with("success", "sukses simpan data profil");
    }
}
