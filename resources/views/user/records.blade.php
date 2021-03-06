@extends('layouts.app')
@section('title', __('name.record.list', ['user' => $user->id]))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('name.home')}}</a></li>
<li class="breadcrumb-item"><a href="{{route('user.show', ['user'=>$user->id])}}">{{$user->id}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{__('ui.record.list')}}</li>
@endsection

@section('content')
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>{{__('ui.music.name')}}</th>
                <th>{{__('ui.record.store')}}</th>
                <th>{{__('ui.record.time')}}</th>
                <th>{{__('ui.record.track')}}</th>
                <th>{{__('ui.music.level')}}</th>
                <th>{{__('ui.music.difficulty')}}</th>
                <th>{{__('ui.record.score')}}</th>
                <th>{{__('ui.record.rank')}}</th>
                <th class="text-nowrap">{{__('ui.record.detail')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user->records()->orderBy('time')->get() as $record)
                <tr>
                    <td>{{$record->music->name}}</td>
                    <td class="text-nowrap">{{$record->store}}</td>
                    <td>{{$record->time}}</td>
                    <td>{{$record->track_no}}</td>
                    <td class="table-{{$record->getLevelStyleName()}}">{{$record->getLevelStr()}}</td>
                    <td>{{$record->music->getDifficulty($record->level)}}</td>
                    <td>{{$record->getScore()}}</td>
                    <td>
                        {{$record->getRank()}}
                        @if($record->isAllJustice())
                            <span class="badge badge-success">AJ</span>
                        @elseif($record->isFullCombo())
                            <span class="badge badge-info">FC</span>
                        @endif
                    </td>
                    <td class="text-nowrap"><a href="{{route('record.show', ['user'=>$record->user_id, 'record'=>$record->id])}}">{{__('ui.record.detail')}}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
