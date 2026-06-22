@extends('layouts.admin')
@section('page-title', 'Edit Blog Article')
@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.blog-posts.index') }}" class="admin-back-link">← {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">Edit Blog Article</h2><p class="admin-page-subtitle">Update this FlyDayz knowledge-hub article.</p></div></div>
<form method="POST" action="{{ route('admin.blog-posts.update', $blogPost) }}">@csrf @method('PUT') @include('admin.blog-posts._form')</form>
@endsection
