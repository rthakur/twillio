@php
$url = Request::segment(1);

@endphp
<!-- Sidebar -->
<div id="sidebar-wrapper" class="">
    <nav id="spy">
        <ul class="sidebar-nav nav">
            <li class="sidebar-brand @if(!$url) active @endif">
              <a href="/" class=""><span class="fa fa-home solo">Home</span></a>
            </li>
            <li @if(isset($url) && $url == 'agent')class="active" @endif>
            <a href="/agent" data-scroll="" class="{{ (isset($url) && $url == 'agent')? 'active' : ''}}">
              <span class="fa fa-anchor solo">Agent </span>
            </a>
            </li>
            <li @if(isset($url) && $url == 'lead')class="active" @endif>
              <a href="/lead" data-scroll="" class="">
                  <span class="fa fa-anchor solo">Lead</span>
              </a>
            </li>

        </ul>
    </nav>
</div>
