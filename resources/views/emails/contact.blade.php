
<p>{{ __('You receive a message from the :url website!', ['url' => url('')]) }}</p>
<p>
    {{ __('Sender information') }}
</p>
<ul>
    <li>{{ __('Name') }}: <strong>{{ $firstname }}</strong></li>
    <li>{{ __('Email') }}: <strong>{{ $email }}</strong></li>

</ul>
<hr>
<h3>{{ __('Content') }}</h3>
<p>
 	{{ $content }}
</p>
<hr>
