@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mypage') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>
                        <li style="margin-bottom: 10px;">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded"
                                  name="btn_menu_article"
                                  onclick="location.href='/blogmaker/article'">Article</button>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded"
                                  name="btn_menu_word"
                                  onclick="location.href='/blogmaker/word'">Word</button>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded"
                                    name="btn_menu_qa"
                                    onclick="location.href='/blogmaker/qa'">QA</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
