@extends('layouts.master')
@section('title'){{ t('user.profile') }}@endsection
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-body box-profile" id="upload-avatard">
          <img class="profile-user-img img-responsive img-circle"
            src="{{ asset('images/avatar/' . $currentUser->avatar) }}">
          <h3 class="profile-username text-center">{{ $currentUser->name }}</h3>
          <p class="text-muted text-center">{{ $currentUser->email }}</p>
          {!! Form::open(['method' => 'put', 'route' => 'profile.uploadAvatar', 'enctype' => 'multipart/form-data']) !!}
          {!! Form::file('avatar', ['class' => 'btn btn-primary btn-block', 'id' => 'input-avatar']) !!}
          {!! Form::close() !!}
        </div>
      </div>
    </div>

    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#profile" data-toggle="tab">{{ t('user.profile') }}</a></li>
          <li><a href="#change-password" data-toggle="tab">{{ t('user.change_password') }}</a></li>
        </ul>
        <div class="tab-content">
          @include('profile._profile')
          @include('profile._change_password')
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
@endsection