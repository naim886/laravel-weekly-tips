<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function index()
    {

        try {
            DB::beginTransaction();
            $transaction_amount = 100;
            $sender             = User::query()->where('email', 'naim@gmail.com')->first();
            if ($sender && $sender->balance >= $transaction_amount) {
                $receiver = User::query()->where('email', 'ashfak@gmail.com')->first();
                if ($receiver) {
                    $sender->balance -= $transaction_amount;
                    $sender->save();
                    dd('server down');
                    $receiver->balance += $transaction_amount;
                    $receiver->save();
                }
            }
            DB::commit();
        }catch (\Throwable $throwable){
           DB::rollBack();
        }


        dd('success');
    }
}
