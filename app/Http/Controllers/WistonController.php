<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\Floor;
use App\Models\Apartment;
use App\Models\Application;
use Telegram;

class WistonController extends Controller
{
    public function index()
    {
        return view('frontend.wiston.index');
    }

    public function floors($id)
    {
        $block = Block::findOrFail($id);
        return view('frontend.wiston.floors', compact('block'));
    }

    public function floor($id, $floor)
    {
        $floor = Floor::findOrFail($floor);

        return view('frontend.wiston.floor', compact('floor'));
    }

    public function show($id = null)
    {
        $apartment = Apartment::where('number', $id)->firstOrFail();
        return view('frontend.wiston.show', compact('apartment'));
    }

    public function application()
    {
        $data = request()->validate([
            'name'          => 'required|max:255',
            'phone'         => 'required|max:255',
            'message'       => 'required',
            'apartment_id'  => 'required|integer'
        ]);

        $apartment = Apartment::find($data['apartment_id']);        

        $application = Application::create($data);
        $text = "Заявка с сайта <a href='http://arcobuilding.uz'>arcobuilding.uz</a> \n"
                    . "<b>Имя:</b> {$data['name']}\n"                    
                    . "<b>Номер телефона:</b> {$data['phone']}\n"
                    . "<b>Описание:</b> {$data['message']}\n"
                    . "<b>Номер квартиры:</b> {$apartment->number}\n" 
                    . "<b>Блок:</b> {$apartment->floor->block->name}\n"
                    . "<b>Этаж:</b> {$apartment->floor->number}\n"
                    . "<b>Комнаты:</b> {$apartment->rooms}\n"
                    . "<b>Площадь:</b> {$apartment->total_area}\n"
                    . "<b>Линк:</b> ".route('wiston.show', $apartment->id)."\n";
        
        Telegram::sendMessage([
            'chat_id' => -412682829,
            'text' => $text,
            'parse_mode' => 'HTML'
        ]);

        session()->flash('success', __('main.alert'));
        return redirect()->back();
    }
}
