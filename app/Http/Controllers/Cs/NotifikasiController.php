<?php

namespace App\Http\Controllers\Cs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DataMissingNotification;
use App\Models\User;

class NotifikasiController extends Controller
{
    
    protected $signature = 'check:data-entry';
    protected $description = 'Check if daily data entry is missing and send notification if necessary';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Cek apakah ada data yang masuk pada hari ini di tabel `rekap_cs_total`
        $dataMasuk = DB::table('rekap_cs_total')
                        ->whereDate('created_at', now()->toDateString())
                        ->exists();

        if (!$dataMasuk) {
            // Kirim notifikasi jika tidak ada data yang masuk
            $users = User::where('role', 'admin')->get(); // Misalnya kirim ke admin
            Notification::send($users, new DataMissingNotification());
            $this->info('Notification sent: No data entry for today.');
        } else {
            $this->info('Data entry found for today.');
        }
    }
}