<?php

namespace App\Http\Controllers;

use App\Events\NotifEvent;
use App\Http\Requests\RequestUpdateProfileUser;
use App\Models\Notification;
use App\Models\Report;
use App\Models\ReportDocument;
use App\Models\ReportMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function homeView()
    {
        $user = Auth::user();
        $reportActive = Report::with("fireman")
            ->where("user_id", $user->id)
            ->where("report_status", "diproses")
            ->first();
        $queryLaporan = "count(*) AS total_laporan,
                            count(CASE WHEN report_status = 'ditolak' THEN 1 END) AS jumlah_ditolak,
                            count(CASE WHEN report_status = 'selesai' THEN 1 END) AS jumlah_selesai";
        $dataLaporan = DB::table("reports")->select(DB::raw($queryLaporan))->where("user_id", $user->id)->first();
        $laporanGiveFeedBack = Report::with("fireman")
            ->where("user_id", $user->id)
            ->where("report_status", "selesai")
            ->where("rating", \null)
            ->get();
        $data[] = "reportActive";
        $data[] = "dataLaporan";
        $data[] = "laporanGiveFeedBack";
        return view("app.dashboard.user.home", \compact($data));
    }

    public function homeViewNew()
    {
        $user = Auth::user();
        $reportActive = Report::with("fireman")
            ->where("user_id", $user->id)
            ->whereIn("report_status", ["diproses","diperjalanan","pending"])
            ->orderBy("report_status", "ASC")
            ->first();
        $laporanGiveFeedBack = Report::with("fireman")
            ->where("user_id", $user->id)
            ->where("report_status", "selesai")
            ->where("rating", \null)
            ->get();
        $data[] = "reportActive";
        $data[] = "laporanGiveFeedBack";
        return view("new_app.dashboard.user.home", \compact($data));
    }

    public function profileView()
    {
        return view("app.dashboard.user.profil");
    }

    public function profileViewNew()
    {
        return view("new_app.dashboard.user.profile");
    }

    public function createReportView()
    {
        $firemans = User::getFiremansFree();
        if (count($firemans) == 0) {
            return redirect()->back()->with("notif_error", "Maaf, kamu tidak bisa membuat laporan sampai laporan ditindaklanjuti oleh damkar");
        }
        $dataArr[] = "firemans";
        return view("app.dashboard.user.create-report", \compact($dataArr));
    }

    public function createReport(Request $request)
    {
        $user = Auth::user();
        $firemanId = explode(",", $request->fireman_id)[2];
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $desc = $request->desc;
        $typeReport = $request->type_report;
        if (!$desc) {
            return \redirect()->back()->with("errors", "Silahkan isi deskripsi kejadian");
        }
        $newReport = new Report();
        $newReport->user_id = $user->id;
        $newReport->fireman_id = $firemanId;
        $newReport->latitude = $latitude;
        $newReport->longitude = $longitude;
        $newReport->type_report = $typeReport;
        $newReport->report_status = "pending";
        $newReport->description = $desc;
        $newReport->save();
        $messageNotif = "Hallo, {$newReport->fireman->name} ada laporan masuk nih yuk segera dicheck :')";
        Notification::newNotif($newReport->fireman_id, $messageNotif, route('fireman.detail.report', $newReport->id));

        return \redirect()->route("user.report")->with("success", "Berhasil membuat laporan");
    }

    function reportViewNew() {
        return view("new_app.dashboard.user.reports");
    }

    public function reportStatus($status)
    {
        $user = Auth::user();

        $getReport = Report::with("fireman")
            ->where("user_id", $user->id);

        if ($status == "history") {
            $getReport->whereIn("report_status", ["selesai", "dibatalkan", "ditolak"])->orderBy("id", "ASC");
        } else if ($status == "ongoing") {
            $getReport->whereIn("report_status", ["pending", "diproses"])->orderBy("report_status", "ASC");
        } else if ($status != "all") {
            $getReport->where("report_status", $status)
                ->orderBy("id", "DESC");
        } else {
            $getReport->orderBy("id", "DESC");
        }

        $getReport =  $getReport->get();
        $response["data"] = $getReport;
        return \response()->json($response);
    }

    public function detailReport($id)
    {
        $user = Auth::user();
        $report = Report::with("fireman","documents")
            ->where("id", $id)
            ->where("user_id", $user->id)
            ->first();

        if (!$report) {
            \abort(404);
        }

        return view("new_app.dashboard.user.detail-report", \compact("report"));
    }

    function historyReportView()
    {
        return view("new_app.dashboard.user.history-report");
    }

    function roomChatView($id) {
        $user = Auth::user();
        $report = Report::with(["user", "fireman"])
            ->where("id", $id)
            ->where("user_id", $user->id)
            ->first();
        if (!$report) {
            \abort(404);
        }
        return view("new_app.dashboard.user.room-chat", \compact("report"));
    }

    public function reportView()
    {
        return view("app.dashboard.user.report");
    }

    public function profilePost(RequestUpdateProfileUser $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phonenumber = "62" . $request->phonenumber;
        $user->address = $request->alamat;
        $user->gender = $request->gender;
        $user->update();

        return \redirect()->back()->with("success", "sukses simpan data profil");
    }

    public function sendMessage(Request $request, $reportId)
    {
        $message = $request->message;
        $newMessage = new ReportMessage();
        $newMessage->report_id = $reportId;
        $newMessage->user_id = Auth::user()->id;
        $newMessage->message = $message;
        $newMessage->save();

        $findReport = Report::with("fireman")->find($reportId);
        Notification::newNotif($findReport->fireman_id, "Hallo, kamu ada pesan baru yang belum dibaca nih, yuk dicheck :')", route('fireman.detail.report', $findReport->id));
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

        $findReport = Report::with("user")->find($reportId);
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
        $findReport->report_status = $status;
        $findReport->update();
        Notification::newNotif($findReport->fireman_id, "Hallo, laporan dari {$findReport->user->name} telah {$status}", route('fireman.detail.report', $findReport->id));
        $response["data"] = $findReport;
        return \response()->json($response);
    }

    public function giveRating($reportId, Request $request)
    {
        $findReport = Report::where("id", $reportId)
            ->where("user_id", Auth::user()->id)
            ->first();
        if (!$findReport)
            abort(500);

        $findReport->rating = $request->rating;
        $findReport->update();

        return response()->json(["status" => true]);
    }

    public function getFiremanByUUID($uuid)
    {
        return \response()->json([
            "data" => User::find($uuid),
        ]);
    }

    function callFiremanView() {
        $firemans = User::getFiremansFree();
        if (count($firemans) == 0) {
            return redirect()->back()->with("errors", "Maaf, kamu tidak bisa membuat laporan sampai laporan ditindaklanjuti oleh damkar");
        }
        $dataArr[] = "firemans";
        return view("new_app.dashboard.user.call-fireman", \compact("firemans"));
    }

    function createReportNew(Request $request) {
        $response = [
            "code" => 200,
            "status" => true
        ];

        $rules = [
            "longitude" => ["required"],
            "latitude" => ["required"],
            "level" => ["required"],
            "fireman_id" => ["required"],
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            $response["code"] = 400;
            $response["status"] = \false;
            $response["error"] = $validator->errors()->first();
            $response["message"] = "Pastikan data yang dibitangi warna merah, harus diisi!";
        } else {
            $firemanId = explode(",", $request->fireman_id)[2];
            $newReport = new Report();
            $newReport->user_id = Auth::user()->id;
            $newReport->fireman_id = $firemanId;
            $newReport->latitude = $request->latitude;
            $newReport->longitude = $request->longitude;
            $newReport->type_report = $request->level;
            $newReport->description = $request->description;
            $newReport->report_status = "pending";
            $newReport->save();
            if ($request->hasFile('document')) {
                    $files = $request->file('document');
        
                    foreach ($files as $file) {
                        $nameFile = Str::random(10) . time() . '.' . $file->getClientOriginalExtension();
                        $file->move('document/', $nameFile);
                        
                        $newReportDocument = new ReportDocument();
                        $newReportDocument->path_document = "document/{$nameFile}";
                        $newReportDocument->report_id = $newReport->id;
                        $newReportDocument->save();
                    }        
            }
            $response["message"] = "Berhasil membuat laporan kebakaran";
        }

        return \response()->json($response, $response["code"]);
    }
}
