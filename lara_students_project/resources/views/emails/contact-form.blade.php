@component('mail::message')

{{-- php artisan make:mail ContractFormMail -m emails.contact-form --}}
The body of your message.

<strong>Name: </strong>{{ $data['name'] }}
<strong>Email: </strong>{{ $data['email'] }}
<strong>Message: </strong>{{ $data['message'] }}
,<br>
Thanks
Tipu
@endcomponent
