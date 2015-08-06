/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 05.08.2015
 * Time: 20:49
 */
<form method="POST" action="/auth/login">
{!! csrf_field() !!}

<div>
    Email
    <input type="email" name="email" value="{{ old('email') }}">
</div>

<div>
    Password
    <input type="password" name="password" id="password">
</div>

<div>
    <input type="checkbox" name="remember"> Remember Me
</div>

<div>
    <button type="submit">Login</button>
</div>
</form>