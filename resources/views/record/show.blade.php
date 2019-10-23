@extends('layouts.app')
@section('title', __('name.record.show', ['user' => $record->user_id]))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('name.home')}}</a></li>
<li class="breadcrumb-item"><a href="{{route('user.show', ['user'=>$record->user_id])}}">{{$record->user_id}}</a></li>
<li class="breadcrumb-item"><a href="{{route('user.records', ['user'=>$record->user_id])}}">{{__('ui.record.list')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{__('ui.record.detail')}}</li>
@endsection

@section('content')
<h2>{{__('ui.music.name')}}</h2>
<p>
    <a href="{{route('music.show', ['music'=>$record->music_id])}}">{{$record->music->name}}</a>
    <span class="badge badge-{{$record->getLevelStyleName()}}">{{$record->getLevelStr()}}</span>
</p>


<h2>{{__('ui.record.store')}}</h2>
<p>{{$record->store}}</p>

<h2>{{__('ui.record.time')}}</h2>
<p>{{$record->time}}</p>

<h2>{{__('ui.record.counts')}}</h2>
<table class="table">
    <tbody>
        <tr class="table-jcritical"><th>JCRITICAL</th><td>{{$record->jc_cnt}}</td></tr>
        <tr class="table-critical"><th>CRITICAL</th> <td>{{$record->cr_cnt}}</td></tr>
        <tr class="table-attack"><th>ATTACK</th>   <td>{{$record->at_cnt}}</td></tr>
        <tr class="table-miss"><th>MISS</th>     <td>{{$record->ms_cnt}}</td></tr>
    </tbody>
</table>

@if($record->isAllJustice())
    <p class="alert alert-success">ALL JUSTICE</p>
@elseif($record->isFullCombo())
    <p class="alert alert-info">FULL COMBO</p>
@endif
<p>SCORE:{{$record->getScore()}}</p>
<p>RANK:{{$record->getRank()}}</p>

@if($record->user_id == auth()->id())
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#recordDeleteModal">
        {{__('ui.record.delete')}}
    </button>
    <div class="modal fade" id="recordDeleteModal" tabindex="-1" role="dialog" aria-labelledby="recordDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recordDeleteModalLabel">{{__('ui.record.delete')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{__('ui.record.delete_confirm')}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('ui.cancel')}}</button>
                    <form id="delete-form" action="{{ route('record.destroy', ['user'=>$record->user_id, 'record'=>$record]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">{{__('ui.submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
