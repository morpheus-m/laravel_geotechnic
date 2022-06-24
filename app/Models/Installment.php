<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // installments count
    const CASH = 'cash';
    const ONE_INSTALLMENT = 'One_Installment';
    const TWO_INSTALLMENT = 'Two_Installment';
    const THREE_INSTALLMENT = 'Three_Installment';


    // types
    const STUDIES = 'studies';
    const MEMBERSHIP = 'membership';


    // status
    const PAID = 'paid';
    const UNPAID = 'Unpaid';
    const EXPIRED = 'Expired';

}
