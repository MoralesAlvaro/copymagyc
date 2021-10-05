@props(['nameGroup'])

<a href="#" class="nav-link">
  {{$slot}}
  <p>
    {{$nameGroup}}
    <i class="fas fa-angle-left right"></i>
  </p>
</a>