<?php

namespace App\Classis;

use App\Models\Order;
use App\Models\Picture;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Utilities
{
    public static function orderPicturesDelete(int $order_id){
        $order=Order::findOrFail($order_id);
        //$pictures=$order->pictures()->get();
        $file="$order_id.zip";
        if (Storage::exists($file)){
            Storage::delete($file);
        }
        return Storage::deleteDirectory($order_id);
    }

    public static function basic_email()
    {
         $data = array('name'=>"Virat Gandhi");
        /*$data = [
            'name'=>'Jhon Smith',
            'msgBody'=>'Welcome to Laravel Article'
        ];*/

        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to('kj@softcenter.eu', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
            $message->from('kj@softcenter.eu','Virat Gandhi');
        });
        //echo "Basic Email Sent. Check your inbox.";
        return;
    }

    public static function sendmail(){
        $to = "kj@softcenter.eu";
        $subject = "My subject";
        $txt = "Hello world!";
        $headers = "From: kj@softcenter.eu" . "\r\n" .
            "CC: kj@ploter.eu";

        mail($to,$subject,$txt,$headers);
        return;
    }
}
