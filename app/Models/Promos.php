<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Promos extends Model
{
    use HasFactory;

    protected $table='promos';
    
    protected $fillable = [
        'code',
        'type',
        'value',
        'min_purchase',
        'max_usage',
        'usage_count',
        'end_date',
        'is_active',
    ];

      // Method untuk validasi dan ambil diskon
       public static function getDiscountForCode($code, $subtotal)
       {
           $promo = self::where('code', $code)
               ->where('is_active', true)
               ->where(function ($q) {
                   $q->whereNull('end_date')->orWhere('end_date', '>', Carbon::now());
               })
               ->first();
           if (!$promo) {
               return ['valid' => false, 'message' => 'Kode promo tidak ditemukan atau tidak aktif'];
           }
           if ($subtotal < $promo->min_purchase) {
               return ['valid' => false, 'message' => 'Minimal belanja Rp ' . number_format($promo->min_purchase)];
           }
           if ($promo->max_usage > 0 && $promo->usage_count >= $promo->max_usage) {
               return ['valid' => false, 'message' => 'Kuota promo habis'];
           }

             // Hitung nilai diskon
           $discountValue = 0;
           if ($promo->type === 'percentage') {
               $discountValue = $subtotal * ($promo->value / 100);
           } else {
               $discountValue = $promo->value;
           }
           $discountValue = min($discountValue, $subtotal);
           return [
               'valid' => true,
               'promo' => $promo,
               'discountValue' => $discountValue,
               'message' => 'Diskon diterapkan!'
           ];
       }
}
