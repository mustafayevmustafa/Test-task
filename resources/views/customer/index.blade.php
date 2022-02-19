<form action="{{'custom-login'}}" method="post">
    @csrf
    <input type="text" name="email">
    <input type="text" name="password">
     <button type="submit">Giris</button>
</form>

@if(Auth::guard('customer')->check())

{{Auth::guard('customer')->user()->name}}

@endif