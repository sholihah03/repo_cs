<?php

namespace App\Console\Commands;

use App\Models\NotifikasiCs;
use Illuminate\Console\Command;

class CleanExpiredNotifications extends Command
{
    protected $signature = 'notifications:clean-expired';
    protected $description = 'Menghapus notifikasi yang sudah lebih dari 1 hari berdasarkan waktu created_at';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Hapus notifikasi yang sudah lebih dari 1 hari
        NotifikasiCs::where('created_at', '<', now()->subDay())->delete();
        
        $this->info('Notifikasi kadaluarsa telah dihapus.');
    }
}
