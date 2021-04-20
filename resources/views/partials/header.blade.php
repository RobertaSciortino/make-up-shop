<header>
    <nav class="navbar navbar-dark">
        <button @click="toggleMenu" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div :class="visibility" class="menu">
        <ul>
        @foreach($sections as $section)
            <li>
                <h2 @click="{{$section->name}}Menu">{{$section->name}}</h2>
                <ul :class="{{$section->name}}SectionVisibility">
                    @foreach($types as $type)
                        @if($type->section_id === $section->id)
                        <li>
                            <h4>{{str_replace("_", " ", $type->name)}}</h4>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @endforeach
        </ul>
    </div>
</header>
