@component('mail::message')

@component('mail::panel')
{{ $mailInfo['title'] }}
@endcomponent

{{ $mailInfo['message'] }}

@component('mail::button', ['url' => $mailInfo['url']])
EstanteDev
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
