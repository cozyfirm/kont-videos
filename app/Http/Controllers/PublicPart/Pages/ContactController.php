<?php

namespace App\Http\Controllers\PublicPart\Pages;

use App\Http\Controllers\Controller;
use App\Mail\Contact\SendAnEmail;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller{
    use ResponseTrait;
    protected string $_path = 'public-part.app.pages.contact.';

    public function contact(): View{
        return view($this->_path . 'contact', [
            'contact' => true
        ]);
    }
    public function sendAnEmail(Request $request): JsonResponse{
        try{
            if(isset($request->name) and isset($request->surname)){
                $name = $request->name . " " . $request->surname;
            }else return $this->jsonError('3001', __('Molimo da unesete ime i prezime!'));

            Mail::to($request->email)->send(new SendAnEmail('Kopija - ' . ($request->subject), 'No-Reply', env('MAIL_TO_ADDR'), $name, $request->email, $request->message));

            return $this->jsonSuccess(__('Poruka uspješno poslana!'));
        }catch (\Exception $e){
            return $this->jsonError('3000', __('Desila se greška!'));
        }
    }
}
