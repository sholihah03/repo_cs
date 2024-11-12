<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DataMissingNotification extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail']; // Atau 'database', 'slack', dll sesuai kebutuhan
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Peringatan: Data Pemasukan Harian Belum Ada')
                    ->line('Data pemasukan harian belum ada hingga jam 2 siang.')
                    ->action('Periksa Data', url('/rekap-cs')) // URL ke halaman rekap CS
                    ->line('Segera tambahkan data untuk menghindari peringatan lebih lanjut.');
    }

    // Jika menggunakan notifikasi database
    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Data pemasukan harian belum ada hingga jam 2 siang.',
            'action_url' => url('/rekap-cs')
        ];
    }
}
