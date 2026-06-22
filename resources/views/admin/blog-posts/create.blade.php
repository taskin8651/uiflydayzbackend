@extends('layouts.admin')
@section('page-title', 'Add Blog Article')
@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.blog-posts.index') }}" class="admin-back-link">← {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">Add Blog Article</h2><p class="admin-page-subtitle">Create a new guide for the FlyDayz knowledge hub.</p></div></div>
<form method="POST" action="{{ route('admin.blog-posts.store') }}">@csrf @include('admin.blog-posts._form')</form>
@endsection
