<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\InvoicesItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        static $order = 1;
        $invoices = [
            [
                'user_id' => 3,
                'invoice' => 'INV/'.date('dmY/His').'/'.'3'.'/'.$order++,
                'status' => 3,
            ],
            [
                'user_id' => 4,
                'invoice' => 'INV/'.date('dmY/His').'/'.'4'.'/'.$order++,
                'status' => 3,
            ],
            [
                'user_id' => 3,
                'invoice' => 'INV/'.date('dmY/His').'/'.'3'.'/'.$order++,
            ],
        ];

        foreach ($invoices as $invoice) {
            Invoice::create($invoice);
        }

        $invoices_items = [
            [
                'invoice_id' => 1,
                'product_id' => 1,
                'jumlah' => 1,
                'sub_total' => 15000,
            ],
            [
                'invoice_id' => 1,
                'product_id' => 2,
                'jumlah' => 1,
                'sub_total' => 13000,
            ],
            [
                'invoice_id' => 3,
                'product_id' => 4,
                'jumlah' => 1,
                'sub_total' => 18000,
            ],
            [
                'invoice_id' => 3,
                'product_id' => 5,
                'jumlah' => 1,
                'sub_total' => 20000,
            ],
            [
                'invoice_id' => 2,
                'product_id' => 7,
                'jumlah' => 1,
                'sub_total' => 20000,
            ],
        ];

        foreach ($invoices_items as $invoices_item) {
            InvoicesItem::create($invoices_item);
        }
    }
}
