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
    public $lng;
    public $lat;

    public $perPage;

    public $homeSections;
    public $orders_email;
    public $orders_whatsapp;

    public function mount()
    {
        $this->delete_dialog = filter_var(Setting::find('delete_dialog')->value ?? 0, FILTER_VALIDATE_BOOLEAN);
        $this->dark_mode = filter_var(Setting::find('dark_mode')->value ?? 0, FILTER_VALIDATE_BOOLEAN);
        $this->fixed_navbar = filter_var(Setting::find('fixed_navbar')->value ?? 0, FILTER_VALIDATE_BOOLEAN);
        $this->collaps_sidebar = filter_var(Setting::find('collaps_sidebar')->value ?? 0, FILTER_VALIDATE_BOOLEAN);
        $this->font = Setting::find('font')->value ?? 'font-5';
        $this->notification_sound = Setting::find('notification_sound')->value ?? 'no_sound';

        $this->perPage = Setting::find('perPage')->value ?? 10;
        $this->homeSections = Setting::find('homeSections')->value ?? 3;

        $this->phone = Setting::find('phone')->value ?? null;
        $this->email = Setting::find('email')->value ?? null;
        $this->address = Setting::find('address')->value ?? null;

        $this->lng = Setting::find('lng')->value ?? null;
        $this->lat = Setting::find('lat')->value ?? null;

        $this->orders_whatsapp = Setting::find('orders_whatsapp')->value ?? null;
        $this->orders_email = Setting::find('orders_email')->value ?? null;
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
