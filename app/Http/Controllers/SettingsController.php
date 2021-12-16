<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class SettingsController extends Controller
{
    public function Connect(){
        $shop = Auth::user();

//        $script_tag = $shop->api()->rest('GET', '/admin/script_tags.json');
//        foreach ($script_tag['body']['script_tags'] as $s){
//            $shop->api()->rest('DELETE', '/admin/script_tags/'.$s['id'].'.json');
//        }
//        dd($script_tag);

        if($shop->api_key){
            $view = 'settings';
        }else{
            $view = 'welcome';
        }
     return view($view)->with([
         'shop' => $shop
     ]);
    }

    public function ConnectWith(Request $request){
        $user = \App\Models\User::find(Auth::id());
        $user->api_key = $request->input('api_key');
        $script_tag = Auth::user()->api()->rest('POST', '/admin/script_tags.json', [
            "script_tag" => [
                "event" => "onload",
                "src" => "https://www.lightboxcdn.com/vendor/".$request->input('api_key')."/lightbox_inline.js"
            ]
        ]);

        // dd($script_tag);
        $script_tag = $script_tag['body']['script_tag']['id'];
        $user->script_tag_id = $script_tag;
        $user->status = 1;
        $user->save();
        return Redirect::tokenRedirect('home');
    }

    public function UpdateAPI(Request  $request){
        $user = \App\Models\User::find(Auth::id());
        $user->api_key = $request->input('api_key');

//        dd($request, $user);

        if($user->status == 1) {
            if ($user->script_tag_id) {
                $script_tag = Auth::user()->api()->rest('PUT', '/admin/script_tags/' . $user->script_tag_id . '.json', [
                    "script_tag" => [
                        "id" => $user->script_tag_id,
                        "src" => "https://www.lightboxcdn.com/vendor/" . $request->input('api_key') . "/lightbox_inline.js"
                    ]
                ]);
            } else {
                $script_tag = Auth::user()->api()->rest('POST', '/admin/script_tags.json', [
                    "script_tag" => [
                        "event" => "onload",
                        "src" => "https://www.lightboxcdn.com/vendor/" . $request->input('api_key') . "/lightbox_inline.js"
                    ]
                ]);
            }
            $script_tag = $script_tag['body']['script_tag']['id'];
            $user->script_tag_id = $script_tag;
        }else{
            if($user->script_tag_id) {
                Auth::user()->api()->rest('DELETE', '/admin/script_tags/'.$user->api_key.'.json',);
                $user->script_tag_id = null;
            }
        }

        $user->save();
        return Redirect::tokenRedirect('home');
    }

    public function StatusUpdate(Request $request){
        $user = \App\Models\User::find(Auth::id());
        $user->status = $request->input('status');
        if($request->input('status') == 1){
            if($user->script_tag_id) {
                $script_tag = Auth::user()->api()->rest('PUT', '/admin/script_tags/' . $user->script_tag_id . '.json', [
                    "script_tag" => [
                        "id" => $user->script_tag_id,
                        "src" => "https://www.lightboxcdn.com/vendor/" . $user->api_key . "/lightbox_inline.js"
                    ]
                ]);
            }else{
                $script_tag = Auth::user()->api()->rest('POST', '/admin/script_tags.json', [
                    "script_tag" => [
                        "event" => "onload",
                        "src" => "https://www.lightboxcdn.com/vendor/".$user->api_key."/lightbox_inline.js"
                    ]
                ]);
            }
            $script_tag = $script_tag['body']['script_tag']['id'];
            $user->script_tag_id = $script_tag;
        }else{
            if($user->script_tag_id) {
                Auth::user()->api()->rest('DELETE', '/admin/script_tags/'.$user->script_tag_id.'.json',);
                $user->script_tag_id = null;
            }
        }
        $user->save();
        return Redirect::tokenRedirect('home');
    }

    public function CreateScriptTag(){
        $shop = Auth::user();
        $script_tag = $shop->api()->rest('POST', '/admin/shop.json', [
            "script_tag" => [
                "event" => "onload",
                "src" => "https://www.lightboxcdn.com/vendor/".$shop->api_key."/lightbox_inline.js"
            ]
        ]);
    }

    public function RemoveScriptTag(){

    }
}
