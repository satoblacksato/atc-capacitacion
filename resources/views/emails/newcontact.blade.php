@component('mail::message')
# Introduction

<h1>MENSAJE PRUEBA</h1>
<br/>
Dillinger is a cloud-enabled, mobile-ready, offline-storage, AngularJS powered HTML5 Markdown editor.

  - Type some Markdown on the left
  - See HTML in the right
  - Magic

@component('mail::button', ['url' => ''])
INGRESAR
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
