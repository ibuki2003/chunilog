@extends('layouts.app')
@section('title', 'Test')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">{{__('name.home')}}</li>
@endsection


@section('content')
    <p>Chunilogへようこそ!</p>
    <p><b>Chunilogは開発段階です.動作の不安定さ,データの永続性は保証されません.</b></p>
    <p>不具合等見つけた場合は<a href="https://twitter.com/ibuki2003">管理者(ibuki2003/にこなのにふわわあ)</a>へ連絡をお願いします.</p>

    <h2>つかいかた</h2>
    <p>まずは記録をしましょう.右上のユーザー名をクリックし,ユーザー設定からプレイ履歴登録スクリプトを開きましょう.</p>

    <h2>今後の開発予定</h2>
    <ul>
        <li>UIをきれいにする</li>
        <li>統計情報をとれるように</li>
        <li>Chunithm-net未加入者の入力処理</li>
    </ul>
@endsection
