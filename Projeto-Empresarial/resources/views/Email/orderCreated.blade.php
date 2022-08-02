@component('mail::message')

@component('mail::panel')
{{ $mailInfo['title'] }}
@endcomponent

{{ $mailInfo['message'] }}

{{ $mailInfo['status'] }}

@component('mail::button', ['url' => $mailInfo['url']])
EstanteDev
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
