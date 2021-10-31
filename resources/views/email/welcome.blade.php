@component('mail::message')
# Introduction

Hello {{$contestEntry->email}} !

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
