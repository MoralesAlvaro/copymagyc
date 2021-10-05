@props(['nameLink', 'link'])


<li class="nav-item">
  <a href="{{$link}}" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>{{$nameLink}}</p>
  </a>
</li>