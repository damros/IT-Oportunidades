<div class="app-tab-content"  id="three-1">
    <i>{{trans('labels.Full_Name')}}:</i>
    <span>{{$application->candidate->name}}</span>

    <i>{{trans('labels.Email_Address')}}:</i>
    <span><a href="{{$application->candidate->user->email}}">{{$application->candidate->user->email}}</a></span>

    <i>{{trans('labels.Message')}}:</i>
    <span>{{$application->message }}</span>
</div>
