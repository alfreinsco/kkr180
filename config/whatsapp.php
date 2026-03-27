<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Jeda antar pengiriman WhatsApp (detik)
    |--------------------------------------------------------------------------
    |
    | Digunakan jika kolom pengaturan "whatsapp_send_delay_seconds" kosong.
    | Setiap job pengiriman dijadwalkan bergantian (0, jeda, 2×jeda, …) agar
    | tidak membanjiri API dan mengurangi risiko nomor diblokir.
    |
    */

    'send_delay_seconds' => max(0, (int) env('WHATSAPP_SEND_DELAY_SECONDS', 20)),

];
