@component('mail::message')


The body of your message.

<strong>Name</strong>{{ $data['name'] }}
<strong>email</strong>{{ $data['email'] }}
<strong>Message</strong>{{ $data['message'] }}
,<br>
Thanks
@endcomponent
