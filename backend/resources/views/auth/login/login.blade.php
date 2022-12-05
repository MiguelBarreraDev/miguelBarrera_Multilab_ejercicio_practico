@extends('layouts.auth')

@section('content')
<form action="/login" method="POST" class="form-login box">
    @csrf
    <h1 class="title is-4 has-text-centered">Multilab</h1>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="notification is-danger is-light">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ $error }}
            </div>
        @endforeach
    @endif
    <div class="field">
    <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right">
            <input class="input is-primary" type="email" placeholder="root@gmail.com" value="root@gmail.com" name="email">
            <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
            </span>
        </div>
    </div>

    <div class="field">
    <label class="label">Password</label>
        <div class="control has-icons-left has-icons-right">
            <input class="input is-primary" type="password" placeholder="******" value="root" name="password">
            <span class="icon is-small is-left">
                <i class="fa-solid fa-lock"></i>
            </span>
        </div>
    </div>

    <div class="field mt-5">
        <div class="control">
            <button class="button is-primary is-fullwidth">Submit</button>
        </div>
    </div>
</form>
@endsection