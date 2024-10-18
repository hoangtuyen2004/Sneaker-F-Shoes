<x-mail::message>
<h1>Bạn đã tạo tài khoàn thành công:</h1>

<p>Vào lúc: <strong>{{$user->create_at}}</strong></p>
<h5>Thông tin đăng nhập:</h5>
<p>Địa chỉ email:  {{$user->email}}</p>
<p>Mật khẩu: {{$user->password}}</p>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
