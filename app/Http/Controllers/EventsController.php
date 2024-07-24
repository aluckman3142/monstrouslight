<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class EventsController extends Controller
{
    public function index(){

        return Inertia::render('Events', [

        ]);
    }

    public function indexAdmin(Request $request){

        if ($request->search){
            $events = Event::where('title', 'like', "%{$request->search}%")->paginate();
        } else {
            $events = Event::paginate();
        }

        if ($request->boolean('deleted') === true) {
            if ($request->search){
                $events = Event::onlyTrashed()->where('title', 'like', "%{$request->search}%")->paginate();
            } else {
                $events = Event::onlyTrashed()->paginate();
            }
        }

        $filters = $request->search ? ['search' => $request->search] : ['search' => ''];

        return Inertia::render('Admin/Events', [
            'events' => $events,
            'links' => $events->links(),
            'filters' => $filters,
        ]);

    }

    public function store(Event $event, Request $request) {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'price' => 'required'
        ],
        [
            'title.required' => 'Please enter an Event Name',
            'description.required' => 'Please enter an Event Description',
            'date.required' => 'Please enter an Event Date',
            'start_time.required' => 'Please enter a Start Time',
            'end_time.required' => 'Please enter an End Time',
            'price.required' => 'Please enter a Price'
        ]);

        $date = Carbon::parse($request->date)->format('Y-m-d H:i:s');

        $newEvent = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'price' => $request->price,
        ]);

        if ($request->image){

            $imageName = str($newEvent->title).'.jpg';

            $image = $request->image->storeAs('events/images',$imageName,'public');

             File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\Event',
                'fileable_id' => $newEvent->id,
                'url' => Storage::disk('public')->url('events/images/' . $imageName),
                'path' => 'events/images/' . $imageName,
                'original_file_name' => $imageName,
                'size' => Storage::disk('public')->size('events/images/' . $imageName),
                'mime_type' => Storage::disk('public')->mimeType('events/images/' . $imageName),
            ]);
        }

        return redirect()->route('events.indexAdmin')->with('message', 'Event Added Successfully');

    }

    public function update(Event $event, Request $request) {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'price' => 'required'
        ],
        [
            'title.required' => 'Please enter an Event Name',
            'description.required' => 'Please enter an Event Description',
            'date.required' => 'Please enter an Event Date',
            'start_time.required' => 'Please enter a Start Time',
            'end_time.required' => 'Please enter an End Time',
            'price.required' => 'Please enter a Price'
        ]);

        $date = Carbon::parse($request->date)->format('Y-m-d H:i:s');

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'price' => $request->price,
        ]);

        if ($request->image){

            $event->image->delete();

            $imageName = str($event->title).'.jpg';

            $image = $request->image->storeAs('events/images/',$imageName,'public');

             File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\Event',
                'fileable_id' => $event->id,
                'url' => Storage::disk('public')->url('events/images/' . $imageName),
                'path' => 'events/images/' . $imageName,
                'original_file_name' => $imageName,
                'size' => Storage::disk('public')->size('events/images/' . $imageName),
                'mime_type' => Storage::disk('public')->mimeType('events/images/' . $imageName),
            ]);
        }

       return redirect()->route('events.indexAdmin')->with('message', 'Event Updated Successfully');

    }

    public function updateStatus($eventId) {
        $event = Event::find($eventId);

        $event->enabled = !$event->enabled;

        $event->save();

        return redirect()->route('events.indexAdmin')->with('message', 'Event Status Updated Successfully');
    }

    public function delete(Event $event) {
        $event->delete();

        return redirect()->route('events.indexAdmin')->with('message', 'Event Deleted Successfully');
    }

    public function restore($eventId) {
        Event::onlyTrashed()->where('id', '=', $eventId)->restore();

        return redirect()->route('events.indexAdmin')->with('message', 'Event Restored Successfully');
    }

    public function forceDelete($eventId)
    {
        $event = Event::onlyTrashed()->find($eventId);

        $event->image()->forceDelete();

        $event->forceDelete();

        return redirect()->route('events.indexAdmin')->with('message', 'Event Destroyed Successfully');
    }

    public function organisedPlay(){

        return Inertia::render('OrganisedPlay', [

        ]);
    }

}
