<div class="col-xs-12 col-sm-12">
    <div class="subm-2">
        <div class="subm-2-page">
            <div class="subm-cat-full">
                <ul class="menulist">
                    @foreach ($sMedicines as $sMedicine)
                        <li>
                        @if ( isset($link) && $link == $sMedicine->link)
                            <a href="/{{ $bar }}/{{ $sMedicine->link }}" class="active">
                                {{ $sMedicine->name }}
                            </a>
                        @else
                            <a href="/{{ $bar }}/{{ $sMedicine->link }}">
                                {{ $sMedicine->name }}
                            </a>
                        @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>  
