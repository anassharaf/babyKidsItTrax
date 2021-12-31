<?php
namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminActivityInterface;
use App\Http\Requests\Activity\CreateActivityRequest;
use App\Http\Requests\Activity\DeleteActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Http\Traits\ImagesTrait;
use App\Models\Activity;
use RealRashid\SweetAlert\Facades\Alert;

class AdminActivityRepository implements AdminActivityInterface {

    use ImagesTrait;
    public function index()
    {
        $activities = Activity::get();
        return view('Admin.activity.index', compact('activities'));
    }

    public function create()
    {
        return view('Admin.activity.create');
    }

    public function store($request)
    {
        $icon = $request->icon;
        $iconName = time() . '_activity.' . $icon->extension();
        $this->uploadImage($icon,$iconName,'activities');
        Activity::create([
            'title' => $request->title,
            'slug'  => $request->slug,
            'icon'  => $iconName
        ]);
        Alert::success('Success','Activity Created');
        return redirect(route('admin.activity.all'));
    }

    public function delete($request)
    {
        $activity = Activity::find($request->activity_id);
        unlink(public_path($activity->icon));
        $activity->delete();
        Alert::success('Deleted','Activity Deleted');
        return redirect()->back();
    }

    public function edit($activityId)
    {
        $activity = Activity::find($activityId);
        return view('Admin.activity.edit',compact('activity'));
    }

    public function update($request)
    {
        $activity = Activity::find($request->id);
        $updates = [
            'title' => $request->title,
            'slug' => $request->slug
        ];
        if (!is_null($request->icon)){

            $iconName = time() . '_activity.' . $request->icon->extension();
            $this->uploadImage($request->icon, $iconName, 'activities', $activity->icon);
            $updates = array_merge($updates,['icon'=>$iconName]);
        }

        $activity->update($updates);
        Alert::success('Success','Updated Successfully');
        return redirect(route('admin.activity.all'));
    }
}
