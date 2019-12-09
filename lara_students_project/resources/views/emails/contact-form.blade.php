@component('mail::message')

{{-- php artisan make:mail ContractFormMail -m emails.contact-form --}}
{{-- // Email Documentation: Email Send_doc_by_tipu.txt --}}
The body of your message.

<strong>Name: </strong>{{ $data['name'] }}
<strong>Email: </strong>{{ $data['email'] }}
<strong>Message: </strong>{{ $data['message'] }}
,<br>
Thanks
Tipu
@endcomponent
