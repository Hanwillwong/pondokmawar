<?php

namespace App\Listeners;

use App\Events\HargaProdukUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\RiwayatHarga;

class UpdateRiwayatHarga
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(HargaProdukUpdated $event): void
    {
        $product = $event->product;

        RiwayatHarga::create([
            'barang_id' => $product->id,
            'harga_beli' => $product->harga_beli,
            'harga_jual' => $product->harga_jual,
        ]);
    }
}
