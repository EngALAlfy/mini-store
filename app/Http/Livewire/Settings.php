<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Settings extends Component
{
    use Funcs;

    public $fixed_navbar;
    public $dark_mode;
    public $delete_dialog;
    public $daily_backup;
    public $collaps_sidebar;
    public $font;
    public $notification_sound;

    public $head_code;
    public $header_ad;
    public $side_ad;
    public $footer_ad;
    public $facebook;
    public $facebook_followers_count;
    public $instagram;
    public $instagram_followers_count;
    public $youtube;
    public $youtube_followers_count;

    public $fcm_token;
    public $perPage;

    public $phone;
    public $address;
    public $email;


    public function mount()
    {
        $this->delete_dialog = filter_var(Setting::find('delete_dialog')->value ?? 0, FILTER_VALIDATE_BOOLEAN);
        $this->dark_mode = filter_var(Setting::find('dark_mode')->value ?? 0, FILTER_VALIDATE_BOOLEAN);
        $this->fixed_navbar = filter_var(Setting::find('fixed_navbar')->value ?? 0, FILTER_VALIDATE_BOOLEAN);
        $this->collaps_sidebar = filter_var(Setting::find('collaps_sidebar')->value ?? 0, FILTER_VALIDATE_BOOLEAN);
        $this->font = Setting::find('font')->value ?? 'font-5';
        $this->notification_sound = Setting::find('notification_sound')->value ?? 'no_sound';

        $this->head_code = Setting::find('head_code')->value ?? null;
        $this->header_ad = Setting::find('header_ad')->value ?? null;
        $this->footer_ad = Setting::find('footer_ad')->value ?? null;
        $this->side_ad = Setting::find('side_ad')->value ?? null;
        $this->facebook = Setting::find('facebook')->value ?? null;
        $this->facebook_followers_count = Setting::find('facebook_followers_count')->value ?? null;
        $this->instagram = Setting::find('instagram')->value ?? null;
        $this->instagram_followers_count = Setting::find('instagram_followers_count')->value ?? null;
        $this->youtube = Setting::find('youtube')->value ?? null;
        $this->youtube_followers_count = Setting::find('youtube_followers_count')->value ?? null;

        $this->fcm_token = Setting::find('fcm_token')->value ?? null;
        $this->perPage = Setting::find('perPage')->value ?? 10;

        $this->phone = Setting::find('phone')->value ?? null;
        $this->email = Setting::find('email')->value ?? null;
        $this->address = Setting::find('address')->value ?? null;
   }

    public function updated($name, $value)
    {
        $setting = Setting::find($name);
        if ($setting) {
            $setting->update(['value' => $value, 'user_id' => Auth::user()->id]);
        } else {
            $setting = Setting::create(['key' => $name,'value' => $value, 'user_id' => Auth::user()->id]);
        }
        $this->success(__("all.done_successfully_reload_to_see"));
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
