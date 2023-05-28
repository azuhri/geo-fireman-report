@extends('app.dashboard.template.master')
@section('dashboard_title')
    Laporan
@endsection
@section('dashboard_css')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>
@endsection
@section('dashboard_content')
    <div class="h-full">
        <p class="font-poppins text-xl font-bold">Filter Laporan</p>
        <div class="justify-center flex flex-wrap my-2 overflow-x-auto">
          <button onclick="effectButton(this); getReport('all')" class="active mb-1 p-2 effect-button px-4 mr-2 text-center text-xs border-[1px] border-yellow-500 bg-yellow-500 text-white rounded-lg">
            Semua Laporan
          </button>
          <button onclick="effectButton(this); getReport('diproses')" class="mb-1 p-2 effect-button px-4 mr-2 text-center text-xs border-[1px] text-yellow-500 font-bold border-yellow-500 rounded-lg">
            Laporan Diproses
          </button>
          <button onclick="effectButton(this); getReport('dibatalkan')" class="mb-1 p-2 effect-button px-4 mr-2 text-center text-xs border-[1px] text-yellow-500 font-bold border-yellow-500 rounded-lg">
            Laporan Dibatalkan
          </button>
          <button onclick="effectButton(this); getReport('ditolak')" class="mb-1 p-2 effect-button px-4 mr-2 text-center text-xs border-[1px] text-yellow-500 font-bold border-yellow-500 rounded-lg">
            Laporan Ditolak
          </button>
          <button onclick="effectButton(this); getReport('selesai')" class="mb-1 p-2 effect-button px-4 mr-2 text-center text-xs border-[1px] text-yellow-500 font-bold border-yellow-500 rounded-lg">
            Laporan Selesai
          </button>
        </div>

        <div class="w-full my-4" id="reports">
          
        </div>
    </div>
@endsection

@section('dashboard_js')
<script>
const effectButton = (self) => {
  $(".active").removeClass("bg-yellow-500 text-white");
  $(".active").addClass("text-yellow-500");
  $(self).removeClass("text-yellow-500");
  $(self).addClass("active bg-yellow-500 text-white");
}

@if(session('success'))
    $.Toast("Pesan", "{{ session('success') }}", "success");
@endif

const getReport = async (status) => {
  let errorBanner = `<p id="errorBanner" style="display: none" class="bg-slate-500 text-xs font-bold text-white rounded-lg py-4 text-center">Laporan kosong</p>`
  fetch(`{{route('user.report.status',"/")}}/${status}`)
       .then(res => res.json())
       .then(json => {
         let data = json.data;
         if(data.length < 1) {
           $("#reports").html(errorBanner);
           $("#errorBanner").slideDown(500);
          } else {
            let reports = "";
            data.forEach(val => {
              reports += templateReport(val);
            })
            $("#reports").html(reports);
            $(".data-report").slideDown(500);
          }
       })
}
const templateReport = (data) => {
  return `<div onclick="detailReport('${data.id}')" style="display: none" class="cursor-pointer data-report p-4 my-2 rounded shadow-lg relative">
              <div class="flex justify-between items-center">
                <div class="">
                    <p class="text-xs text-gray-500 font-bold">${formattingDate(data.created_at)}</p>
                    <p class="text-xs  text-slate-800">${data.fireman.name}</p>
                </div>
                <div class="p-2 text-xs bg-${reportStatusColor(data.report_status)}-500 text-white rounded px-4">
                   ${data.report_status}
                </div>
              </div>
              <div class="my-1 mb-4">
                 <p class="text-sm font-bold">Deskripsi Kejadian</p>
                 <p class="text-xs text-gray-500">${data.description}</p>
              </div>
              <div class="absolute bottom-0 right-0 text-sm font-bold bg-slate-500 text-white px-4">
                LEVEL ${data.type_report}
             </div>
          </div>`
}
getReport("all");

const formattingDate = (date) => {
  let format = new Date(date);
  let year = format.getFullYear();
  let tgl = format.getDate();
  let month = format.getMonth();
  let time = `${format.getHours()}:${format.getMinutes()}`;
  return `${tgl}/${month}/${year} ${time}`;
}

const detailReport = reportId => {
  window.location.href = `{{route('user.detail.report',"")}}/${reportId}`;
}

const reportStatusColor = status => {
  console.log(status);
  if(status == "pending")
    return "yellow";
  else if(status == "ditolak")
    return "red";
  else if(status == "dibatalkan")
    return "slate"
  else if(status == "diproses")
    return "blue"
  else if(status == "selesai")
    return "green"

  return "gray";
}

</script>
@endsection