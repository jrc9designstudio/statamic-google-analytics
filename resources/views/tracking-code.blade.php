@if ($async)
    {{-- Async start Google Analytics --}}
    <script>
       window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
@else
    {{-- Non async start Google Analytics and add remote script to DOM --}}
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    @if ($debug)
        })(window,document,'script','https://www.google-analytics.com/analytics_debug.js','ga');
    @else
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    @endif
@endif

@if ($ignore_admins && $user && $user->can('cp:access'))
    {{-- Disable tracking if ignore admins is true, user is signed in and can access cp --}}
    window['ga-disable-{{ $tracking_id }}'] = true;
@endif

@if ($debug && $trace_debugging)
    window.ga_debug = {trace: true};
@endif

    {{-- Start tacking code --}}
    ga('create', '{{ $tracking_id }}', 'auto');

@if ($disable_sending)
    ga('set', 'sendHitTask', null);
@endif

@if ($display_features)
    {{-- Use Display Features if enabled --}}
    ga('require', 'displayfeatures');
@endif

@if ($link_id)
    {{-- Use Enhanced link attribution if enabled --}}
    ga('require', 'linkid');
@endif

@if ($beacon)
    {{-- Set tracking to beacon in browsers that support it --}}
    ga('set', 'transport', 'beacon');
@endif

@if (($track_uid && $user && !$ignore_admins) || ($track_uid && $user && $ignore_admins && !$user->can('cp:access')) )
    ga('set', 'userId', '{{ $user->id() }}');
@endif

    {{-- Send the pageview --}}
    ga('send', 'pageview');

    {{-- Always end the script tag --}}
    </script>

@if ($async)
      {{-- If async we need to include the remote script at the end --}}
      @if ($debug)
          <script async src='https://www.google-analytics.com/analytics_debug.js'></script>
      @else
          <script async src='https://www.google-analytics.com/analytics.js'></script>
      @endif
@endif
